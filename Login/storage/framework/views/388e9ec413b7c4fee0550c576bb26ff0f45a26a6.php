<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Installation - <?php echo e(settings('app_name')); ?></title>

    <?php echo HTML::style('assets/css/vendor.css'); ?>

    <?php echo HTML::style('assets/css/app.css'); ?>

    <?php echo HTML::style('assets/css/install.css'); ?>


    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body style="background-color: #fff;">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-3 logo-wrapper">
                <img src="<?php echo e(url('assets/img/vanguard-logo.png')); ?>" alt="Vanguard" class="logo">
            </div>
        </div>
        <div class="wizard col-md-6 offset-3">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo e(mix("assets/js/vendor.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('assets/js/as/app.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('assets/js/as/btn.js')); ?>"></script>
    <script>
        $("a[data-toggle=loader], button[data-toggle=loader]").click(function () {
            if ($(this).parents('form').valid()) {
                as.btn.loading($(this), $(this).data('loading-text'));
                $(this).parents('form').submit();
            }
        });
    </script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
