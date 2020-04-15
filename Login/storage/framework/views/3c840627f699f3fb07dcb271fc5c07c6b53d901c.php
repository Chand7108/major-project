<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('install.steps', ['steps' => [
        'welcome' => 'selected done',
        'requirements' => 'selected done',
        'permissions' => 'selected done',
        'database' => 'selected'
    ]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo Form::open(['route' => 'install.installation']); ?>

        <div class="step-content">
            <h3>Database Info</h3>
            <hr>
            <div class="form-group">
                <label for="host">Host</label>
                <input type="text" class="form-control" id="host" name="host" value="<?php echo e(old('host')); ?>">
                <small>Database host. Usually you should enter localhost or mysql.</small>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo e(old('username')); ?>">
                <small>Your database username.</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <small>Database password for provided username.</small>
            </div>
            <div class="form-group">
                <label for="database">Database Name</label>
                <input type="text" class="form-control" id="database" name="database"  value="<?php echo e(old('database')); ?>">
                <small>Name of database where tables should be created.</small>
            </div>
            <div class="form-group">
                <label for="prefix">Tables Prefix</label>
                <input type="text" class="form-control" id="prefix" name="prefix" value="<?php echo e(old('prefix')); ?>">
                <small>Prefix to put in front of database table names. You can leave it blank if you want.</small>
            </div>
            <button class="btn btn-green float-right mt-3">
                Next
                <i class="fa fa-arrow-right"></i>
            </button>
            <div class="clearfix"></div>
        </div>
    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.install', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>