/**
 * Created by Deepak on 5/3/2016.
 */

(function ($) {

	//php and javascript interpret booleans differently so we use string checks
	function isTrue(val){
		return val =="true";
	}

	function parseOptions(options){

		//bail out if already parsed or failed
		if(options.parsed==true) return;

		options.parsed= true;
		//options.links are in json format
		//{"1":[]}
		//convert them to array format
		var links = [];
		try {
			for (var key in options.links) {
				var _pagelinks = options.links[key];
				var pagelink = [100, 100];
				for (var l = 0; l < _pagelinks.length; l++) {
					var _link = _pagelinks[l];
					var _values = _link.replace("[", "").replace("]", "").split(",");
					var _linkarr = [];
					for (var v = 0; v < 5; v++) {
						_linkarr[v] = _values[v];
					}
					pagelink.push(_linkarr);
				}
				links[parseInt(key, 10) + 1] = pagelink;
			}
		}
		catch (error) {
			console.error(error.stack);
		}

		options.webgl = options.webgl == 'true' ? true : options.webgl;
		options.links = DFLIP.parseLinks(links);
		options.enableDownload = isTrue(options.enable_download);
		options.backgroundColor = options.bg_color;
		options.autoEnableOutline = isTrue(options.auto_outline);
		options.overwritePDFOutline = isTrue(options.overwrite_outline);
		options.soundEnable = isTrue(options.auto_sound);
		options.maxTextureSize = options.texture_size;
		options.pageMode = options.page_mode;

		if(options.pageMode == 0 || options.pageMode == "0")
			options.pageMode = void 0;

	}

	$(document).ready(function () {

		var undef = void 0;

		if (typeof DFLIP !== 'undefined' && dFlipLocation != undef) {

			//PRESENTATION.defaults.backgroundImage = "blankss";//images/textures/white.jpg";
			//PRESENTATION.defaults.textureLoadFallback = dFlipLocation + "/images/textures/white.jpg";
			DFLIP.defaults.mockupjsSrc = dFlipLocation + "/assets/js/libs/mockup.min.js";
			DFLIP.defaults.pdfjsSrc = dFlipLocation + "/assets/js/libs/pdf.min.js";
			DFLIP.defaults.threejsSrc = dFlipLocation + "/assets/js/libs/three.min.js";
			DFLIP.defaults.pdfjsWorkerSrc = dFlipLocation + "/assets/js/libs/pdf.worker.min.js";
			DFLIP.defaults.soundFile = dFlipLocation + "/assets/sound/turn2.mp3";
		}

		$('._df_thumb').each(function () {
			var book = $(this);

			var wrapper = $("<div class='_df_book-cover'>");

			//fetch any existing values
			var thumb = book.attr("df-thumb");


			var text = book.html();
			book.html("");
			var title = $("<span class='_df_book-title'>").html(text).appendTo(wrapper);

			var tags = book.attr("df-tags");
			if (tags) {
				tags = tags.split(",");

				if (tags.length > 0) {
					for (var tagcount = 0; tagcount < tags.length; tagcount++) {
						book.append("<span class='_df_book-tag'>" + tags[tagcount] + "</span>");
					}
				}
			}

			if(thumb !==void 0 && thumb.toString().trim()!='') {
				wrapper.css({
					backgroundImage: "url(" + thumb + ")"
				});
			}else{
				wrapper.addClass("_df_thumb-not-found");
			}

			book.append(wrapper);

		});

		$('._df_button, ._df_thumb').on("click", function () {

			//cache the book element
			var book = $(this);
			var book_id = book.attr("id");
			//fetch any existing values
			var options = "option_" + book_id,
				source = book.attr("df-source");

			if (!window.dfLightBox) {
				window.dfLightBox = new DFLightBox(function () {

					window.dfActiveLightBoxBook.dispose();
					window.dfActiveLightBoxBook = null;
				});
			}

			window.dfLightBox.duration = 500;
			//verify and optimize the values
			options = options == undef || options == "" || window[options] == undef ? {} : window[options];

			source = source == undef || source == "" ? options.source : source;

			parseOptions(options);

			if (window.dfActiveLightBoxBook && window.dfActiveLightBoxBook.dispose) {
				window.dfActiveLightBoxBook.dispose();

			} else {
				window.dfLightBox.show(
					function () {
//                            $("body").addClass("df-no-scroll");
						window.dfActiveLightBoxBook = $(window.dfLightBox.container).flipBook(source, options);
					}
				);
			}


		});

		$("._df_book").each(function () {

			//cache the book element
			var book = $(this);
			var book_id = book.attr("id");
			//fetch any existing values
			var options = "option_" + book_id,
				source = book.attr("df-source");

			//verify and optimize the values
			options = options == undef || options == "" || window[options] == undef ? {} : window[options];

			source = source == undef || source == "" ? options.source : source;

			parseOptions(options);

			window[book_id.toString()] = $(book).flipBook(source, options);

		});

	});
})(jQuery);

