<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-5" style="background-color:cyan; margin:20px 50px;">
                <h4>カウンター登録</h4>
                <hr/>
                <form action="{{route('register-user')}}" method="post">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if (Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for = "name">名前</label>
                        <input type="text" class="form-group" placeholder="名前を入力"
                        name="name" value="{{old('name')}}"><br>
                        <span class="text-danger">@error('name') {{$message = "名前必要"}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for = "email">メール</label>
                        <input type="text" class="form-group" placeholder="メールを入力"
                        name= "email" value="{{old('email')}}".$message = 'メールのアドレスが間違'><br>
                        <span class="text-danger">@error('email') {{$message = 'メール必要'}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for = "password">パスワード</label>
                        <input type="password" class="form-group" placeholder="パスワードを入力"
                        name="password" value=""><br>
                        <span class="text-danger">@error('password') {{$message = "パスワード必要"}} @enderror</span>
                    </div>
                    <div class="form-group" style="margin-left: 60px">
                        <button class="btn btn-block btn-primary" type="submit">登録</button>
                    </div>
                    <br>
                    <a href="login">ログイン</a>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity=
    "sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

</html>