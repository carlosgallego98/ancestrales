<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>
        <style>
              body{
                font-family: 'Menlo';
              }
            .aviso{
              padding-top: 15%;
              text-align: center;
            }
            .aviso-img{
              height: 100px;
            }
        </style>
      </head>
    <body>
        <div class="aviso">
          <img src="./img/logo.png" alt="" class="aviso-img">
          <h2>Sitio web en Construcción...</h2>
        </div>
    </body>
</html>
