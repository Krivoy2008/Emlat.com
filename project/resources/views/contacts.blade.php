@extends('html')

@section('content')
@include('widgets.breadcrumps')
@include('widgets.title')
<div class="container margin-top-20 ">
    <div id="contact" style="padding: 50px" class="bg-white">
        <div class="row">
        <div class="col-md-6">
            {{Lang::get('contacts.text')}}
        </div>
        <div class="col-md-6">
            <div class="col-md-6">
                <table>
                    <tr>
                        <td><img src="/images/contuct_us.png" alt="contact_us"/></td>
                        <td><span style="font-size: 18px"><b style="font-family: 'Fregat';font-size: 17px;padding-top: 4px">{{Lang::get('contacts.service')}}</b><div class="clearfix"></div> <span style="margin-top: 7px;display: inline-block">+1 938 398-372</span></span></td>

                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <span style="color: #3a7400;font-size: 22px;font-weight: 300"> info@emlat.com</span >
            </div>



        </div>
        </div>
    </div>

</div>
<div class="container margin-top-20">
    <div id="contact_form" >

            <h3>{{Lang::get('contacts.drop_us')}}</h3>
            {!!Form::open(['method'=>'post','action'=>['ContactsController@sendMail']])!!}
                            <div class="form-inline">
                            {!!Form::input('text','name',null,['class'=>'form-control','placeholder'=>Lang::get('contacts.name'),'required'=>'required'])!!}
                            {!!Form::input('email','email',null,['class'=>'form-control','placeholder'=>Lang::get('contacts.email'),'required'=>'required'])!!}
                            </div>
                            {!!Form::textarea('text',null,['style'=>'resize:none','rows'=>3,'class'=>'form-control comment_text','cols'=>'50','placeholder'=>Lang::get('contacts.comment_placeholder'),'required'=>'required'])!!}
                            {!!Form::input('submit','send',Lang::get('contacts.submit'),['class'=>'btn btn-primary'])!!}
                        {!!Form::close()!!}



    </div>

</div>
<style>
    #contact_form input[type="submit"] {
        background: url("/images/btn_comment.jpg") repeat scroll 0 0 rgba(0, 0, 0, 0);
        border: medium none;
        border-radius: 4px;
        color: #000;
        font: 400 18px "Fregat";
        height: 50px;
        margin-top: 10px;
        width: 200px;
    }
    #contact_form{
        background: none repeat scroll 0 0 #bdd2a9;
        border-radius: 10px;
        margin-top: 20px;
        padding: 20px;
    }
    #contact span:last-child{
        /*padding-left: 10px;*/

    }
    #contact table tr td:nth-child(2){
        padding-left: 20px;
    }
</style>


@endsection