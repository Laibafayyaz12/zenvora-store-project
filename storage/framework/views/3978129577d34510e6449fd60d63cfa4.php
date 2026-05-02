

<?php $__env->startSection('content'); ?>

<div style="background:#0d0d0d; min-height:100vh; padding:20px; color:white;">

    <h2 style="color:gold;">📦 All Products</h2>

    <div style="background:black; padding:20px; margin-top:20px; border:1px solid gold;">

        <table id="products-table" style="width:100%;">

            <thead>
                <tr style="background:gold; color:black;">
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Action</th>
                </tr>
            </thead>

        </table>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function () {

    $('#products-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "<?php echo e(route('products.data')); ?>",

    order: [], // ✅ IMPORTANT FIX

    columns: [
        { data: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'name' },
        { data: 'description' },
        { data: 'price' },
        { data: 'image', orderable:false, searchable:false },
        { data: 'category' },
        { data: 'stock' },
        { data: 'created_at' },
        { data: 'updated_at' },
        { data: 'action', orderable:false, searchable:false }
    ]
});

});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahbaz Computers\zenvora-store\resources\views/admin/products/index.blade.php ENDPATH**/ ?>