<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuários</title>
</head>
<body>
  @foreach($users as $key => $user)
    <p>Nome: {{ $user->name }}, email: {{ $user->email }}</p>
  @endforeach
</body>
</html>