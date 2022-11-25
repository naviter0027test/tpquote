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
@include('member.layout.menu')
        <div class="content">
            <div class="content-header">
                <span>修改密碼</span>
            </div>
            <form method='post' action='/member/password' class='form1'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <h5>請輸入舊密碼:</h5>
                <p>
                    <input type="password" name="oldPass" id="oldPass" required />
                    <label for="passwordOld" class="error col-xs-12"></label>
                </p>
                <h5>請輸入新密碼:</h5>
                <p>
                    <input type="password" name="pass" id="pass" required />
                    <label for="password" class="error col-xs-12"></label>
                </p>
                <h5>請輸入新密碼:</h5>
                <p>
                    <input type="password" name="passConfirm" id="passConfirm" required />
                    <label for="passwordConfirm" class="error col-xs-12"></label>
                </p>
                <p class="loginBtnP"> <button class="btn">更改</button> </p>
            </form>
        </div>
@include('member.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/lib/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="/lib/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="/lib/jquery-validation/dist/localization/messages_zh_TW.min.js"></script>
    <script src="/js/member/password.js"></script>
    <script src="/js/member/logout.js"></script>
</html>
