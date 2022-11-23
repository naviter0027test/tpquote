<div class="admin-menu">
    <div class="logo">
        <span>{{ config('app.name', '') }}</span>
    </div>
    <div class="menu1">
        <a href="/member/home" class="{{ strpos(\Request::path(), 'member/home') === false ? '' : 'clicked' }} glyphicon glyphicon-home">
        首頁查看</a>
    </div>
    <div class="menu1">
        <a href="/member/password" class="{{ strpos(\Request::path(), 'member/password') === false ? '' : 'clicked' }} glyphicon glyphicon-star-empty">
        密碼更改</a>
    </div>
    <div class="menu1">
        <a href="/member/logout" class="glyphicon glyphicon-share logout">
        登出</a>
    </div>
</div>
