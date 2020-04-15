<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('install.steps', ['steps' => ['welcome' => 'selected done', 'requirements' => 'selected']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php if(! $allLoaded): ?>
        <div class="alert alert-danger">
            <strong>Oh snap!</strong> Your system does not meet the requirements. You have to fix them in order to continue.
        </div>
    <?php endif; ?>

    <div class="step-content">
        <h3>System Requirements</h3>
        <hr>
        <ul class="list-group mb-4">
            <?php $__currentLoopData = $requirements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extension => $loaded): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item <?php echo e(! $loaded ? 'list-group-item-danger' : ''); ?>">
                <?php echo e($extension); ?>

                <?php if($loaded): ?>
                    <span class="badge badge-success float-right"><i class="fa fa-check"></i></span>
                <?php else: ?>
                    <span class="badge badge-danger float-right"><i class="fa fa-times"></i></span>
                <?php endif; ?>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php if($allLoaded): ?>
            <a class="btn btn-green float-right" href="<?php echo e(route('install.permissions')); ?>">
                Next
                <i class="fa fa-arrow-right"></i>
            </a>
        <?php else: ?>
            <button class="btn btn-green pull-right" disabled>
                Next
                <i class="fa fa-arrow-right"></i>
            </button>
        <?php endif; ?>
        <div class="clearfix"></div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.install', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>