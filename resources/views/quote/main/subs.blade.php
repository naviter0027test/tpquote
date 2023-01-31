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
@include ('member.layout.menu')
        <div class="content">
            <div class="content-header">
                <span>報價</span> &gt; <span>子項</span> &gt; <label>列表</label>
            </div>
            <table class="table1">
                <thead>
                    <tr>
                        <td>名稱</td>
                        <td>建立時間</td>
                        <td>修改時間</td>
                        <td>操作</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>項目1 板材/木盒/主材料</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>
                            <a href='/quote/create/sub1/0' class='glyphicon glyphicon-plus'></a>
                            <a href='/quote/edit/sub1/0' class='glyphicon glyphicon-pencil'></a>
                        </td>
                    </tr>
                    <tr>
                        <td>項目1-1 木盒</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>
                            <a href='/quote/create/sub1-1/0' class='glyphicon glyphicon-plus'></a>
                            <a href='/quote/edit/sub1-1/0' class='glyphicon glyphicon-pencil'></a>
                        </td>
                    </tr>
                    <tr>
                        <td>項目2 彩盒/展示盒</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>
                            <a href='/quote/create/sub2/0' class='glyphicon glyphicon-plus'></a>
                            <a href='/quote/edit/sub2/0' class='glyphicon glyphicon-pencil'></a>
                        </td>
                    </tr>
                    <tr>
                        <td>項目2-1 印刷品</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>
                            <a href='/quote/create/sub2-1/0' class='glyphicon glyphicon-plus'></a>
                            <a href='/quote/edit/sub2-1/0' class='glyphicon glyphicon-pencil'></a>
                        </td>
                    </tr>
                    <tr>
                        <td>項目3 輔料</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>
                            <a href='/quote/create/sub3/0' class='glyphicon glyphicon-plus'></a>
                            <a href='/quote/edit/sub3/0' class='glyphicon glyphicon-pencil'></a>
                        </td>
                    </tr>
                    <tr>
                        <td>項目3-1 油漆稀釋劑</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>
                            <a href='/quote/create/sub3-1/0' class='glyphicon glyphicon-plus'></a>
                            <a href='/quote/edit/sub3-1/0' class='glyphicon glyphicon-pencil'></a>
                        </td>
                    </tr>
                    <tr>
                        <td>項目4 包材/紙箱/收縮膜</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>
                            <a href='/quote/create/sub4/0' class='glyphicon glyphicon-plus'></a>
                            <a href='/quote/edit/sub4/0' class='glyphicon glyphicon-pencil'></a>
                        </td>
                    </tr>
                    <tr>
                        <td>項目5 起始費用</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>
                            <a href='/quote/create/sub5/0' class='glyphicon glyphicon-plus'></a>
                            <a href='/quote/edit/sub5/0' class='glyphicon glyphicon-pencil'></a>
                        </td>
                    </tr>
                    <tr>
                        <td>工序總表(5-1)</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>
                            <a href='/quote/create/sub5-1/0' class='glyphicon glyphicon-plus'></a>
                            <a href='/quote/edit/sub5-1/0' class='glyphicon glyphicon-pencil'></a>
                        </td>
                    </tr>
                    <tr>
                        <td>項目6 工序工時說明（本廠）</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>
                            <a href='/quote/create/sub6/0' class='glyphicon glyphicon-plus'></a>
                            <a href='/quote/edit/sub6/0' class='glyphicon glyphicon-pencil'></a>
                        </td>
                    </tr>
                    <tr>
                        <td>項目7 工序工時說明（委外）</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>
                            <a href='/quote/create/sub7/0' class='glyphicon glyphicon-plus'></a>
                            <a href='/quote/edit/sub7/0' class='glyphicon glyphicon-pencil'></a>
                        </td>
                    </tr>
                    <tr>
                        <td>項目7-1 工序工時說明（固定委外）</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>2023-01-01 00:00:00</td>
                        <td>
                            <a href='/quote/create/sub7-1/0' class='glyphicon glyphicon-plus'></a>
                            <a href='/quote/edit/sub7-1/0' class='glyphicon glyphicon-pencil'></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
@include ('member.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/js/member/logout.js"></script>
</html>