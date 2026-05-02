<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Zenvora</title>

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
    padding: 18px 50px;
    background: #000;
    border-bottom: 1px solid gold;
}

.logo {
    color: gold;
    font-size: 26px;
    font-weight: bold;
}

.nav-links a {
    margin: 0 12px;
    color: gold;
    text-decoration: none;
}

/* DROPDOWN */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-btn {
    color: gold;
    cursor: pointer;
}

.dropdown-menu {
    display: none;
    position: absolute;
    right: 0;
    background: #111;
    border: 1px solid gold;
    min-width: 150px;
}

.dropdown-menu a,
.dropdown-menu button {
    display: block;
    width: 100%;
    padding: 10px;
    color: gold;
    text-decoration: none;
    background: none;
    border: none;
    text-align: left;
    cursor: pointer;
}

.dropdown-menu a:hover,
.dropdown-menu button:hover {
    background: gold;
    color: black;
}

.dropdown.active .dropdown-menu {
    display: block;
}

.hero {
    text-align: center;
    margin-top: 120px;
}

.hero h1 {
    font-size: 60px;
    color: gold;
}

.hero p {
    color: #aaa;
}
</style>
</head>

<body>

<div class="navbar">
    <div class="logo">ZENVORA</div>

    <div class="nav-links">
        <a href="/">Home</a>
        <a href="/shop">Shop</a>
        <a href="/contact">Contact</a>
        <a href="/checkout">Checkout</a>

        <!-- DROPDOWN -->
        <div class="dropdown">
            <span class="dropdown-btn">
                ⚙ 
                <?php if(auth()->guard()->check()): ?>
                    <?php echo e(auth()->user()->name); ?> ▾
                <?php else: ?>
                    Account ▾
                <?php endif; ?>
            </span>

            <div class="dropdown-menu">

                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->role === 'admin'): ?>
                        <a href="<?php echo e(url('/admin')); ?>">Dashboard</a>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('login')); ?>">Sign In</a>
                    <a href="<?php echo e(route('register')); ?>">Register</a>
                <?php endif; ?>

                <?php if(auth()->guard()->check()): ?>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit">Logout</button>
                    </form>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<div class="hero">
    <h1>Welcome to Zenvora</h1>
    <p>Premium Shopping Experience</p>
</div>

<script>
const btn = document.querySelector(".dropdown-btn");
const dropdown = document.querySelector(".dropdown");

btn.addEventListener("click", function () {
    dropdown.classList.toggle("active");
});

window.addEventListener("click", function (e) {
    if (!dropdown.contains(e.target)) {
        dropdown.classList.remove("active");
    }
});
</script>

</body>
</html><?php /**PATH C:\Users\Shahbaz Computers\zenvora-store\resources\views/welcome.blade.php ENDPATH**/ ?>