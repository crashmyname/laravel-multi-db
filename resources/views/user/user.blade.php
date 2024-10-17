<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form User</title>
</head>
<body>
    <form action="{{route('register')}}" method="POST">
        @csrf
        nama : <input type="text" name="name">
        email : <input type="text" name="email">
        password : <input type="password" name="password">
        role : <input type="text" name="role">
        vendor : <input type="text" name="vendor">
        <button type="submit">Register</button>
    </form>
</body>
</html>