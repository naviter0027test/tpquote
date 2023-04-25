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
                <span>報價</span> &gt; <span>項目7 工序工時說明（委外）</span> &gt; <label>新增</label>
            </div>
            <form method='post' action='/quote/create/sub7/{{ $mainId }}' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="show-line2">
                    <h5>序號</h5>
                    <p> <input type="text" name="serialNumber" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>工序名稱</h5>
                    <p>
                        <select name="processName">
                            <option value="鞋底板">鞋底板</option>
                            <option value="裁面板">裁面板</option>
                            <option value="面板滾漆">面板滾漆</option>
                            <option value="貼紙">貼紙</option>
                            <option value="底板貼紙">底板貼紙</option>
                            <option value="面板熱轉印">面板熱轉印</option>
                            <option value="鑽孔">鑽孔</option>
                            <option value="面板合框+品檢">面板合框+品檢</option>
                            <option value="沖壓一刀">沖壓一刀</option>
                            <option value="沖壓二刀+撥取出品檢">沖壓二刀+撥取出品檢</option>
                            <option value="噴漆">噴漆</option>
                            <option value="絲印">絲印</option>
                            <option value="修邊">修邊</option>
                            <option value="底板烙印">底板烙印</option>
                            <option value="打磨">打磨</option>
                            <option value="取出品檢 打磨">取出品檢 打磨</option>
                            <option value="敲定">敲定</option>
                            <option value="取出敲木釘+鐵釘5">取出敲木釘+鐵釘5</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>材料名稱</h5>
                    <p>
                        <select name="materialName">
                            <option value="膠磁">膠磁</option>
                            <option value="單面背膠膠磁">單面背膠膠磁</option>
                            <option value="雙面覆膠軟鐵">雙面覆膠軟鐵</option>
                            <option value="鉚釘">鉚釘</option>
                            <option value="強磁">強磁</option>
                            <option value="磁石">磁石</option>
                            <option value="POF膜">POF膜</option>
                            <option value="POF袋">POF袋</option>
                            <option value="PET袋">PET袋</option>
                            <option value="自封袋">自封袋</option>
                            <option value="OPP袋">OPP袋</option>
                            <option value="OPP自黏袋">OPP自黏袋</option>
                            <option value="PE袋">PE袋</option>
                            <option value="PE夾縫袋">PE夾縫袋</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>本廠需求秒數</h5>
                    <p> <input type="number" name="localNeedSec" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>用量</h5>
                    <p> <input type="number" name="usageAmount" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>本廠工序數量</h5>
                    <p> <input type="number" name="localNeedNum" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>委外工序單價</h5>
                    <p> <input type="number" name="outProcessPrice" required /> </p>
                </div>
                <div class="show-line3">
                    <h5>工序備註</h5>
                    <p> <textarea name="processMemo" ></textarea> </p>
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
