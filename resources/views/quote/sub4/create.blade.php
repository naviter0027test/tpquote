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
                <span>報價</span> &gt; <span>項目4 包材/紙箱/收縮膜</span> &gt; <label>新增</label>
            </div>
            <form method='post' action='/quote/create/sub4/{{ $mainId }}' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="show-line2">
                    <h5>序號</h5>
                    <p> <input type="text" name="serialNumber" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>料號</h5>
                    <p> <input type="text" name="partNo" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>材料名稱</h5>
                    <p>
                        <select name="materialName">
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
                    <h5>產地</h5>
                    <p>
                        <select name="origin">
                            <option value="國產">國產</option>
                            <option value="進口">進口</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>厚度</h5>
                    <p>
                        <select name="thickness">
                            <option value="0.019">0.019</option>
                            <option value="0.025">0.025</option>
                            <option value="0.037">0.037</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>耗損</h5>
                    <p> <input type="number" name="loss" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>單價</h5>
                    <p> <input type="number" name="price" required /> </p>
                </div>
                <div class="show-line3">
                    <h5>備註說明</h5>
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
    <script src="/js/quote/sub2/edit.js"></script>
    <script src="/js/member/logout.js"></script>
</html>
