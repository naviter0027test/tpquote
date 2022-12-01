<html>
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name', '') }}</title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
        <link href='/lib/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet' />
        <link href='/lib/bootstrap/dist/css/bootstrap-theme.min.css' rel='stylesheet' />
        <link href='/css/member/body.css' rel='stylesheet' />
        <link href='/css/member/login.css' rel='stylesheet' />
    </head>
    <body>
@include('member.layout.menu')
        <div class="content">
            <div class="content-header">
                <span>成員</span> &gt; <label>列表</label>
                <div class="operation-panel">
                    <a href="/member/create" class="btn-style1">新增</a>
                </div>
            </div>
            <table class="table1">
                <thead>
                    <tr>
                        <td>編號</td>
                        <td>帳號</td>
                        <td>名稱</td>
                        <td>建立日期</td>
                        <td>修改日期</td>
                        <td>操作</td>
                    </tr>
                </thead>
                <tbody>
                @if (isset($result['items']))
                @foreach ($result['items'] as $item)
                    <tr>
                        <td>{{ $item->id }} </td>
                        <td>{{ $item->account }} </td>
                        <td>{{ $item->userName }} </td>
                        <td>{{ $item->created_at }} </td>
                        <td>{{ $item->updated_at }} </td>
                        <td>
                            <a href='/member/edit/{{ $item->id }}' class='glyphicon glyphicon-pencil'></a>
                            <a href='/member/remove/{{ $item->id }}' class='glyphicon glyphicon-remove itemRemove'></a>
                        </td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
            <div class="pagination paginationCenter">
            @if(isset($result['amount']))
            @for($i = 0;$i < ceil($result['amount'] / $param['pageNum']); ++$i)
                @if(($i+1) == $nowPage)
                <label>{{ $i+1 }} </label>
                @elseif(($i+1) != $nowPage && abs($i+1-$nowPage) < 5)
                <a href="/member/lists?nowPage={{ $i+1 }}&{{ http_build_query($param) }}">{{ $i+1 }}</a>
                @endif
            @endfor
            @endif
            </div>
        </div>
@include('member.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/js/member/logout.js"></script>
</html>
