<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>pdf output</title>
    </head>
    <style>
        @font-face {
            font-family: 'wt024';
            font-style: normal;
            font-weight: normal;
            src: url({{ storage_path('fonts/wt024.ttf') }}) format('truetype');
        }
        body {
            font-family: wt024, DejaVu Sans,sans-serif;
        }
        table tbody tr:nth-child(odd) {
        }
        table tbody tr:nth-child(even) {
            background-color: #ccc;
        }
        .head {
            width: 100%;
        }
        .head tbody tr td:nth-child(1) {
            width: 450px;
        }

        .mid {
            width: 100%;
        }

        .dev-footer-1 {
            float: left;
            width: 48%;
        }
        .footer-1 {
            width: 100%;
        }

        .dev-footer-2 {
            float: right;
            width: 48%;
        }
        .footer-2 {
            width: 100%;
        }

        .custPic {
            width: 150px;
        }
    </style>
    <body>
        <table class="head">
            <tbody>
                <tr>
                    <td>客戶產品編號</td>
                    <td>{{ $main->customerProductNum }}</td>
                </tr>
                <tr>
                    <td>產品編號</td>
                    <td>{{ $main->productNum }}</td>
                </tr>
                <tr>
                    <td>產品名稱</td>
                    <td>{{ $main->productNameTw }}</td>
                </tr>
                <tr>
                    <td>產品尺寸</td>
                    <td>{{ $items['sub1']->length }} x {{ $items['sub1']->width }} x {{ $items['sub1']->height }}</td>
                </tr>
            </tbody>
        </table>
        <table class="mid">
            <tbody>
                <tr>
                    <td>產品照片</td>
                </tr>
                <tr>
                    <td>
                    @if (trim($main->image) != '')
                        <img class="custPic" src="{{ public_path('uploads'. $main->image) }}" />
                    @endif
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="dev-footer-1">
            <table class="footer-1">
                <tbody>
                    <tr>
                        <td>裝箱方式</td>
                        <td>{{ $items['sub5']->boxMethod }}</td>
                    </tr>
                    <tr>
                        <td>主材質</td>
                        <td>{{ $items['sub1']->spec }} x {{ $items['sub1']->specIllustrate }} x {{ $items['sub1']->content }}</td>
                    </tr>
                    <tr>
                        <td>包裝方式</td>
                        <td>{{ $items['sub5']->packageMethod }}</td>
                    </tr>
                    <tr>
                        <td>起始費用</td>
                        <td>{{ $items['sub5']->priceSubtotal }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="dev-footer-2">
            <table class="footer-2">
                <tbody>
                    <tr>
                        <td>港口</td>
                        <td>MOQ</td>
                        <td>單價</td>
                        <td>報價數量</td>
                    </tr>
                    <tr>
                        <td>{{ $items['sub9']->portStr }}</td>
                        <td>{{ $main->quoteQuantity }}</td>
                        <td>{{ $items['total']->quotePrice }}</td>
                        <td>1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
