<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('install.steps', ['steps' => [
        'welcome' => 'selected done',
        'requirements' => 'selected done',
        'permissions' => 'selected done',
        'database' => 'selected done',
        'installation' => 'selected done',
        'complete' => 'selected'
    ]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="step-content">
        <h3>Complete!</h3>
        <hr>
        <p><strong>Well Done!</strong></p>
        <p>You application is now successfully installed! You can login by clicking on "Log In" button below.</p>

        <?php if(is_writable(base_path())): ?>
            <p><strong>Important!</strong> Since your root directory is still writable,
            you can change the permissions to 755 to make it writable only by root user.</p>
        <?php endif; ?>

        <a class="btn btn-primary float-right" href="<?php echo e(url('login')); ?>">
            <i class="fa fa-sign-in"></i>
            Log In
        </a>
        <div class="clearfix"></div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.install', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>