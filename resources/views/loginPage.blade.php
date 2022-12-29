<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login system</title>
    <link rel="stylesheet" href="/css/loginPageStyle.css">
</head>
<body>
    <main>
        <div class="loginContainer">
            <img src="../img/gspLogoImg.jpg" alt="">
            <form method="POST" action="{{route('user.login')}}">
                @csrf
                <div>
                    <input type="text" name="login" id="login" placeholder="Логин" autocomplete="off">
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Пароль">
                </div>
                <button class="submitButtonLogin" type="submit">Войти</button>
            </form>
        </div>
    </main>
</body>
</html>

