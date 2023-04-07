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
            <form method='post' action='/quote/edit/sub1/{{ $mainId }}' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="show-line2">
                    <h5>料號</h5>
                    <p> <input type="text" name="partNo" value="{{ $item->partNo }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>材料名稱</h5>
                    <p> <input type="text" name="materialName" value="{{ $item->materialName }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>長、直徑</h5>
                    <p> <input type="number" name="length" value="{{ $item->length }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>寬</h5>
                    <p> <input type="number" name="width" value="{{ $item->width }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>高、厚</h5>
                    <p> <input type="number" name="height" value="{{ $item->height }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>規格</h5>
                    <p>
                        <select name="spec">
                            <option value="膠合板" {{ ($item->spec == "膠合板") ? 'selected=selected' : '' }} >膠合板</option>
                            <option value="實木" {{ ($item->spec == "實木") ? 'selected=selected' : '' }}>實木</option>
                            <option value="MDF" {{ ($item->spec == "MDF") ? 'selected=selected' : '' }}>MDF</option>
                            <option value="荷木" {{ ($item->spec == "荷木") ? 'selected=selected' : '' }}>荷木</option>
                            <option value="灰紙板" {{ ($item->spec == "灰紙板") ? 'selected=selected' : '' }}>灰紙板</option>
                            <option value="木盒" {{ ($item->spec == "木盒") ? 'selected=selected' : '' }}>木盒</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>說明</h5>
                    <p>
                        <select name="specIllustrate">
                            <option value="3夾" {{ ($item->specIllustrate == "3夾") ? 'selected=selected' : '' }}>3夾</option>
                            <option value="5夾" {{ ($item->specIllustrate == "5夾") ? 'selected=selected' : '' }}>5夾</option>
                            <option value="7夾" {{ ($item->specIllustrate == "7夾") ? 'selected=selected' : '' }}>7夾</option>
                            <option value="9夾" {{ ($item->specIllustrate == "9夾") ? 'selected=selected' : '' }}>9夾</option>
                            <option value="11夾" {{ ($item->specIllustrate == "11夾") ? 'selected=selected' : '' }}>11夾</option>
                            <option value="刀模板" {{ ($item->specIllustrate == "刀模板") ? 'selected=selected' : '' }}>刀模板</option>
                            <option value="指接板" {{ ($item->specIllustrate == "指接板") ? 'selected=selected' : '' }}>指接板</option>
                            <option value="同向板" {{ ($item->specIllustrate == "同向板") ? 'selected=selected' : '' }}>同向板</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>內容</h5>
                    <p>
                        <select name="content">
                            <option value="二椴一楊" {{ ($item->content == "二椴一楊") ? 'selected=selected' : '' }}>二椴一楊</option>
                            <option value="二椴九楊" {{ ($item->content == "二椴九楊") ? 'selected=selected' : '' }}>二椴九楊</option>
                            <option value="三椴二楊" {{ ($item->content == "三椴二楊") ? 'selected=selected' : '' }}>三椴二楊</option>
                            <option value="四椴三陽" {{ ($item->content == "四椴三陽") ? 'selected=selected' : '' }}>四椴三陽</option>
                            <option value="四椴五楊" {{ ($item->content == "四椴五楊") ? 'selected=selected' : '' }}>四椴五楊</option>
                            <option value="四椴七楊" {{ ($item->content == "四椴七楊") ? 'selected=selected' : '' }}>四椴七楊</option>
                            <option value="五椴二楊" {{ ($item->content == "五椴二楊") ? 'selected=selected' : '' }}>五椴二楊</option>
                            <option value="五椴四楊" {{ ($item->content == "五椴四楊") ? 'selected=selected' : '' }}>五椴四楊</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>等級</h5>
                    <p>
                        <select name="level">
                            <option value="特A/A" {{ ($item->level == "特A/A") ? 'selected=selected' : '' }}>特A/A</option>
                            <option value="A/A"   {{ ($item->level == "A/A") ? 'selected=selected' : '' }}>A/A</option>
                            <option value="A/B"   {{ ($item->level == "A/B") ? 'selected=selected' : '' }}>A/B</option>
                            <option value="B/B"   {{ ($item->level == "B/B") ? 'selected=selected' : '' }}>B/B</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>業務選擇一</h5>
                    <p>
                        <select name="business">
                            <option value="E0" {{ ($item->business == "E0") ? 'selected=selected' : '' }}>E0</option>
                            <option value="E1" {{ ($item->business == "E1") ? 'selected=selected' : '' }}>E1</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>業務選擇二</h5>
                    <p>
                        <select name="fsc">
                            <option value="Y" {{ ($item->fsc == "Y") ? 'selected=selected' : '' }}>Y</option>
                            <option value="N" {{ ($item->fsc == "N") ? 'selected=selected' : '' }}>N</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>巨長、直徑</h5>
                    <p> <input type="number" name="bigLength" value="{{ $item->bigLength }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>巨寬</h5>
                    <p> <input type="number" name="bigWidth" value="{{ $item->bigWidth }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>巨高、厚</h5>
                    <p> <input type="number" name="bigHeight" value="{{ $item->bigHeight }}" required /> </p>
                </div>
                <div class="show-line3">
                    <h5>備註說明</h5>
                    <p> <textarea name="memo" >{{ $item->memo }}</textarea> </p>
                </div>

                <div class="show-line3">
                    <button class="btn">儲存</button>
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
