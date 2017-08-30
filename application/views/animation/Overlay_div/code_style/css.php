<pre>
<code class="css">
.m-overlay
{
	 position: fixed;
	 top: 0;
	 left: 0;
	 width: 100%;
	 height: 100%;
	 z-index: 9999999;
  	 background: rgba(0, 0, 0, 0.5);
  	 border-radius: 3px;
  	 overflow: hidden;
}

.m-overlay &gt; .m-overlay-text
{
	position: relative;
  	top: 50%;
  	left: 30%;
  	margin-left: -15px;
  	margin-top: -15px;
  	color: #fff;
  	font-size: 30px;
}
</code>
</pre>