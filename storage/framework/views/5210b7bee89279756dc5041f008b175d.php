<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout</title>

<style>

*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:Arial, sans-serif;
}

body{
  background:#f4f1eb;
  padding:40px;
}

.container{
  max-width:1300px;
  margin:auto;
  display:grid;
  grid-template-columns:2fr 1fr;
  gap:30px;
}

.left-box{
  background:#fff;
  padding:40px;
  border-radius:25px;
}

.heading{
  font-size:42px;
  font-weight:bold;
  margin-bottom:35px;
}

.form-row{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:20px;
}

.form-group{
  margin-bottom:20px;
}

.form-group label{
  display:block;
  margin-bottom:8px;
  font-size:14px;
  font-weight:bold;
}

.form-group input{
  width:100%;
  height:58px;
  border:1px solid #ddd;
  border-radius:14px;
  padding:0 15px;
  font-size:16px;
  background:#f8f5f1;
}

.full{
  grid-column:1 / -1;
}

.right-box{
  background:#11122f;
  color:#fff;
  padding:30px;
  border-radius:25px;
  height:fit-content;
}

.summary-title{
  font-size:35px;
  color:#d9a84f;
  margin-bottom:30px;
  font-weight:bold;
}

.product{
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:20px;
  padding-bottom:20px;
  border-bottom:1px solid rgba(255,255,255,0.1);
}

.product-left{
  display:flex;
  align-items:center;
  gap:15px;
}

.product img{
  width:60px;
  height:60px;
  border-radius:10px;
  object-fit:cover;
}

.product-name{
  font-size:16px;
  font-weight:bold;
}

.qty{
  font-size:14px;
  color:#ccc;
}

.price{
  color:#d9a84f;
  font-size:22px;
  font-weight:bold;
}

.total{
  margin-top:25px;
  padding-top:20px;
  border-top:1px solid rgba(255,255,255,0.2);
  display:flex;
  justify-content:space-between;
  font-size:28px;
  font-weight:bold;
}

.total-price{
  color:#d9a84f;
}

.checkout-btn{
  width:100%;
  height:60px;
  border:none;
  border-radius:15px;
  background:#d9a84f;
  color:#11122f;
  font-size:18px;
  font-weight:bold;
  cursor:pointer;
  margin-top:30px;
}

</style>
</head>

<body>

<div class="container">

  <!-- LEFT FORM -->
  <div class="left-box">

    <div class="heading">Shipping Details</div>

<form action="<?php echo e(url('/checkout/place')); ?>" method="POST">
    <?php echo csrf_field(); ?>
  


      <div class="form-row">

        <div class="form-group">
          <label>FIRST NAME</label>
          <input type="text" name="fname" required>
        </div>

        <div class="form-group">
          <label>LAST NAME</label>
          <input type="text" name="lname" required>
        </div>

        <div class="form-group full">
          <label>EMAIL</label>
          <input type="email" name="email" required>
        </div>

        <div class="form-group full">
          <label>PHONE</label>
          <input type="text" name="phone" required>
        </div>

        <div class="form-group full">
          <label>ADDRESS</label>
          <input type="text" name="address" required>
        </div>

      </div>

  </div>

  <!-- RIGHT SUMMARY -->
  <div class="right-box">

    <div class="summary-title">Order Summary</div>

    <?php if(empty($cart)): ?>
        <p>Your cart is empty</p>
    <?php else: ?>

        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="product">

          <div class="product-left">

            <img src="<?php echo e($item['image'] ?? 'https://via.placeholder.com/60'); ?>">

            <div>
              <div class="product-name"><?php echo e($item['name']); ?></div>
              <div class="qty">Qty: <?php echo e($item['quantity']); ?></div>
            </div>

          </div>

          <div class="price">
            Rs <?php echo e($item['price'] * $item['quantity']); ?>

          </div>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="total">
          <span>Total</span>
          <span class="total-price">Rs <?php echo e($total); ?></span>
        </div>

  <button type="submit" class="checkout-btn">
    Complete Purchase
</button>
    <?php endif; ?>

    </form>

  </div>

</div>

</body>
</html><?php /**PATH C:\Users\Shahbaz Computers\zenvora-store\resources\views/checkout.blade.php ENDPATH**/ ?>