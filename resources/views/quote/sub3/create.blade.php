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
                <span>報價</span> &gt; <span>項目3 輔料</span> &gt; <label>新增</label>
            </div>
            <form method='post' action='/quote/create/sub3/{{ $mainId }}' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="show-line2">
                    <h5>料號</h5>
                    <p> <input type="text" name="partNo" required /> </p>
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
                            <option value="PVC片">PVC片</option>
                            <option value="PVC盒">PVC盒</option>
                            <option value="PVC板">PVC板</option>
                            <option value="PVC吸塑">PVC吸塑</option>
                            <option value="PET片">PET片</option>
                            <option value="PET袋">PET袋</option>
                            <option value="PET盒">PET盒</option>
                            <option value="PET罐">PET罐</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>長</h5>
                    <p> <input type="number" name="length" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>寬</h5>
                    <p> <input type="number" name="width" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>高</h5>
                    <p> <input type="number" name="height" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>用量</h5>
                    <p> <input type="number" name="usageAmount" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>規格</h5>
                    <p>
                        <select name="spec">
                            <option value="H9mm">H9mm</option>
                            <option value="釘帽直徑6mm">釘帽直徑6mm</option>
                            <option value="孔徑2mm">孔徑2mm</option>
                            <option value="孔深8mm">孔深8mm</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>插入說明圖片</h5>
                    <p> <input type="file" name="infoImg" /> </p>
                </div>
                <div class="show-line3">
                    <h5>說明</h5>
                    <p> <textarea name="info" ></textarea> </p>
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
