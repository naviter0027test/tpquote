<html>
    <head>
        <title>iframe mother test</title>
        <meta charset='utf-8' />
    </head>
    <body>
        <iframe id="ifTest" src="/tst/iframe/child"></iframe>
    </body>
    <script>
        window.onload = function() {
            console.log('mother init success');
            var iTest = document.getElementById('ifTest').contentWindow;
            var idx = 1;
            setInterval(function() {
                if(idx < 5) {
                    iTest.postMessage('message:'+ idx, 'http://tpquote.axcell28.idv.tw');

                }
                ++idx;
            }, 4000);
        };
    </script>
</html>
