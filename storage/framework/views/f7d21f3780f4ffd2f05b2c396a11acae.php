

<?php $__env->startSection('content'); ?>

<div style="background:#0d0d0d; min-height:100vh; padding:30px; color:white;">

    <h2 style="color:gold; margin-bottom:20px;">📦 Orders</h2>

    <?php if(session('success')): ?>
        <div style="background:green; padding:10px; margin-bottom:15px;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <table style="width:100%; border-collapse:collapse;">

        <tr style="background:gold; color:black;">
            <th style="padding:10px;">ID</th>
            <th>Name</th>
            <th>Total</th>
            <th>Status</th>
            <th>Update</th>
        </tr>

        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr style="border-bottom:1px solid #444; text-align:center;">

            <td style="padding:10px;"><?php echo e($order->id); ?></td>

            <td>
                <?php echo e($order->user->name ?? $order->name ?? 'Guest'); ?>

            </td>

            <td>Rs <?php echo e($order->total); ?></td>

            <td style="color:gold; font-weight:bold;">
                <?php echo e(ucfirst($order->status)); ?>

            </td>

            <td>
                <form method="POST" action="<?php echo e(route('admin.order.status', $order->id)); ?>">
                    <?php echo csrf_field(); ?>

                    <select name="status" style="padding:5px; background:black; color:gold; border:1px solid gold;">
                        <option value="pending" <?php echo e($order->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                        <option value="delivered" <?php echo e($order->status == 'delivered' ? 'selected' : ''); ?>>Delivered</option>
                    </select>

                    <button style="background:gold; color:black; padding:5px 10px; border:none; margin-left:5px;">
                        Update
                    </button>
                </form>
            </td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahbaz Computers\zenvora-store\resources\views/admin/orders.blade.php ENDPATH**/ ?>