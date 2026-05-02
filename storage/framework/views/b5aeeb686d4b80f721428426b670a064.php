

<?php $__env->startSection('content'); ?>

<div style="background:#0d0d0d; min-height:100vh; padding:30px; color:white;">

    <h2 style="color:gold; margin-bottom:20px;">✏️ Edit Message</h2>

    <!-- SUCCESS MESSAGE -->
    <?php if(session('success')): ?>
        <div style="background:green; padding:10px; margin-bottom:15px;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('admin.contact.update', $contact->id)); ?>" style="max-width:600px;">
        <?php echo csrf_field(); ?>

        <!-- NAME -->
        <label>Name</label>
        <input type="text" name="name" value="<?php echo e($contact->name); ?>"
               style="width:100%; padding:8px; margin-bottom:10px; background:black; color:white; border:1px solid gold;">

        <!-- EMAIL -->
        <label>Email</label>
        <input type="email" name="email" value="<?php echo e($contact->email); ?>"
               style="width:100%; padding:8px; margin-bottom:10px; background:black; color:white; border:1px solid gold;">

        <!-- SUBJECT -->
        <label>Subject</label>
        <input type="text" name="subject" value="<?php echo e($contact->subject); ?>"
               style="width:100%; padding:8px; margin-bottom:10px; background:black; color:white; border:1px solid gold;">

        <!-- MESSAGE -->
        <label>Message</label>
        <textarea name="message" rows="5"
                  style="width:100%; padding:8px; margin-bottom:15px; background:black; color:white; border:1px solid gold;"><?php echo e($contact->message); ?></textarea>

        <!-- BUTTONS -->
        <button type="submit" 
                style="background:gold; color:black; padding:10px 20px; border:none;">
            Update
        </button>

        <a href="<?php echo e(route('admin.contact')); ?>" 
           style="margin-left:10px; background:#444; color:white; padding:10px 20px; text-decoration:none;">
           Cancel
        </a>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahbaz Computers\zenvora-store\resources\views/admin/contact_edit.blade.php ENDPATH**/ ?>