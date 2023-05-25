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
    </style>
    <body>
        <p> hihi </p>
        <p> 中文測試 </p>
    </body>
</html>
