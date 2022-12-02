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
                <span>查看權限</span>
            </div>
            <table class="table1">
                <thead>
                    <tr>
                        <td>名稱</td>
                        <td>板材 木盒 主材料</td>
                        <td>印刷品 標籤</td>
                        <td>輔料</td>
                        <td>包材 紙箱 收縮膜</td>
                        <td>起始費用</td>
                        <td>工序工時說明(本廠)</td>
                        <td>工序工時說明(委外)</td>
                        <td>商辦</td>
                        <td>運費</td>
                        <td>實際下單成本</td>
                        <td>成員管理</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>權限者1</td>
                        <td>編輯</td>
                        <td>編輯</td>
                        <td>編輯</td>
                        <td>查看</td>
                        <td>查看</td>
                        <td>查看</td>
                        <td>查看</td>
                        <td>查看</td>
                        <td>查看</td>
                        <td>查看</td>
                        <td>無</td>
                    </tr>
                    <tr>
                        <td>權限者2</td>
                        <td>查看</td>
                        <td>查看</td>
                        <td>查看</td>
                        <td>查看</td>
                        <td>查看</td>
                        <td>查看</td>
                        <td>查看</td>
                        <td>查看</td>
                        <td>查看</td>
                        <td>查看</td>
                        <td>無</td>
                    </tr>
                    <tr>
                        <td>權限者2</td>
                        <td>編輯</td>
                        <td>編輯</td>
                        <td>編輯</td>
                        <td>編輯</td>
                        <td>編輯</td>
                        <td>編輯</td>
                        <td>編輯</td>
                        <td>編輯</td>
                        <td>編輯</td>
                        <td>編輯</td>
                        <td>編輯</td>
                    </tr>
                </tbody>
            </table>
        </div>
@include('member.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/js/member/logout.js"></script>
</html>
