<?php $__env->startSection('page-title', trans('app.two_factor_authentication')); ?>

<?php $__env->startSection('content'); ?>

<div class="col-md-8 col-lg-6 col-xl-5 mx-auto my-10p" id="login">
    <div class="text-center">
        <img src="<?php echo e(url('assets/img/vanguard-logo.png')); ?>" alt="<?php echo e(settings('app_name')); ?>" height="50">
    </div>
</div>

<div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title text-center mt-4 text-uppercase">
                <?php echo app('translator')->getFromJson('app.two_factor_authentication'); ?>
            </h5>
        </div>

        <?php if(settings('2fa.enabled')): ?>
            <?php $route = Authy::isEnabled($user) ? 'disable' : 'enable'; ?>
                <?php echo Form::open(['route' => array("two_factor.{$route}",$user), 'method' => 'POST', 'id' => 'two-factor-form']); ?>

                         <?php echo $__env->make('user.partials.two-factor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::close(); ?>

        <?php endif; ?>
</div>   

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo HTML::script('assets/js/as/btn.js'); ?>

    <?php if(settings('2fa.enabled')): ?>
        <?php echo JsValidator::formRequest('Vanguard\Http\Requests\User\EnableTwoFactorRequest', '#two-factor-form'); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>