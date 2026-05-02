

<?php $__env->startSection('content'); ?>

<div style="background:#0d0d0d; min-height:100vh; padding:30px; color:white;">

    <!-- HEADER -->
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h2 style="color:gold;">👤 Users Management</h2>

        <a href="<?php echo e(route('admin.dashboard')); ?>" 
           style="background:gold; color:black; padding:8px 15px; text-decoration:none; border-radius:5px;">
            🏠 Home
        </a>
    </div>

    <!-- TABLE -->
    <table style="width:100%; border-collapse:collapse; background:#111; border-radius:10px; overflow:hidden;">

        <!-- TABLE HEADER -->
        <thead>
            <tr style="background:gold; color:black; text-align:center;">
                <th style="padding:12px;">ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created</th>
            </tr>
        </thead>

        <!-- TABLE BODY -->
        <tbody>

            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr style="border-bottom:1px solid #333; text-align:center;">

                <td style="padding:10px;"><?php echo e($user->id); ?></td>

                <td style="color:gold; font-weight:bold;">
                    <?php echo e($user->name); ?>

                </td>

                <td><?php echo e($user->email); ?></td>

                <td>
                    <span style="
                        padding:5px 10px;
                        border-radius:5px;
                        background: <?php echo e($user->role == 'admin' ? 'gold' : '#444'); ?>;
                        color: <?php echo e($user->role == 'admin' ? 'black' : 'white'); ?>;
                        font-weight:bold;
                    ">
                        <?php echo e(ucfirst($user->role ?? 'user')); ?>

                    </span>
                </td>

                <td>
                    <?php echo e($user->created_at->format('d M Y')); ?>

                </td>

            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="5" style="padding:20px; text-align:center; color:#aaa;">
                    No Users Found 😢
                </td>
            </tr>
            <?php endif; ?>

        </tbody>

    </table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahbaz Computers\zenvora-store\resources\views/admin/users.blade.php ENDPATH**/ ?>