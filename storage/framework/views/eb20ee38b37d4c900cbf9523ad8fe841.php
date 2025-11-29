<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Cooknice'); ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>
    <body class="bg-[#F9E2AF]">
        <?php echo $__env->yieldContent('content'); ?>
    </body>

</html>
<?php /**PATH C:\Users\hp\Cooknice2\resources\views/layouts/app.blade.php ENDPATH**/ ?>