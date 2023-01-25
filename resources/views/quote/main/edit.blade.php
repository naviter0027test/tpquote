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
                <span>報價</span> &gt; <span>編輯</span> &gt; <label>主要</label>
            </div>
            <form method='post' action='/quote/edit/main/{{ $item->id }}' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="show-line2">
                    <h5>報價類別</h5>
                    <p>
                        <select name="quoteCls">
                            <option value="1">業務一部</option>
                            <option value="2">業務二部</option>
                            <option value="3">公司品項</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>客人產品編號</h5>
                    <p> <input type="text" name="customerProductNum" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>產品編號</h5>
                    <p> <input type="text" name="productNum" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>中文產品名稱</h5>
                    <p> <input type="text" name="productNameTw" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>英文產品名稱</h5>
                    <p> <input type="text" name="productNameEn" /> </p>
                </div>
                <div class="show-line2">
                    <h5>品質要求</h5>
                    <p>
                        <select name="quoteCls">
                            <option value="高">高</option>
                            <option value="中高">中高</option>
                            <option value="普通">普通</option>
                            <option value="低">低</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>報價數量</h5>
                    <p>
                        <select name="quoteQuantity">
                            <option value="MOQ-1K">MOQ(1K)</option>
                            <option value="3K">3K</option>
                            <option value="5K">5K</option>
                            <option value="10K">10K</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>插入圖片</h5>
                    <p> <input type="file" name="image" /> </p>
                </div>
                <div class="show-line3">
                    <h5>產品說明</h5>
                    <p> <textarea name="productInfo" ></textarea> </p>
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
