

<?php $__env->startSection('content'); ?>

<div style="background:#0d0d0d; min-height:100vh; padding:30px; color:white;">

    <!-- HEADER -->
    <div style="display:flex; justify-content:space-between; align-items:center;">
        <h2 style="color:gold;">➕ Add Product</h2>

        <a href="/admin/products" 
           style="background:gold; color:black; padding:8px 15px; text-decoration:none;">
           🏠 Back
        </a>
    </div>

    <br>

    <!-- SUCCESS -->
    <?php if(session('success')): ?>
        <div style="background:green; padding:10px; margin-bottom:15px;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- FORM -->
    <form method="POST" action="<?php echo e(route('products.store')); ?>" enctype="multipart/form-data" style="max-width:600px;">
        <?php echo csrf_field(); ?>

        <!-- NAME -->
        <label>Name</label>
        <input type="text" name="name" required
               style="width:100%; padding:8px; margin-bottom:10px; background:black; color:white; border:1px solid gold;">

        <!-- DESCRIPTION -->
        <label>Description</label>
        <textarea name="description"
                  style="width:100%; padding:8px; margin-bottom:10px; background:black; color:white; border:1px solid gold;"></textarea>

        <!-- PRICE -->
        <label>Price</label>
        <input type="number" name="price" required
               style="width:100%; padding:8px; margin-bottom:10px; background:black; color:white; border:1px solid gold;">

        <!-- STOCK -->
        <label>Stock</label>
        <input type="number" name="stock"
               style="width:100%; padding:8px; margin-bottom:10px; background:black; color:white; border:1px solid gold;">

        <!-- CATEGORY -->
        <label>Category</label>
        <input type="text" name="category"
               style="width:100%; padding:8px; margin-bottom:10px; background:black; color:white; border:1px solid gold;">

        <!-- IMAGE -->
        <label>Image</label>
        <input type="file" name="image"
               style="width:100%; padding:8px; margin-bottom:15px; background:black; color:white; border:1px solid gold;">

        <!-- BUTTON -->
        <button type="submit" 
                style="background:gold; color:black; padding:10px 20px; border:none;">
            Save Product
        </button>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahbaz Computers\zenvora-store\resources\views/admin/products/create.blade.php ENDPATH**/ ?>