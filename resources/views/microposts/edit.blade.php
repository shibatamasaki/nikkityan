<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>超シンプル日記</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        
    </head>
<body style="background-color:#F1D18A;">
        <div class="container">
            @include('commons.error_messages')
            @yield('content')
        </div>


<script>
    function submitChk () {
        var flag = confirm ( "本当に削除してよろしいですか？");
        return flag;
    }
</script>

<header>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="/image02.png" style = "height:25px;"></img></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">設定<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li role="separator" class="divider"></li>
                            <li>{!! link_to_route('users.edit', 'プロフィール設定', ['id' => $micropost->user->id]) !!}</li>
                            <li>{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
         
    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-6 col-lg-offset-3">
            
            {!! Form::model($micropost, ['route' => ['microposts.update', $micropost->id], 'method' => 'put']) !!}
                
                <div class="form-group">
                    {!! Form::label('date', '# 日時') !!}
                </div>
                <div class="form-group">
                {!! Form::date('date', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('content', '# 日記内容') !!}
                </div>
                <div class="form-group">
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
                </div>
                
            {!! Form::close() !!}
            
            <div class="form-group">
            {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            </div>
            
            <div class="form-group">
            {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete','onsubmit' => 'return submitChk()']) !!}
                {!! Form::submit('テスト', ['class' => 'btn btn-danger','onsubmit' => 'return submitChk()']) !!}
            {!! Form::close() !!}
            </div>
            
        </div>
    </div>

</body>