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
                <span>報價</span> &gt; <span>項目7 工序工時說明（委外）</span> &gt; <label>修改</label>
            </div>
            <form method='post' action='/quote/edit/sub7/{{ $mainId }}' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="show-line2">
                    <h5>序號</h5>
                    <p> <input type="text" name="serialNumber" value="{{ $item->serialNumber }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>工序名稱</h5>
                    <p>
                        <select name="processName">
                            <option value="鞋底板" {{ $item->processName == '鞋底板' ? 'selected' : '' }} >鞋底板</option>
                            <option value="裁面板" {{ $item->processName == '裁面板' ? 'selected' : '' }} >裁面板</option>
                            <option value="面板滾漆" {{ $item->processName == '面板滾漆' ? 'selected' : '' }} >面板滾漆</option>
                            <option value="貼紙" {{ $item->processName == '貼紙' ? 'selected' : '' }} >貼紙</option>
                            <option value="底板貼紙" {{ $item->processName == '底板貼紙' ? 'selected' : '' }} >底板貼紙</option>
                            <option value="面板熱轉印" {{ $item->processName == '面板熱轉印' ? 'selected' : '' }} >面板熱轉印</option>
                            <option value="鑽孔" {{ $item->processName == '鑽孔' ? 'selected' : '' }} >鑽孔</option>
                            <option value="面板合框+品檢" {{ $item->processName == '面板合框+品檢' ? 'selected' : '' }} >面板合框+品檢</option>
                            <option value="沖壓一刀" {{ $item->processName == '沖壓一刀' ? 'selected' : '' }} >沖壓一刀</option>
                            <option value="沖壓二刀+撥取出品檢" {{ $item->processName == '沖壓二刀+撥取出品檢' ? 'selected' : '' }} >沖壓二刀+撥取出品檢</option>
                            <option value="噴漆" {{ $item->processName == '噴漆' ? 'selected' : '' }} >噴漆</option>
                            <option value="絲印" {{ $item->processName == '絲印' ? 'selected' : '' }} >絲印</option>
                            <option value="修邊" {{ $item->processName == '修邊' ? 'selected' : '' }} >修邊</option>
                            <option value="底板烙印" {{ $item->processName == '底板烙印' ? 'selected' : '' }} >底板烙印</option>
                            <option value="打磨" {{ $item->processName == '打磨' ? 'selected' : '' }} >打磨</option>
                            <option value="取出品檢 打磨" {{ $item->processName == '取出品檢 打磨' ? 'selected' : '' }} >取出品檢 打磨</option>
                            <option value="敲定" {{ $item->processName == '敲定' ? 'selected' : '' }} >敲定</option>
                            <option value="取出敲木釘+鐵釘5" {{ $item->processName == '取出敲木釘+鐵釘5' ? 'selected' : '' }} >取出敲木釘+鐵釘5</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>材料名稱</h5>
                    <p>
                        <select name="materialName">
                            <option value="膠磁" {{ $item->materialName == '膠磁' ? 'selected' : '' }} >膠磁</option>
                            <option value="單面背膠膠磁" {{ $item->materialName == '單面背膠膠磁' ? 'selected' : '' }} >單面背膠膠磁</option>
                            <option value="雙面覆膠軟鐵" {{ $item->materialName == '雙面覆膠軟鐵' ? 'selected' : '' }} >雙面覆膠軟鐵</option>
                            <option value="鉚釘" {{ $item->materialName == '鉚釘' ? 'selected' : '' }} >鉚釘</option>
                            <option value="強磁" {{ $item->materialName == '強磁' ? 'selected' : '' }} >強磁</option>
                            <option value="磁石" {{ $item->materialName == '磁石' ? 'selected' : '' }} >磁石</option>
                            <option value="POF膜" {{ $item->materialName == 'POF膜' ? 'selected' : '' }} >POF膜</option>
                            <option value="POF袋" {{ $item->materialName == 'POF袋' ? 'selected' : '' }} >POF袋</option>
                            <option value="PET袋" {{ $item->materialName == 'PET袋' ? 'selected' : '' }} >PET袋</option>
                            <option value="自封袋" {{ $item->materialName == '自封袋' ? 'selected' : '' }} >自封袋</option>
                            <option value="OPP袋" {{ $item->materialName == 'OPP袋' ? 'selected' : '' }} >OPP袋</option>
                            <option value="OPP自黏袋" {{ $item->materialName == 'OPP自黏袋' ? 'selected' : '' }} >OPP自黏袋</option>
                            <option value="PE袋" {{ $item->materialName == 'PE袋' ? 'selected' : '' }} >PE袋</option>
                            <option value="PE夾縫袋" {{ $item->materialName == 'PE夾縫袋' ? 'selected' : '' }} >PE夾縫袋</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>本廠需求秒數</h5>
                    <p> <input type="number" name="localNeedSec" value="{{ $item->localNeedSec }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>用量</h5>
                    <p> <input type="number" name="usageAmount" value="{{ $item->usageAmount }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>本廠工序數量</h5>
                    <p> <input type="number" name="localNeedNum" value="{{ $item->localNeedNum }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>委外工序單價</h5>
                    <p> <input type="number" name="outProcessPrice" value="{{ $item->outProcessPrice }}" required /> </p>
                </div>
                <div class="show-line3">
                    <h5>工序備註</h5>
                    <p> <textarea name="processMemo" >{{ $item->processMemo }}</textarea> </p>
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
