<!DOCTYPE html>
<html>
<head>
    <title>Zenvora Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background:#050505;
            color:white;
        }

        .navbar {
            background:black;
            border-bottom:2px solid gold;
        }

        .nav-link {
            color:gold !important;
            margin-right:10px;
        }

        .nav-link:hover {
            color:white !important;
        }

        .dropdown-menu {
            background:black;
            border:1px solid gold;
        }

        .dropdown-item {
            color:gold;
        }

        .dropdown-item:hover {
            background:gold;
            color:black;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand text-warning fw-bold" href="/">🛍️ ZENVORA</a>

        <div class="d-flex align-items-center">

            <a href="/" class="nav-link">Home</a>
            <a href="/shop" class="nav-link">Shop</a>
            <a href="/contact" class="nav-link">Contact</a>

            <!-- ✅ ADMIN ONLY -->
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->is_admin == 1): ?>
                    <div class="dropdown ms-3">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            ⚙ Admin
                        </a>

                        <ul class="dropdown-menu dropdown-menu-dark">

                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('admin.dashboard')); ?>">
                                    📊 Dashboard
                                </a>
                            </li>

                            <li>
                                <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="dropdown-item">
                                        🚪 Logout
                                    </button>
                                </form>
                            </li>

                        </ul>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <!-- ✅ GUEST -->
            <?php if(auth()->guard()->guest()): ?>
                <a class="nav-link ms-3" href="<?php echo e(route('login')); ?>">
                    🔐 Sign In
                </a>
            <?php endif; ?>

        </div>

    </div>
</nav>

<div class="container mt-4">
    <?php echo $__env->yieldContent('content'); ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html><?php /**PATH C:\Users\Shahbaz Computers\zenvora-store\resources\views/layouts/app.blade.php ENDPATH**/ ?>