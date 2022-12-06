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
                <span>報價</span> &gt; <span>新增</span> &gt; <label>1 - 1</label>
            </div>
            <form method='post' action='/quote/create/main' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="mainId" value="" />
                <div class="show-line2">
                    <h5>序號</h5>
                    <p> <input type="text" name="serialNumber" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>料號</h5>
                    <p> <input type="text" name="materialNumber" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>材料名稱</h5>
                    <p> <input type="text" name="materialName" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>長</h5>
                    <p> <input type="text" name="length" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>寬</h5>
                    <p> <input type="text" name="width" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>高</h5>
                    <p> <input type="text" name="height" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>用量</h5>
                    <p> <input type="number" name="usageAmount" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>等級</h5>
                    <p> <input type="text" name="level" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>EO1</h5>
                    <p> <input type="text" name="eo1" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>FSC</h5>
                    <p> <input type="text" name="fsc" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>材料單價</h5>
                    <p> <input type="text" name="materialPrice" required /> </p>
                </div>
                <div class="show-line3">
                    <h5>規格</h5>
                    <p> <textarea name="spec" required ></textarea> </p>
                </div>
                <div class="show-line3">
                    <h5>說明</h5>
                    <p> <textarea name="info" ></textarea> </p>
                </div>
                <div class="show-line3">
                    <h5>內容</h5>
                    <p> <textarea name="content" ></textarea> </p>
                </div>
                <p class=""> <button class="btn">建立</button> </p>
            </form>
        </div>
@include('member.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/lib/selectize.js-master/dist/js/standalone/selectize.js"></script>
    <script src="/js/member/edit.js"></script>
    <script src="/js/member/logout.js"></script>
</html>
