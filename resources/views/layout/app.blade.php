<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>GSP</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/mainStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('links')
</head>
<body class="wrapper">
<header>
    @include('inc.navBar')
</header>
<main>
    @yield('content')
    @yield('popup')
</main>
<footer>
    @yield('footerContent')
</footer>
@yield('javaScriptLink')
</body>
</html>
