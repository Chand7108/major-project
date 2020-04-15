<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('install.steps', ['steps' => [
        'welcome' => 'selected done',
        'requirements' => 'selected done',
        'permissions' => 'selected'
    ]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="step-content">
        <h3>Permissions</h3>
        <hr>
        <ul class="list-group mb-4">
            <?php $__currentLoopData = $folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path => $isWritable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item">
                    <?php echo e($path); ?>

                    <?php if($isWritable): ?>
                        <span class="badge badge-secondary float-right ml-2">775</span>
                        <span class="badge badge-success float-right"><i class="fa fa-check"></i></span>
                    <?php else: ?>
                        <span class="badge badge-secondary float-right ml-2">775</span>
                        <span class="badge badge-danger float-right"><i class="fa fa-times"></i></span>
                    <?php endif; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <a class="btn btn-green float-right" href="<?php echo e(route('install.database')); ?>">
            Next
            <i class="fa fa-arrow-right"></i>
        </a>
        <div class="clearfix"></div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.install', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>