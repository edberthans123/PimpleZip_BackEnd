<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{config('PimpleZip', $title)}}</title>
        <style>
        .login{
          padding: 5px;
          margin: 5px;
          align: right;
        }

        .search{
          align: center;
          padding-right: 450px;
        }

        .buttons{
          color: #red;
        }

        body {
          background: pink;
        }
        </style>
    </head>
    <body>
      @include('inc.navbar')
      <div class="container">
        @yield('content')
      </div>
    </body>
</html>
