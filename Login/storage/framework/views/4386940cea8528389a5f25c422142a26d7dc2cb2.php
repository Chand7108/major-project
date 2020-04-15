<?php $__env->startSection('page-title', trans('app.dashboard')); ?>
<?php $__env->startSection('page-heading', trans('app.dashboard')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->getFromJson('app.dashboard'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <a href="<?php echo e(route('vote')); ?>" class="text-center no-decoration">
                    <div class="icon my-3">
                        <i class="fas fa-user fa-2x"></i>
                    </div>
                    <p class="lead mb-0"><?php echo app('translator')->getFromJson('app.vote'); ?></p>
                </a>
            </div>
        </div>
    </div>

    <?php if(config('session.driver') == 'database'): ?>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <a href="<?php echo e(route('profile.sessions')); ?>" class="text-center  no-decoration">
                        <div class="icon my-3">
                            <i class="fa fa-list fa-2x"></i>
                        </div>
                        <p class="lead mb-0"><?php echo app('translator')->getFromJson('app.my_sessions'); ?></p>
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <a href="<?php echo e(route('profile.activity')); ?>" class="text-center no-decoration">
                    <div class="icon my-3">
                        <i class="fas fa-server fa-2x"></i>
                    </div>
                    <p class="lead mb-0"><?php echo app('translator')->getFromJson('app.activity_log'); ?></p>
                </a>
            </div>
        </div>

    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <a href="<?php echo e(route('auth.logout')); ?>" class="text-center no-decoration">
                    <div class="icon my-3">
                        <i class="fas fa-sign-out-alt fa-2x"></i>
                    </div>
                    <p class="lead mb-0"><?php echo app('translator')->getFromJson('app.logout'); ?></p>
                </a>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="panel-heading"></div>
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo app('translator')->getFromJson('app.activity'); ?> (<?php echo app('translator')->getFromJson('app.last_two_weeks'); ?>)
                </h5>

                <div class="pt-4 px-3">
                    <canvas id="myChart" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        var labels = <?php echo json_encode(array_keys($activities)); ?>;
        var activities = <?php echo json_encode(array_values($activities)); ?>;
        var trans = {
            chartLabel: "<?php echo e(trans('app.registration_history')); ?>",
            action: "<?php echo e(trans('app.action_sm')); ?>",
            actions: "<?php echo e(trans('app.actions_sm')); ?>"
        };
    </script>
    <?php echo HTML::script('assets/js/chart.min.js'); ?>

    <?php echo HTML::script('assets/js/as/dashboard-default.js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>