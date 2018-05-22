@extends('layouts.app')

@section('content')

<body style="background-color:#F1D18A;">
    
    <div class="text-center">
        <h1>アカウント作成</h1>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', '日記名') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control' , 'placeholder'=>'〇〇日記']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control'  , 'placeholder'=>'例）xxxxx@nikkityan.com']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control'  , 'placeholder'=>'パスワード入力']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', '再パスワード') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control'  , 'placeholder'=>'もう一度入力してください']) !!}
                </div>

                {!! Form::submit('新規登録    ', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
            
        </div>
    </div>
@endsection