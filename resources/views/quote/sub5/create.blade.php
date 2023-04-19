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
                <span>報價</span> &gt; <span>項目5 起始費用</span> &gt; <label>新增</label>
            </div>
            <form method='post' action='/quote/create/sub5/{{ $mainId }}' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="show-line2">
                    <h5>序號</h5>
                    <p> <input type="text" name="serialNumber" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>訂單數量</h5>
                    <p> <input type="number" name="orderNum" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>價格小計</h5>
                    <p> <input type="number" name="priceSubtotal" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>攤平小計</h5>
                    <p> <input type="number" name="flattenSubtotal" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>包裝方式</h5>
                    <p>
                        <select name="packageMethod">
                            <option value="展示盒">展示盒</option>
                            <option value="收縮">收縮</option>
                            <option value="木盒">木盒</option>
                            <option value="彩盒">彩盒</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>裝箱方式</h5>
                    <p>
                        <select name="boxMethod">
                            <option value="展示盒">展示盒</option>
                            <option value="內箱">內箱</option>
                            <option value="外箱">外箱</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>填表人訊息日期</h5>
                    <input type="hidden" name="fillDate" />
                    <p> <input type="date" name="fillDateInput" /> </p>
                </div>
                <div class="show-line2">
                    <h5>開發填表人日期</h5>
                    <input type="hidden" name="devFillDate" />
                    <p> <input type="date" name="devFillDateInput" /> </p>
                </div>
                <div class="show-line2">
                    <h5>審核人日期</h5>
                    <input type="hidden" name="auditDate" />
                    <p> <input type="date" name="auditDateInput" /> </p>
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
    <script src="/js/quote/sub5/edit.js"></script>
    <script src="/js/member/logout.js"></script>
</html>
