<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - POS</title>
    
    <!-- Tambahkan CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <h1 class="mb-4">Profil Pengguna</h1>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Nama: {{ $name }}</h5>
            <p class="card-text">ID Pengguna: {{ $id }}</p>

            <!-- Tombol kembali ke menu utama -->
            <a href="{{ url('/') }}" class="btn btn-danger">Kembali ke Menu Utama</a>
        </div>
    </div>

    <!-- Tambahkan script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
