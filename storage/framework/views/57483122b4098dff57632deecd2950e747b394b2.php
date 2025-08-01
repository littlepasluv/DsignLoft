<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <title><?php echo $__env->yieldContent('title', 'DsignLoft'); ?></title>
    
    <link href="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/favicon-dsignloft-YKbl23wxwNT9WK37.png" rel="icon" type="image/png">
    
    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('css/auth.css')); ?>">
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <div id="app">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-auth-compat.js"></script>
    <script src="<?php echo e(asset('js/firebase-config.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>

<?php /**PATH /Users/priokus/dsignloft/resources/views/layouts/auth.blade.php ENDPATH**/ ?>