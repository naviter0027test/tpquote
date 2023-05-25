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
                <span>報價</span> &gt; <span>項目10 總費用計算</span> &gt; <label>修改</label>
            </div>
            <form method='post' action='/quote/edit/total/{{ $mainId }}' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="show-line2">
                    <h5>總成本價格</h5>
                    <p> <input type="number" name="costPrice" step="0.01" value="{{ $item->costPrice }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>獲利值</h5>
                    <p> <input type="number" name="profit" step="0.01" value="{{ $item->profit }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>匯率</h5>
                    <p> <input type="number" name="exchangeRate" step="0.01" value="{{ $item->exchangeRate }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>報價單價</h5>
                    <p> <input type="number" name="quotePrice" step="0.01" value="{{ $item->quotePrice }}" required readonly /> </p>
                </div>
                <div class="show-line2">
                    <h5>審核填表人</h5>
                    <p> <input type="text" name="reviewName" value="{{ $item->reviewName }}" /> </p>
                </div>
                <div class="show-line2">
                    <h5>審核填表人日期</h5>
                    <input type="hidden" name="reviewFillDate" value="{{ $item->reviewFillDate }}" />
                    <p> <input type="date" name="reviewFillDateInput" /> </p>
                </div>
                <div class="show-line2">
                    <h5>總經理初審核</h5>
                    <p> <input type="text" name="reviewGeneralManager" value="{{ $item->reviewGeneralManager }}" /> </p>
                </div>
                <div class="show-line2">
                    <h5>總經理初審核日期</h5>
                    <input type="hidden" name="reviewGeneralManagerFillDate" value="{{ $item->reviewGeneralManagerFillDate }}" />
                    <p> <input type="date" name="reviewGeneralManagerFillDateInput" /> </p>
                </div>
                <div class="show-line2">
                    <h5>總經理最終審核</h5>
                    <p> <input type="text" name="reviewFinalGeneralManager" value="{{ $item->reviewFinalGeneralManager }}" /> </p>
                </div>
                <div class="show-line2">
                    <h5>總經理最終審核日期</h5>
                    <input type="hidden" name="reviewFinalGeneralManagerFillDate" value="{{ $item->reviewFinalGeneralManagerFillDate }}" />
                    <p> <input type="date" name="reviewFinalGeneralManagerFillDateInput" /> </p>
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
    <script src="/js/quote/total/edit.js"></script>
    <script src="/js/member/logout.js"></script>
</html>
