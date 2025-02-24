<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - POS</title>
    
    <!-- Tambahkan CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <h1 class="mb-4">Daftar Produk</h1>

    <!-- Daftar Kategori Produk dengan Bootstrap -->
    <div class="list-group">
        <a href="{{ url('/category/food-beverage') }}" class="list-group-item list-group-item-action">
            Food & Beverage
        </a>
        <a href="{{ url('/category/beauty-health') }}" class="list-group-item list-group-item-action">
            Beauty & Health
        </a>
        <a href="{{ url('/category/home-care') }}" class="list-group-item list-group-item-action">
            Home Care
        </a>
        <a href="{{ url('/category/baby-kid') }}" class="list-group-item list-group-item-action">
            Baby & Kid
        </a>
    </div>

    <!-- Tambahkan script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
