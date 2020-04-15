<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('install.steps', ['steps' => ['welcome' => 'selected']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="step-content">
        <h3>Welcome</h3>
        <hr>
        <p>This steps will guide you through few step installation process.</p>
        <p>When this installation process is finished, you will be able
            to login and manage your users immediately! </p>
        <br>
        <a href="<?php echo e(route('install.requirements')); ?>" class="btn btn-primary float-right" role="button">
            Next
            <i class="fa fa-arrow-right"></i>
        </a>
        <div class="clearfix"></div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.install', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>