<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Zenvora</title>

    <style>
        body {
            margin:0;
            font-family:Arial;
            background:#0d0d0d;
            color:white;
        }

        /* SIDEBAR */
        .sidebar {
            width:220px;
            height:100vh;
            background:black;
            position:fixed;
            padding:20px;
        }

        .sidebar h2 {
            color:gold;
        }

        .sidebar a {
            display:block;
            color:white;
            margin:12px 0;
            text-decoration:none;
            padding:8px;
            border-radius:5px;
        }

        .sidebar a:hover {
            background:gold;
            color:black;
        }

        /* MAIN */
        .main {
            margin-left:240px;
            padding:20px;
        }

        /* CARDS */
        .card {
            padding:20px;
            border-radius:10px;
            color:black;
            font-weight:bold;
        }

        .gold { background:gold; }
        .dark { background:#1a1a1a; color:white; border:1px solid gold; }

        table {
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
            background:black;
        }

        th {
            background:gold;
            color:black;
            padding:10px;
        }

        td {
            padding:10px;
            border-bottom:1px solid #333;
        }

    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <h2>ZENVORA</h2>

    <a href="/admin">Dashboard</a>
    <a href="/admin/products">Products</a>
    <a href="/admin/orders">Orders</a>
    <a href="/admin/users">Users</a>
    <a href="/admin/contact">Contact</a>

    <!-- ✅ HOME BUTTON -->
    <a href="/" style="margin-top:20px; background:gold; color:black; text-align:center;">
        ⬅ Back to Home
    </a>

</div>

<!-- MAIN -->
<div class="main">
    <?php echo $__env->yieldContent('content'); ?>
</div>

</body>
</html><?php /**PATH C:\Users\Shahbaz Computers\zenvora-store\resources\views/layouts/admin.blade.php ENDPATH**/ ?>