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
                <span>報價</span> &gt; <span>項目3 輔料</span> &gt; <label>修改</label>
            </div>
            <form method='post' action='/quote/edit/sub3/{{ $mainId }}' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="show-line2">
                    <h5>料號</h5>
                    <p> <input type="text" name="partNo" value="{{ $item->partNo }}" required /> </p>
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
                            <option value="PVC片" {{ $item->materialName == 'PVC片' ? 'selected' : '' }} >PVC片</option>
                            <option value="PVC盒" {{ $item->materialName == 'PVC盒' ? 'selected' : '' }} >PVC盒</option>
                            <option value="PVC板" {{ $item->materialName == 'PVC板' ? 'selected' : '' }} >PVC板</option>
                            <option value="PVC吸塑" {{ $item->materialName == 'PVC吸塑' ? 'selected' : '' }} >PVC吸塑</option>
                            <option value="PET片" {{ $item->materialName == 'PET片' ? 'selected' : '' }} >PET片</option>
                            <option value="PET袋" {{ $item->materialName == 'PET袋' ? 'selected' : '' }} >PET袋</option>
                            <option value="PET盒" {{ $item->materialName == 'PET盒' ? 'selected' : '' }} >PET盒</option>
                            <option value="PET罐" {{ $item->materialName == 'PET罐' ? 'selected' : '' }} >PET罐</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>長</h5>
                    <p> <input type="number" name="length" value="{{ $item->length }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>寬</h5>
                    <p> <input type="number" name="width" value="{{ $item->width }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>高</h5>
                    <p> <input type="number" name="height" value="{{ $item->height }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>用量</h5>
                    <p> <input type="number" name="usageAmount" value="{{ $item->usageAmount }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>規格</h5>
                    <p>
                        <select name="spec">
                            <option value="H9mm" {{ $item->spec == 'H9mm' ? 'selected' : '' }} >H9mm</option>
                            <option value="釘帽直徑6mm" {{ $item->spec == '釘帽直徑6mm' ? 'selected' : '' }} >釘帽直徑6mm</option>
                            <option value="孔徑2mm" {{ $item->spec == '孔徑2mm' ? 'selected' : '' }} >孔徑2mm</option>
                            <option value="孔深8mm" {{ $item->spec == '孔深8mm' ? 'selected' : '' }} >孔深8mm</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>插入說明圖片</h5>
                    @if (trim($item->infoImg) == '')
                    無
                    @else
                    <img class="custPic" src="/uploads{{ $item->infoImg }}" />
                    @endif
                    <p> <input type="file" name="infoImg" /> </p>
                </div>
                <div class="show-line3">
                    <h5>說明</h5>
                    <p> <textarea name="info" >{{ $item->info }}</textarea> </p>
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
