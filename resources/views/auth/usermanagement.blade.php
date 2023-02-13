<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UserManagement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>ユーザー管理</h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('logout-user')}}" class="btn btn-primary float-end">ログアウト</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>名前</th>
                            <th>メール</th>
                            <th>パスワード</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($user->count()>0)
                            @foreach ($user as $us)
                                <tr>
                                    <td>{{$us->id}}</td>
                                    <td>{{$us->name}}</td>
                                    <td>{{$us->email}}</td>
                                    <td>{{$us->password}}</td>
                                    <td style="text-align: center;">
                                        <a href= 'delete/{{$us->id}}'  class="btn btn-sm btn-danger">削除</a>
                                        <button class="btn btn-sm btn-secondary">編集</button>
                                    </td>
                                </tr>
                            @endforeach
                            
                        @else
                            
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity=
    "sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
</html>

