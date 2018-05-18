@extends('layouts.app')

@section('content')

    @if (Auth::check())
        <div class="row">
            <aside class="col-md-4">
            </aside>
            <div class="col-xs-8">
                @if (count($microposts) > 0)
                    @include('microposts.microposts', ['microposts' => $microposts])
                @endif
            </div>
        </div>
    @else

    <body style="background-color:#F1D18A">
        
        <div class="text-center">
            <img src="image01.png" style = "height : 200px; margin:30px;"></img>
        </div>
        <div class="text-center">  
            {!! link_to_route('signup.get', '今すぐはじめる', null, ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    
    @endif
@endsection