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
                            <option value="1" @if ($item->quoteCls == 1) {{ 'selected' }} @endif >業務一部</option>
                            <option value="2" @if ($item->quoteCls == 2) {{ 'selected' }} @endif >業務二部</option>
                            <option value="3" @if ($item->quoteCls == 3) {{ 'selected' }} @endif >公司品項</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>客人產品編號</h5>
                    <p> <input type="text" name="customerProductNum" value="{{ $item->customerProductNum }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>產品編號</h5>
                    <p> <input type="text" name="productNum" value="{{ $item->productNum }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>中文產品名稱</h5>
                    <p> <input type="text" name="productNameTw" value="{{ $item->productNameTw }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>英文產品名稱</h5>
                    <p> <input type="text" name="productNameEn" value="{{ $item->productNameEn }}" /> </p>
                </div>
                <div class="show-line2">
                    <h5>品質要求</h5>
                    <p>
                        <select name="quoteQuality">
                            <option value="高" @if ($item->quoteQuality == "高") {{ 'selected' }} @endif >高</option>
                            <option value="中高" @if ($item->quoteQuality == "中高") {{ 'selected' }} @endif >中高</option>
                            <option value="普通" @if ($item->quoteQuality == "普通") {{ 'selected' }} @endif >普通</option>
                            <option value="低" @if ($item->quoteQuality == "低") {{ 'selected' }} @endif >低</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>報價數量</h5>
                    <p>
                        <select name="quoteQuantity">
                            <option value="MOQ-1K" @if ($item->quoteQuantity == "MOQ-1K") {{ 'selected' }} @endif >MOQ(1K)</option>
                            <option value="3K" @if ($item->quoteQuantity == "3K") {{ 'selected' }} @endif >3K</option>
                            <option value="5K" @if ($item->quoteQuantity == "5K") {{ 'selected' }} @endif >5K</option>
                            <option value="10K" @if ($item->quoteQuantity == "10K") {{ 'selected' }} @endif >10K</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>插入圖片</h5>
                    @if (trim($item->image) == '')
                    無
                    @else
                    <img class="custPic" src="/uploads{{ $item->image }}" />
                    @endif
                    <p> <input type="file" name="image" /> </p>
                </div>
                <div class="show-line3">
                    <h5>產品說明</h5>
                    <p> <textarea name="productInfo" >{{ $item->productInfo }}</textarea> </p>
                </div>
                <div class="show-line3">
                    <p class=""> <button class="btn">儲存</button> </p>
                </div>
            </form>
        </div>
@include('member.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/lib/selectize.js-master/dist/js/standalone/selectize.js"></script>
    <script src="/js/member/edit.js"></script>
    <script src="/js/member/logout.js"></script>
</html>
