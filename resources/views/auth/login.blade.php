@extends('layouts.app')

@section('content')
<body style="background-color:#F1D18A;">
    
    <div class="text-center">
        <h1>ログイン</h1>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control','placeholder'=>'例）xxxxx@nikkityan.com']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control','placeholder'=>'パスワードを入力してください']) !!}
                </div>

                {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}

            <p>新しく日記を始める {!! link_to_route('signup.get', '新規登録') !!}</p>
        </div>
    </div>
@endsection