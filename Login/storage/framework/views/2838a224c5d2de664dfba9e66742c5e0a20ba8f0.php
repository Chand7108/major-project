<?php $__env->startSection('page-title', trans('app.val_transaction')); ?>

<?php $__env->startSection('content'); ?>

<div class="col-md-8 col-lg-6 col-xl-5 mx-auto my-10p">
    <div class="text-center">
        <img src="<?php echo e(url('assets/img/vanguard-logo.png')); ?>" alt="<?php echo e(settings('app_name')); ?>" height="50">
    </div>

    <?php echo $__env->make('partials/messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title text-center mt-4 text-uppercase">
                <?php echo app('translator')->getFromJson('app.val_transaction'); ?>
            </h5>

            <div class="p-4">
                <form role="form" action="<?= route('user.token.validate') ?>" method="POST" autocomplete="off">
                <input type="hidden" value="<?= csrf_token() ?>" name="_token">

                <div class="form-group">
                    <label for="password" class="sr-only"><?php echo app('translator')->getFromJson('app.token'); ?></label>
                    <input type="text" name="token" id="token" class="form-control" placeholder="<?php echo app('translator')->getFromJson('app.authy_2fa_token'); ?>">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" id="btn-reset-password">
                        <?php echo app('translator')->getFromJson('app.validate'); ?>
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>