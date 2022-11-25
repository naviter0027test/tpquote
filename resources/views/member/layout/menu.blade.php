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
        <a href="#" class="{{ strpos(\Request::path(), '#') === false ? '' : 'clicked' }} glyphicon glyphicon-book">
        報價管理</a>
    </div>
    <div class="menu1">
        <a href="/member/lists" class="{{ strpos(\Request::path(), '/member/lists') === false ? '' : 'clicked' }} glyphicon glyphicon-align-justify">
        成員管理</a>
    </div>
    <div class="menu1">
        <a href="/member/permission/lists" class="{{ strpos(\Request::path(), '/member/permission') === false ? '' : 'clicked' }} glyphicon glyphicon-certificate">
        查看權限</a>
    </div>
    <div class="menu1">
        <a href="/member/logout" class="glyphicon glyphicon-share logout">
        登出</a>
    </div>
</div>
