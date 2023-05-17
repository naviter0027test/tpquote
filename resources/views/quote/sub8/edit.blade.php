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
                <span>報價</span> &gt; <span>項目8 材料單價</span> &gt; <label>修改</label>
            </div>
            <form method='post' action='/quote/edit/sub8/{{ $mainId }}' class='form1' enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="show-line2">
                    <h5>項目1 單價</h5>
                    <p> <input type="number" name="sub1Price" value="{{ $item->sub1Price }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>項目1 小計</h5>
                    <p> <input type="number" name="sub1SubTotal" value="{{ $item->sub1SubTotal }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>項目2 單價</h5>
                    <p> <input type="number" name="sub2Price" value="{{ $item->sub2Price }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>項目2 小計</h5>
                    <p> <input type="number" name="sub2SubTotal" value="{{ $item->sub2SubTotal }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>項目3 單價</h5>
                    <p> <input type="number" name="sub3Price" value="{{ $item->sub3Price }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>項目3 小計</h5>
                    <p> <input type="number" name="sub3SubTotal" value="{{ $item->sub3SubTotal }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>項目3-1 單價</h5>
                    <p> <input type="number" name="sub3_1Price" value="{{ $item->sub3_1Price }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>項目3-1 小計</h5>
                    <p> <input type="number" name="sub3_1SubTotal" value="{{ $item->sub3_1SubTotal }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>項目4 單價</h5>
                    <p> <input type="number" name="sub4Price" value="{{ $item->sub4Price }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>項目4 小計</h5>
                    <p> <input type="number" name="sub4SubTotal" value="{{ $item->sub4SubTotal }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>項目5 單價</h5>
                    <p> <input type="number" name="sub5Price" value="{{ $item->sub5Price }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>項目5 小計</h5>
                    <p> <input type="number" name="sub5SubTotal" value="{{ $item->sub5SubTotal }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>項目6 單價</h5>
                    <p> <input type="number" name="sub6Price" value="{{ $item->sub6Price }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>項目6 小計</h5>
                    <p> <input type="number" name="sub6SubTotal" value="{{ $item->sub6SubTotal }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>項目7 單價</h5>
                    <p> <input type="number" name="sub7Price" value="{{ $item->sub7Price }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>項目7 小計</h5>
                    <p> <input type="number" name="sub7SubTotal" value="{{ $item->sub7SubTotal }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>採購填表人</h5>
                    <p> <input type="text" name="purchaseName" value="{{ $item->purchaseName }}" required /> </p>
                </div>
                <div class="show-line2">
                    <h5>採購填表人日期</h5>
                    <input type="hidden" name="purchaseFillDate" value="{{ $item->purchaseFillDate }}" />
                    <p> <input type="date" name="purchaseFillDateInput" required /> </p>
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
                <div class="show-line3">
                    <button class="btn-style1">儲存</button>
                </div>
            </form>
        </div>
@include ('member.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/lib/selectize.js-master/dist/js/standalone/selectize.js"></script>
    <script src="/js/quote/sub8/edit.js"></script>
    <script src="/js/member/logout.js"></script>
</html>
