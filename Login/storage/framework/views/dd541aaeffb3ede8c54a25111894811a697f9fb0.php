<?php if(! Authy::isEnabled($user)): ?>
    <div class="alert alert-info">
        <?php echo app('translator')->getFromJson('app.in_order_to_enable_2fa_you_must'); ?> <a target="_blank" href="https://www.authy.com/">Authy</a> <?php echo app('translator')->getFromJson('app.application_on_your_phone'); ?>.
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="country_code"><?php echo app('translator')->getFromJson('app.country_code'); ?></label>
                <input type="text" class="form-control" id="country_code" placeholder="381"
                       name="country_code" value="<?php echo e($user->two_factor_country_code); ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone_number"><?php echo app('translator')->getFromJson('app.cell_phone'); ?></label>
                <input type="text" class="form-control" id="phone_number" placeholder="<?php echo app('translator')->getFromJson('app.phone_without_country_code'); ?>"
                       name="phone_number" value="<?php echo e($user->two_factor_phone); ?>">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" data-toggle="loader" data-loading-text="<?php echo app('translator')->getFromJson('app.enabling'); ?>">
        <?php echo app('translator')->getFromJson('app.enable'); ?>
    </button>
<?php else: ?>
    <button type="submit" class="btn btn-danger mt-2" data-toggle="loader" data-loading-text="<?php echo app('translator')->getFromJson('app.disabling'); ?>">
        <i class="fa fa-close"></i>
        <?php echo app('translator')->getFromJson('app.disable'); ?>
    </button>
<?php endif; ?>
