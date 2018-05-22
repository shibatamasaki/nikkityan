@extends('layouts.app')

@section('content')

<body style="background-color:#F1D18A;">

<div class="row">
    <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-6 col-lg-offset-3">
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', '# 日記名') !!}
                {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'日記名を入力してください']) !!}
            </div>
                {!! Form::submit('更新', ['class' => 'btn btn-primary btn-block']) !!}
                {!! Form::close() !!}
            <br>
        <p>画像変更はこちら <a href = "https://ja.gravatar.com/">#Gravatar</a></p>
    </div>
</div>
    
    
    
@endsection