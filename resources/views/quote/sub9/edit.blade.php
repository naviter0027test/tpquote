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
                <span>報價</span> &gt; <span>項目9 運費</span> &gt; <label>修改</label>
            </div>
            <form method='post' action='/quote/edit/sub9/{{ $mainId }}' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="show-line2">
                    <h5>港口</h5>
                    <p>
                        <select name="port">
                            <option value="1" {{ $item->port == '1' ? 'selected' : '' }} >高雄</option>
                            <option value="2" {{ $item->port == '2' ? 'selected' : '' }} >東京</option>
                            <option value="3" {{ $item->port == '3' ? 'selected' : '' }} >首爾</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>使用計算公式</h5>
                    <p>
                        <select name="formula">
                            <option value="1" {{ $item->formula == '1' ? 'selected' : '' }} >公式 1</option>
                            <option value="2" {{ $item->formula == '2' ? 'selected' : '' }} >公式 2</option>
                            <option value="3" {{ $item->formula == '3' ? 'selected' : '' }} >公式 3</option>
                            <option value="4" {{ $item->formula == '4' ? 'selected' : '' }} >公式 4</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>運費</h5>
                    <p> <input type="number" name="freight" required readonly /> </p>
                </div>
                <div class="show-line3">
                    <button class="btn-style1">儲存</button>
                </div>
                <div class="show-line3">
                    <div class="info">
                        <h3>說明</h3>
                        <p>報關費:150, 商檢費:150, 提單費:500, 封船費:50, 場站費:45</p>
                        <p>港口:高雄(5400)、東京(4200)、首爾(4400)</p>
                        <ul>
                            <li>公式1:報關費 + 商檢費 + 提單費 + 港口</li>
                            <li>公式2:報關費 + 商檢費 + 封船費 + 港口</li>
                            <li>公式3:報關費 + 提單費 + 場站費 + 港口</li>
                            <li>公式4:報關費 + 封船費 + 場站費 + 港口</li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
@include ('member.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/lib/selectize.js-master/dist/js/standalone/selectize.js"></script>
    <script src="/js/quote/sub9/edit.js"></script>
    <script src="/js/member/logout.js"></script>
</html>
