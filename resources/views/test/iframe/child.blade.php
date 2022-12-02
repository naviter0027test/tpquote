<html>
    <head>
        <title>iframe child test</title>
        <meta charset='utf-8' />
    </head>
    <body>
        <h1> this is child page</h1>
    </body>
    <script>
        window.onload = function() {
            console.log('child init success');
        };
        function getMessage(e) {
            console.log('child get message success');
            console.log(e);
        }
        window.addEventListener('message', getMessage);
    </script>
</html>
