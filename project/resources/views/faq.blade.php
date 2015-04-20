@extends('html')

@section('content')
@include('widgets.breadcrumps')
@include('widgets.title')
<div class="container margin-top-20 ">
    <div id="faq" class="bg-white" style="padding: 10px">
    @foreach($questions as $q)
    <div class="row-fluid" >
                <div class="qst ">
                    <span class="faqarrow"></span><span>{!!$q->question!!}</span>
                </div>
                <div class="ask" style="display: none">
                    {!!$q->answer!!}
                </div>
                <hr/>
            </div>
    @endforeach




    </div>
</div>
@endsection