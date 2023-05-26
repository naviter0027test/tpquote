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
            /*src: url({{ storage_path('fonts/wt024.ttf') }}) format('truetype');*/
        }
        body {
            /*font-family: wt024, DejaVu Sans,sans-serif;*/
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
    </style>
    <body>
        <table class="head">
            <tbody>
                <tr>
                    <td>Name</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Number</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Product</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <table class="mid">
            <tbody>
                <tr>
                    <td>Picture</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="dev-footer-1">
            <table class="footer-1">
                <tbody>
                    <tr>
                        <td>Method</td>
                        <td>aaa</td>
                    </tr>
                    <tr>
                        <td>Main Material</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Craft Method</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Start Money</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Start Money</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="dev-footer-2">
            <table class="footer-2">
                <tbody>
                    <tr>
                        <td>Port</td>
                        <td>MOQ</td>
                        <td>Effect Date</td>
                        <td></td>
                        <td>Quote Number</td>
                        <td>Quote Number</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
