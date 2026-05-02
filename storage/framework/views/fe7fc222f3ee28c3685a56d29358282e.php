

<?php $__env->startSection('content'); ?>

<div style="background:#0d0d0d; min-height:100vh; padding:30px; color:white;">

    <!-- HEADER -->
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        
        <h2 style="color:gold;">📊 Dashboard</h2>

        <a href="<?php echo e(route('products.create')); ?>"
           style="
               background:gold;
               color:black;
               padding:10px 20px;
               text-decoration:none;
               border-radius:6px;
               font-weight:bold;
           ">
           ➕ Add Product
        </a>

    </div>

    <!-- TOP CARDS -->
    <div style="display:flex; gap:20px; flex-wrap:wrap; margin-bottom:20px;">

        <div style="background:gold; color:black; padding:20px; border-radius:10px; width:200px;">
            <h3><?php echo e($totalOrders); ?></h3>
            <p>Total Orders</p>
        </div>

        <div style="background:gold; color:black; padding:20px; border-radius:10px; width:200px;">
            <h3><?php echo e($totalProducts); ?></h3>
            <p>Products</p>
        </div>

        <div style="background:gold; color:black; padding:20px; border-radius:10px; width:200px;">
            <h3><?php echo e($totalUsers); ?></h3>
            <p>Users</p>
        </div>

        <div style="background:gold; color:black; padding:20px; border-radius:10px; width:200px;">
            <h3><?php echo e($totalContacts); ?></h3>
            <p>Contact Messages</p>
        </div>

    </div>

    <!-- REVENUE -->
    <div style="background:#1a1a1a; border:1px solid gold; padding:20px; border-radius:10px; margin-bottom:20px;">
        <h3 style="color:gold;">Rs <?php echo e($revenue); ?></h3>
        <p>Revenue</p>
    </div>

    <!-- RECENT ORDERS -->
    <h3 style="color:gold; margin-bottom:10px;">Recent Orders</h3>

    <table style="width:100%; border-collapse:collapse; background:#111;">

        <tr style="background:gold; color:black;">
            <th style="padding:10px;">ID</th>
            <th>Total</th>
            <th>Status</th>
            <th>Date</th>
        </tr>

        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr style="border-bottom:1px solid #333; text-align:center;">
            <td style="padding:10px;"><?php echo e($order->id); ?></td>
            <td>Rs <?php echo e($order->total); ?></td>
            <td style="color:gold;"><?php echo e(ucfirst($order->status)); ?></td>
            <td><?php echo e($order->created_at); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahbaz Computers\zenvora-store\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>