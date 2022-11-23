<html>
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name', '') }}</title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
        <link href='/lib/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet' />
        <link href='/lib/bootstrap/dist/css/bootstrap-theme.min.css' rel='stylesheet' />
        <link href='/css/member/body.css' rel='stylesheet' />
        <link href='/css/member/login.css' rel='stylesheet' />
    </head>
    <body>
        <div class="loginDiv">
            <h3 class="memberName">{{ config('app.name', '') }}</h3>
            <form class="loginForm" method="post" action="/member/login">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <h5>帳號:</h5>
                <p> <input type="text" name="account" /> </p>
                <h5>密碼:</h5>
                <p> <input type="password" name="pass" /> </p>
                <p class="loginBtnP"> <button class="btn loginSubmit">登入</button> </p>
            </form>
            @if (session('msg'))
            <div class="alert alert-danger"> {{ session('msg') }} </div>
            @endif
        </div>
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
</html>
