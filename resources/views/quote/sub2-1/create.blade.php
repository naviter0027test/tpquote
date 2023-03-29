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
                <span>報價</span> &gt; <span>項目2-1 印刷品</span> &gt; <label>新增</label>
            </div>
            <form method='post' action='/quote/create/sub2-1/{{ $mainId }}' class='form1' enctype="multipart/form-data">
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
                            <option value="面紙">面紙</option>
                            <option value="底紙">底紙</option>
                            <option value="取出紙">取出紙</option>
                            <option value="背標">背標</option>
                            <option value="背卡">背卡</option>
                            <option value="轉角卡">轉角卡</option>
                            <option value="警告標">警告標</option>
                            <option value="背紙">背紙</option>
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
                    <h5>紙材厚度</h5>
                    <p>
                        <select name="paperThickness">
                            <option value="50G">50G</option>
                            <option value="100G">100G</option>
                            <option value="157G">157G</option>
                            <option value="200G">200G</option>
                            <option value="250G">250G</option>
                            <option value="300G">300G</option>
                            <option value="350G">350G</option>
                            <option value="450G">450G</option>
                            <option value="1150G">1150G</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>紙材</h5>
                    <p>
                        <select name="paperMaterial">
                            <option value="雙銅">雙銅</option>
                            <option value="白卡">白卡</option>
                            <option value="灰底白板紙">灰底白板紙</option>
                            <option value="不乾膠">不乾膠</option>
                            <option value="雙膠紙">雙膠紙</option>
                            <option value="透明">透明</option>
                            <option value="單銅紙">單銅紙</option>
                            <option value="牛皮紙">牛皮紙</option>
                            <option value="雙灰板">雙灰板</option>
                            <option value="白板紙">白板紙</option>
                            <option value="灰板">灰板</option>
                            <option value="透明不乾膠">透明不乾膠</option>
                            <option value="三層瓦楞">三層瓦楞</option>
                            <option value="五層瓦楞">五層瓦楞</option>
                            <option value="熱轉印模">熱轉印模</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>印刷方式 (可複選)</h5>
                    <p>
                        <input type="hidden" name="printMethod" />
                        <select name="printMethodSelect" multiple>
                            <option value="單面印刷">單面印刷</option>
                            <option value="正反雙面">正反雙面</option>
                            <option value="四色印刷">四色印刷</option>
                            <option value="單色印刷">單色印刷</option>
                            <option value="專色印刷">專色印刷</option>
                            <option value="熱轉印">熱轉印</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>工藝方式 (可複選 最多三個)</h5>
                    <p>
                        <input type="hidden" name="craftMethod" />
                        <select name="craftMethodSelect" multiple>
                            <option value="裱E瓦楞">裱E瓦楞</option>
                            <option value="對錶">對錶</option>
                            <option value="開窗">開窗</option>
                            <option value="打孔">打孔</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>上膜方式</h5>
                    <p>
                        <select name="coatingMethod">
                            <option value="上UV">上UV</option>
                            <option value="上薄UV">上薄UV</option>
                            <option value="上OPP亮膜">上OPP亮膜</option>
                            <option value="上啞油">上啞油</option>
                            <option value="上亞膜">上亞膜</option>
                            <option value="不上光">不上光</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>插入說明圖片</h5>
                    <p> <input type="file" name="infoImg" /> </p>
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
