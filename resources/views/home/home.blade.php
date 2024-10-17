<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>ini adalah home {{$vendor}}</h1>
    <table border="1">
        <tr>
            <td>nik</td>
            <td>nama</td>
            <td>section</td>
        </tr>
        <tr>
            @foreach ($employees as $data)
                <td>{{$data->nik}}</td>
                <td>{{$data->nama_employees}}</td>
                <td>{{$data->section}}</td>
            @endforeach
        </tr>
    </table>
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit">logout</button>
    </form>
</body>
</html>