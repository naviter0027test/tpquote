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
                <span>首頁</span>
            </div>
            <div class="content-emp">
                <div class="show-line1">
                    <label>員工名稱:</label>
                    <span>黃玄鳴</span>
                </div>
                <div class="show-line1">
                    <label>部門所屬:</label>
                    <span>練習部門</span>
                </div>
                <div class="home-panel">
                    <a href="#" class="home-btn">業務一部</a>
                    <a href="#" class="home-btn">業務二部</a>
                    <a href="#" class="home-btn">公司品項</a>
                </div>
            </div>
        </div>
@include('member.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/js/member/logout.js"></script>
</html>
