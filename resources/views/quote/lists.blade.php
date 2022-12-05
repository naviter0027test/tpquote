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
                <span>報價</span> &gt; <label>列表</label>
                <div class="operation-panel">
                    <a href="/quote/create-1" class="btn-style1">新增</a>
                </div>
            </div>
            <table class="table1">
                <thead>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
@include('member.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/js/member/logout.js"></script>
</html>
