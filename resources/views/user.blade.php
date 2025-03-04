<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
</head>
<body>
    <h1>Data User</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level Pengguna</th>
        </tr>
        @foreach ($data as $d)  {{-- Ubah dari $data ke $users --}}
        <tr>
            <td>{{ $d->user_id }}</td>    
            <td>{{ $d->username }}</td>    
            <td>{{ $d->nama }}</td>    
            <td>{{ $d->level_id }}</td>    
        </tr>    
        @endforeach
    </table>
</body>
</html>
