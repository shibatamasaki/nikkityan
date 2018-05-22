@extends('layouts.app')

@section('content')

<body style="background-color:#F1D18A;">

    <div class="row">
        <aside class="hidden-xs , col-sm-4 , col-md-4 , col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
            
            {!! link_to_route('users.edit', 'プロフィール設定', ['id' => $user->id]) !!}
            
            <br>
            
        </aside>
        <div class="col-xs-12 , col-sm-8 , col-md-8 , col-lg-8">

            @if (Auth::user()->id == $user->id)
              {!! Form::open(['route' => 'microposts.store']) !!}
                  <div class="form-group" style = "height:280px;">
                      <p># {{ $user->name }} <span class="badge">{{ $count_microposts }}</span></p>
                      {!! Form::date('date', date('Y-m-d'), ['class' => 'form-control']) !!}
                      {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '8','placeholder'=>'日記を書いてみよう']) !!}
                      {!! Form::submit('投稿', ['class' => 'btn btn-primary btn-block']) !!}
                  </div>
              {!! Form::close() !!}
            @endif
            <p># 過去日記</p>
            @if (count($microposts) > 0)
                @include('microposts.microposts', ['microposts' => $microposts])
            @endif
        </div>
    </div>
    
@endsection