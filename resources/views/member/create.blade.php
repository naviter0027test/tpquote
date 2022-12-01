<html>
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name', '') }}</title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
        <link href='/lib/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet' />
        <link href='/lib/bootstrap/dist/css/bootstrap-theme.min.css' rel='stylesheet' />
        <link href='/lib/selectize.js-master/dist/css/selectize.default.css' rel='stylesheet' />
        <link href='/css/member/body.css' rel='stylesheet' />
        <link href='/css/member/login.css' rel='stylesheet' />
    </head>
    <body>
@include('member.layout.menu')
        <div class="content">
            <div class="content-header">
                <span>首頁</span> &gt; <label>新增</label>
            </div>
            <form method='post' action='/member/create' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <h5>帳號</h5>
                <p> <input type="text" name="account" required /> </p>
                <h5>密碼</h5>
                <p> <input type="password" name="pass" required /> </p>
                <h5>名稱</h5>
                <p> <input type="text" name="userName" required /> </p>
                <h5>權限</h5>
                <p>
                    <select name="memPermissionId">
                        <option value="1">採購部</option>
                        <option value="2">採購主管</option>
                        <option value="3">台北開發</option>
                        <option value="4">總經理/業務</option>
                        <option value="5">工業成本會計</option>
                        <option value="6">財務主管</option>
                        <option value="7">系統管理者</option>
                    </select>
                </p>
                <p class=""> <button class="btn">新增</button> </p>
            </form>
        </div>
@include('member.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/lib/selectize.js-master/dist/js/standalone/selectize.js"></script>
    <script src="/js/member/edit.js"></script>
    <script src="/js/member/logout.js"></script>
</html>
