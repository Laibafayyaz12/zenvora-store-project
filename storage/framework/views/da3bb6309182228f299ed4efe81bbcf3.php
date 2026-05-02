

<?php $__env->startSection('content'); ?>

<style>
body {
    background: #050505 !important;
    color: white;
}

.card {
    background: #0a0a0a;
    border: 1px solid #d4af37;
    box-shadow: 0 0 20px rgba(212,175,55,0.3);
}

.gold-text {
    color: #ffd700;
}

.input {
    width: 100%;
    margin-bottom: 15px;
    padding: 12px;
    background: #000;
    border: 1px solid #d4af37;
    color: white;
    border-radius: 8px;
}

.input:focus {
    outline: none;
    box-shadow: 0 0 10px #ffd700;
}

.btn-gold {
    width: 100%;
    padding: 12px;
    background: #d4af37;
    color: black;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
}
</style>

<div class="min-h-screen py-12">

    <div class="max-w-6xl mx-auto px-4">

        <?php if(session('success')): ?>
            <div style="background: green; padding:10px; text-align:center; border-radius:6px;">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            <!-- LEFT -->
            <div class="card p-8 rounded-2xl">

                <h2 class="text-3xl font-bold gold-text mb-4">
                    Get In Touch ✨
                </h2>

                <p style="color:#aaa;">We'd love to hear from you.</p>

                <br>

                <p class="gold-text">📍 Address</p>
                <p>Zahir pir,Punjab Pakistan</p>

                <br>

                <p class="gold-text">📞 Phone</p>
                <p>+92 03098662695</p>

                <br>

                <p class="gold-text">📧 Email</p>
                <p>support@zenvora.com</p>

            </div>

            <!-- RIGHT -->
            <div class="card p-8 rounded-2xl">

                <h2 class="text-2xl font-bold mb-4 gold-text">
                    Send Message 💬
                </h2>

                <form method="POST" action="<?php echo e(route('contact.send')); ?>">
                    <?php echo csrf_field(); ?>

                    <input type="text" name="name" placeholder="Your Name" class="input" required>
                    <input type="email" name="email" placeholder="Your Email" class="input" required>
                    <input type="text" name="subject" placeholder="Subject" class="input" required>
                    <textarea name="message" placeholder="Message" class="input" required></textarea>

                    <button class="btn-gold">Send Message 🚀</button>

                </form>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahbaz Computers\zenvora-store\resources\views/contact.blade.php ENDPATH**/ ?>