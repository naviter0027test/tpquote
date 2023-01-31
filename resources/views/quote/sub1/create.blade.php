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
                <span>報價</span> &gt; <span>項目1 板材/木盒/主材料</span> &gt; <label>新增</label>
            </div>
            <form method='post' action='/quote/create/sub1/0' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="show-line2">
                    <h5>料號</h5>
                    <p> <input type="text" name="partNo" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>材料名稱</h5>
                    <p> <input type="text" name="materialName" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>長、直徑</h5>
                    <p> <input type="text" name="length" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>寬</h5>
                    <p> <input type="text" name="width" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>高、厚</h5>
                    <p> <input type="text" name="height" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>規格</h5>
                    <p>
                        <select name="spec">
                            <option value="膠合板">膠合板</option>
                            <option value="實木">實木</option>
                            <option value="MDF">MDF</option>
                            <option value="荷木">荷木</option>
                            <option value="灰紙板">灰紙板</option>
                            <option value="木盒">木盒</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>說明</h5>
                    <p>
                        <select name="specIllustrate">
                            <option value="3夾">3夾</option>
                            <option value="5夾">5夾</option>
                            <option value="7夾">7夾</option>
                            <option value="9夾">9夾</option>
                            <option value="11夾">11夾</option>
                            <option value="刀模板">刀模板</option>
                            <option value="指接板">指接板</option>
                            <option value="同向板">同向板</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>內容</h5>
                    <p>
                        <select name="content">
                            <option value="二椴一楊">二椴一楊</option>
                            <option value="二椴九楊">二椴九楊</option>
                            <option value="三椴二楊">三椴二楊</option>
                            <option value="四椴三陽">四椴三陽</option>
                            <option value="四椴五楊">四椴五楊</option>
                            <option value="四椴七楊">四椴七楊</option>
                            <option value="五椴二楊">五椴二楊</option>
                            <option value="五椴四楊">五椴四楊</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>等級</h5>
                    <p>
                        <select name="level">
                            <option value="特A/A">特A/A</option>
                            <option value="A/A">A/A</option>
                            <option value="A/B">A/B</option>
                            <option value="B/B">B/B</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>業務選擇一</h5>
                    <p>
                        <select name="business">
                            <option value="E0">E0</option>
                            <option value="E1">E1</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>業務選擇二</h5>
                    <p>
                        <select name="fsc">
                            <option value="Y">Y</option>
                            <option value="N">N</option>
                        </select>
                    </p>
                </div>
                <div class="show-line3">
                    <h5>備註說明</h5>
                    <p> <textarea name="memo" ></textarea> </p>
                </div>
            </form>
        </div>
@include ('member.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/lib/selectize.js-master/dist/js/standalone/selectize.js"></script>
    <script src="/js/member/edit.js"></script>
    <script src="/js/member/logout.js"></script>
</html>
