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
@include ('member.layout.menu')
        <div class="content">
            <div class="content-header">
                <span>報價</span> &gt; <span>項目3-1 輔料</span> &gt; <label>新增</label>
            </div>
            <form method='post' action='/quote/create/sub3-1/{{ $mainId }}' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="show-line2">
                    <h5>序號</h5>
                    <p> <input type="text" name="serialNumber" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>名稱</h5>
                    <p>
                        <select name="name">
                            <option value="滾漆">滾漆</option>
                            <option value="噴漆">噴漆</option>
                            <option value="絲印">絲印</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>上漆面</h5>
                    <p>
                        <select name="painted">
                            <option value="二底一面">二底一面</option>
                            <option value="二底二面">二底二面</option>
                            <option value="二底三面">二底三面</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>價格小計</h5>
                    <p> <input type="number" name="subtotal" required /> </p>
                </div>
                <div class="show-line3">
                    <h5>備註</h5>
                    <p> <textarea name="memo" ></textarea> </p>
                </div>
                <div class="show-line3">
                    <button class="btn-style1">儲存</button>
                </div>
            </form>
        </div>
@include ('member.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/lib/selectize.js-master/dist/js/standalone/selectize.js"></script>
    <script src="/js/quote/sub2/edit.js"></script>
    <script src="/js/member/logout.js"></script>
</html>
