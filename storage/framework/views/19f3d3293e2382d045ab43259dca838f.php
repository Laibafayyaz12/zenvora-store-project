<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>

    <style>
        body {
            background: black;
            color: white;
            font-family: sans-serif;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: gold;
        }

        .cart-item {
            border: 1px solid gold;
            margin: 10px auto;
            padding: 15px;
            width: 60%;
            border-radius: 8px;
        }

        .qty-box {
            display: inline-flex;
            align-items: center;
            background: #eee;
            color: black;
            border-radius: 6px;
            overflow: hidden;
            margin-top: 10px;
        }

        .qty-box span {
            padding: 0 10px;
            font-weight: bold;
        }

        .qty-btn {
            background: #ddd;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
            font-weight: bold;
        }

        .qty-btn:hover {
            background: #ccc;
        }

        .qty-input {
            width: 40px;
            text-align: center;
            border: none;
            background: white;
        }

        a {
            text-decoration: none;
        }

        .btn {
            padding: 10px;
            margin: 5px;
            display: inline-block;
        }

        .remove {
            color: red;
        }

        .checkout {
            background: gold;
            color: black;
        }

        .clear {
            background: red;
            color: white;
        }
    </style>
</head>

<body>

<h1>🛒 Your Cart</h1>

<?php if(count($cart) > 0): ?>

    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="cart-item">

            <h3><?php echo e($item['name']); ?></h3>
            <p>Price: Rs <?php echo e($item['price']); ?></p>

            <!-- ✅ QUANTITY BOX -->
            <div class="qty-box">
                <span>Qty:</span>

                <button type="button" class="qty-btn minus">-</button>

                <input type="text" value="<?php echo e($item['quantity']); ?>" class="qty-input" readonly>

                <button type="button" class="qty-btn plus">+</button>
            </div>

            <br><br>

            <a href="/cart/remove/<?php echo e($id); ?>" class="btn remove">Remove</a>

        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div style="text-align:center; margin-top:20px;">
        <a href="/checkout" class="btn checkout">Checkout</a>
        <a href="/cart/clear" class="btn clear">Clear Cart</a>
    </div>

<?php else: ?>

    <h2 style="text-align:center;">⚠️ Cart is Empty</h2>

<?php endif; ?>

<!-- ✅ SIMPLE JS (UI ONLY) -->
<script>
document.querySelectorAll('.plus').forEach(btn => {
    btn.addEventListener('click', function() {
        let input = this.parentElement.querySelector('.qty-input');
        input.value = parseInt(input.value) + 1;
    });
});

document.querySelectorAll('.minus').forEach(btn => {
    btn.addEventListener('click', function() {
        let input = this.parentElement.querySelector('.qty-input');
        let value = parseInt(input.value);

        if (value > 1) {
            input.value = value - 1;
        }
    });
});
</script>

</body>
</html><?php /**PATH C:\Users\Shahbaz Computers\zenvora-store\resources\views/cart/index.blade.php ENDPATH**/ ?>