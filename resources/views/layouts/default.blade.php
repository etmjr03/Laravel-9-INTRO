<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/app.css">
  <title>@yield('titlePage', 'Título padrão da página')</title>
</head>
<body>
  <h1>@yield('title', 'Título default')</h1>

  <h2>@yield('subtittle', 'Subtítulo padrão')</h2>
  
  @stack('scripts')
</body>
</html>