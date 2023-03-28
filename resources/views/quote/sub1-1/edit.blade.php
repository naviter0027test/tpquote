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
@include('member.layout.menu')
        <div class="content">
            <div class="content-header">
                <span>報價</span> &gt; <span>新增</span> &gt; <label>1 - 1</label>
            </div>
            <form method='post' action='/quote/edit/sub1-1/{{ $mainId }}' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="show-line2">
                    <h5>序號</h5>
                    <p> <input type="text" name="partNo" value="{{ $item->partNo }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>材料名稱</h5>
                    <p> 
                        <select name="materialName">
                            <option value="盒身" {{ ($item->materialName == '盒身' ? 'selected' : '') }}>盒身</option>
                            <option value="盒底" {{ ($item->materialName == '盒底' ? 'selected' : '') }}>盒底</option>
                            <option value="盒內邊條" {{ ($item->materialName == '盒內邊條' ? 'selected' : '') }}>盒內邊條</option>
                            <option value="盒蓋" {{ ($item->materialName == '盒蓋' ? 'selected' : '') }}>盒蓋</option>
                            <option value="盒蓋長邊條" {{ ($item->materialName == '盒蓋長邊條' ? 'selected' : '') }}>盒蓋長邊條</option>
                            <option value="盒蓋短邊條" {{ ($item->materialName == '盒蓋短邊條' ? 'selected' : '') }}>盒蓋短邊條</option>
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
                            <option value="松木" {{ ($item->spec == '松木' ? 'selected' : '') }}>松木</option>
                            <option value="椴木" {{ ($item->spec == '椴木' ? 'selected' : '') }}>椴木</option>
                            <option value="譁木" {{ ($item->spec == '譁木' ? 'selected' : '') }}>譁木</option>
                            <option value="楊木" {{ ($item->spec == '楊木' ? 'selected' : '') }}>楊木</option>
                            <option value="櫸木" {{ ($item->spec == '櫸木' ? 'selected' : '') }}>櫸木</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>說明</h5>
                    <p> 
                        <select name="specIllustrate">
                            <option value="3夾" {{ ($item->specIllustrate == '3夾' ? 'selected' : '') }} >3夾</option>
                            <option value="5夾" {{ ($item->specIllustrate == '5夾' ? 'selected' : '') }} >5夾</option>
                            <option value="7夾" {{ ($item->specIllustrate == '7夾' ? 'selected' : '') }} >7夾</option>
                            <option value="9夾" {{ ($item->specIllustrate == '9夾' ? 'selected' : '') }} >9夾</option>
                            <option value="11夾" {{ ($item->specIllustrate == '11夾' ? 'selected' : '') }} >11夾</option>
                            <option value="刀模板" {{ ($item->specIllustrate == '刀模板' ? 'selected' : '') }} >刀模板</option>
                            <option value="指接板" {{ ($item->specIllustrate == '指接板' ? 'selected' : '') }} >指接板</option>
                            <option value="同向板" {{ ($item->specIllustrate == '同向板' ? 'selected' : '') }} >同向板</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>內容</h5>
                    <p>
                        <select name="content">
                            <option value="二椴一楊" {{ ($item->content == '二椴一楊' ? 'selected' : '') }} >二椴一楊</option>
                            <option value="二椴九楊" {{ ($item->content == '二椴九楊' ? 'selected' : '') }} >二椴九楊</option>
                            <option value="三椴二楊" {{ ($item->content == '三椴二楊' ? 'selected' : '') }} >三椴二楊</option>
                            <option value="四椴三陽" {{ ($item->content == '四椴三陽' ? 'selected' : '') }} >四椴三陽</option>
                            <option value="四椴五楊" {{ ($item->content == '四椴五楊' ? 'selected' : '') }} >四椴五楊</option>
                            <option value="四椴七楊" {{ ($item->content == '四椴七楊' ? 'selected' : '') }} >四椴七楊</option>
                            <option value="五椴二楊" {{ ($item->content == '五椴二楊' ? 'selected' : '') }} >五椴二楊</option>
                            <option value="五椴四楊" {{ ($item->content == '五椴四楊' ? 'selected' : '') }} >五椴四楊</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>等級</h5>
                    <p>
                        <select name="level">
                            <option value="特A/A" {{ ($item->level == '特A/A' ? 'selected' : '') }} >特A/A</option>
                            <option value="A/A"   {{ ($item->level == 'A/A' ? 'selected' : '') }} >A/A</option>
                            <option value="A/B"   {{ ($item->level == 'A/B' ? 'selected' : '') }} >A/B</option>
                            <option value="B/B"   {{ ($item->level == 'B/B' ? 'selected' : '') }} >B/B</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>業務選擇一</h5>
                    <p>
                        <select name="business">
                            <option value="E0" {{ ($item->business == 'E0' ? 'selected' : '') }} >E0</option>
                            <option value="E1" {{ ($item->business == 'E1' ? 'selected' : '') }} >E1</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>業務選擇二</h5>
                    <p>
                        <select name="fsc">
                            <option value="Y" {{ ($item->fsc == 'Y' ? 'selected' : '') }} >Y</option>
                            <option value="N" {{ ($item->fsc == 'N' ? 'selected' : '') }} >N</option>
                        </select>
                    </p>
                </div>
                <div class="show-line2">
                    <h5>材料單價</h5>
                    <p> <input type="number" name="materialPrice" value="{{ $item->materialPrice }}" required /> </p>
                </div>
                <p class=""> <button class="btn">建立</button> </p>
            </form>
        </div>
@include('member.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/lib/selectize.js-master/dist/js/standalone/selectize.js"></script>
    <script src="/js/member/edit.js"></script>
    <script src="/js/member/logout.js"></script>
</html>
