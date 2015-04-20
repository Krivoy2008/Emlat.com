@extends('html')

@section('content')

<style>
p{
display: block;
}
h3{
margin-top: 0;
margin-bottom: 14px;

}
.bg-white{

}
</style>
<link rel="stylesheet" href="/js/highlight/styles/default.css">
<script src="/js/highlight/highlight.pack.js"></script>



<link type="text/css" rel="stylesheet" href="http://binary/api/css">
<script type="text/javascript" src="http://binary/api/jsloc"></script>
<script type="text/javascript" src="http://binary/api/js"></script>
<script type="text/javascript">

$(document).ready(function(){
	$('#currency-widget').currency();
});
</script>
<div class="container bg-white margin-top-20" style="padding: 20px">
<div class="row">
<div id="currency-widget" class="col-md-3" >

</div>
<div class="col-md-9">
<h3>To Insert this converter to your site you need insert this code in your site source code</h3>
<div class="row">

<pre><code><span class="hljs-tag">&lt;<span class="hljs-title">link</span> <span class="hljs-attribute">rel</span>=<span class="hljs-value">"stylesheet"</span> <span class="hljs-attribute">href</span>=<span class="hljs-value">"http://binary/api/css"</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">script</span> <span class="hljs-attribute">src</span>=<span class="hljs-value">"http://binary/api/jsloc"</span>&gt;</span><span class="javascript"></span><span class="hljs-tag">&lt;/<span class="hljs-title">script</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">script</span> <span class="hljs-attribute">src</span>=<span class="hljs-value">"http://binary/api/js"</span>&gt;</span><span class="javascript"></span><span class="hljs-tag">&lt;/<span class="hljs-title">script</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">script</span>&gt;</span>
$(document).ready(function(){
	$('#currency-widget').currency();
});
&lt;/<span class="hljs-title">script</span>&gt;</span>
</code></pre>
</div>
</div>
</div>
</div>
<script type="text/javascript">hljs.initHighlightingOnLoad();</script>





@endsection
