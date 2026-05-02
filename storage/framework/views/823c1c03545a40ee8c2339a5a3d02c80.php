<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Zenvora - Shop</title>

<style>
    body {
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
        background: #0a0a0a;
        color: #fff;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 18px 50px;
        background: #000;
        border-bottom: 1px solid #d4af37;
    }

    .logo {
        font-size: 28px;
        font-weight: 900;
        color: #d4af37;
    }

    .nav-links a {
        margin: 0 14px;
        text-decoration: none;
        color: #f1d58a;
    }

    .title {
        text-align: center;
        margin: 40px 0;
        font-size: 40px;
        color: #d4af37;
        font-weight: 800;
    }

    .flash {
        background: #28a745;
        color: white;
        padding: 15px;
        margin: 20px 50px;
        border-radius: 10px;
        text-align: center;
        font-weight: bold;
    }

    .products {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 25px;
        padding: 0 50px 60px;
    }

    .card {
        background: #111;
        border: 1px solid #d4af37;
        border-radius: 14px;
        padding: 15px;
        text-align: center;
        transition: 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0 15px rgba(212,175,55,0.4);
    }

    .card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
    }

    .card h3 {
        color: #d4af37;
        margin: 12px 0 5px;
        font-size: 20px;
    }

    .price {
        color: #f1d58a;
        margin-bottom: 8px;
    }

    .desc {
        font-size: 14px;
        color: #aaa;
        margin-bottom: 12px;
        min-height: 40px;
    }

    .btn {
        background: #d4af37;
        border: none;
        padding: 10px 16px;
        color: black;
        font-weight: bold;
        border-radius: 6px;
        cursor: pointer;
    }

    .btn:hover {
        background: white;
    }
</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">🛍️ ZENVORA</div>

    <div class="nav-links">
        <a href="/">Home</a>
        <a href="/shop">Shop</a>
        <a href="/cart">Cart</a>
    </div>
</div>

<!-- SUCCESS MESSAGE -->
<?php if(session('success')): ?>
    <div class="flash">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<div class="title">Our Products</div>

<!-- PRODUCTS -->
<div class="products">

    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    <div class="card">

        <!-- IMAGE -->
        <img src="<?php echo e(asset('storage/'.$product->image)); ?>" 
             onerror="this.src='https://via.placeholder.com/300'" 
             alt="product">

        <!-- NAME -->
        <h3><?php echo e($product->name); ?></h3>

        <!-- PRICE -->
        <div class="price">Rs <?php echo e($product->price); ?></div>

        <!-- DESCRIPTION -->
        <div class="desc">
            <?php echo e($product->description ?? 'No description available'); ?>

        </div>

        <!-- ADD TO CART -->
        <form method="POST" action="<?php echo e(route('cart.add', $product->id)); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn">🛒 Add to Cart</button>
        </form>

    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

        <h2 style="text-align:center; width:100%;">🛒 No Products Found</h2>

    <?php endif; ?>

</div>

</body>
</html><?php /**PATH C:\Users\Shahbaz Computers\zenvora-store\resources\views/shop.blade.php ENDPATH**/ ?>