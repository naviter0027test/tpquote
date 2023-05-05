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
                <span>報價</span> &gt; <span>工序總表</span> &gt; <label>修改</label>
            </div>
            <form method='post' action='/quote/edit/sub5-1/{{ $mainId }}' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="show-line2">
                    <h5>序號</h5>
                    <p> <input type="text" name="serialNumber" value="{{ $item->serialNumber }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>工序名稱</h5>
                    <p>
                        <select name="proccessName">
                            <option value="鞋底板" {{ $item->proccessName == '鞋底板' ? 'selected' : '' }} >鞋底板</option>
                            <option value="裁面板" {{ $item->proccessName == '裁面板' ? 'selected' : '' }} >裁面板</option>
                            <option value="面板滾漆" {{ $item->proccessName == '面板滾漆' ? 'selected' : '' }} >面板滾漆</option>
                            <option value="貼紙" {{ $item->proccessName == '貼紙' ? 'selected' : '' }} >貼紙</option>
                            <option value="底板貼紙" {{ $item->proccessName == '底板貼紙' ? 'selected' : '' }} >底板貼紙</option>
                            <option value="面板熱轉印" {{ $item->proccessName == '面板熱轉印' ? 'selected' : '' }} >面板熱轉印</option>
                            <option value="鑽孔" {{ $item->proccessName == '鑽孔' ? 'selected' : '' }} >鑽孔</option>
                            <option value="面板合框+品檢" {{ $item->proccessName == '面板合框+品檢' ? 'selected' : '' }} >面板合框+品檢</option>
                            <option value="沖壓一刀" {{ $item->proccessName == '沖壓一刀' ? 'selected' : '' }} >沖壓一刀</option>
                            <option value="沖壓二刀+撥取出品檢" {{ $item->proccessName == '沖壓二刀+撥取出品檢' ? 'selected' : '' }} >沖壓二刀+撥取出品檢</option>
                            <option value="噴漆" {{ $item->proccessName == '噴漆' ? 'selected' : '' }} >噴漆</option>
                            <option value="絲印" {{ $item->proccessName == '絲印' ? 'selected' : '' }} >絲印</option>
                            <option value="修邊" {{ $item->proccessName == '修邊' ? 'selected' : '' }} >修邊</option>
                            <option value="底板烙印" {{ $item->proccessName == '底板烙印' ? 'selected' : '' }} >底板烙印</option>
                            <option value="打磨" {{ $item->proccessName == '打磨' ? 'selected' : '' }} >打磨</option>
                            <option value="取出品檢 打磨" {{ $item->proccessName == '取出品檢 打磨' ? 'selected' : '' }} >取出品檢 打磨</option>
                            <option value="敲定" {{ $item->proccessName == '敲定' ? 'selected' : '' }} >敲定</option>
                            <option value="取出敲木釘+鐵釘5" {{ $item->proccessName == '取出敲木釘+鐵釘5' ? 'selected' : '' }} >取出敲木釘+鐵釘5</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>廠商</h5>
                    <p>
                        <select name="firm">
                            <option value="自製" {{ $item->firm == '自製' ? 'selected' : '' }} >自製</option>
                            <option value="委外" {{ $item->firm == '委外' ? 'selected' : '' }} >委外</option>
                        </select>
                    </p>
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
