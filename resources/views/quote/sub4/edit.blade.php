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
                <span>報價</span> &gt; <span>項目4 包材/紙箱/收縮膜</span> &gt; <label>修改</label>
            </div>
            <form method='post' action='/quote/edit/sub4/{{ $mainId }}' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="show-line2">
                    <h5>序號</h5>
                    <p> <input type="text" name="serialNumber" value="{{ $item->serialNumber }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>料號</h5>
                    <p> <input type="text" name="partNo" value="{{ $item->partNo }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>材料名稱</h5>
                    <p>
                        <select name="materialName">
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
                    <h5>產地</h5>
                    <p>
                        <select name="origin">
                            <option value="國產" {{ $item->origin == '國產' ? 'selected' : '' }} >國產</option>
                            <option value="進口" {{ $item->origin == '進口' ? 'selected' : '' }} >進口</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>厚度</h5>
                    <p>
                        <select name="thickness">
                            <option value="0.019" {{ $item->thickness == '0.019' ? 'selected' : '' }} >0.019</option>
                            <option value="0.025" {{ $item->thickness == '0.025' ? 'selected' : '' }} >0.025</option>
                            <option value="0.037" {{ $item->thickness == '0.037' ? 'selected' : '' }} >0.037</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>耗損</h5>
                    <p> <input type="number" name="loss" value="{{ $item->loss }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>單價</h5>
                    <p> <input type="number" name="price" value="{{ $item->price }}" required /> </p>
                </div>
                <div class="show-line3">
                    <h5>備註說明</h5>
                    <p> <textarea name="memo" >{{ $item->memo }}</textarea> </p>
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
