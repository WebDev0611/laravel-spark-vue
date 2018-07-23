<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <style>
        body.login {
          background:url('../img/bg.jpg');
        }
    </style>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
     <link href='/css/app.css' rel='stylesheet' type='text/css'>
</head>
<body class="login">


    <div>

        <div class="flex-fill flex-center">
            <img src="/img/logo-white.png">
            <h1 class="text-center">
                PDN
            </h1>
            <h2>The future of business.</h2>
        </div>

        <nav class="links">
            <a href="/login">
                <button>
                    {{__('Login')}}
                </button>
            </a>

            <a href="/register">
                <button>
                    {{__('Register')}}
                </button>
            </a>
        </nav>

        
    </div>
</body>
</html>
