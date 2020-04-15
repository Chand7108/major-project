<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('install.steps', ['steps' => [
        'welcome' => 'selected done',
        'requirements' => 'selected done',
        'permissions' => 'selected done',
        'database' => 'selected done',
        'installation' => 'selected'
    ]], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo Form::open(['route' => 'install.install']); ?>

        <div class="step-content">
            <h3>C  O  D  E  L  I  S  T  .  C  C</h3>
            <hr>
            <p>Vanguard is ready to be installed!</p>
            <p>Before you proceed, please provide the name for your application below:</p>
            <div class="form-group">
                <label for="app_name">App Name</label>
                <input type="text" class="form-control" id="app_name" name="app_name" value="Vanguard">
            </div>
            <button class="btn btn-green pull-right" data-toggle="loader" data-loading-text="Installing" type="submit">
                <i class="fa fa-play"></i>
                Install
            </button>
            <div class="clearfix"></div>
        </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.install', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>