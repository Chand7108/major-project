<?php $__env->startSection('page-title', trans('app.sign_up')); ?>

<?php if(settings('registration.captcha.enabled')): ?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
<?php endif; ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-8 col-lg-6 col-xl-5 mx-auto my-10p">
        <div class="text-center">
            <img src="<?php echo e(url('assets/img/vanguard-logo.png')); ?>" alt="<?php echo e(settings('app_name')); ?>" height="50">
        </div>

        <?php echo $__env->make('partials/messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title text-center mt-4 text-uppercase">
                    <?php echo app('translator')->getFromJson('app.register'); ?>
                </h5>

                <div class="p-4">
                    <?php echo $__env->make('auth.social.buttons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <form role="form" action="<?= url('register') ?>" method="post" id="registration-form" autocomplete="off" class="mt-3">
                        <input type="hidden" value="<?= csrf_token() ?>" name="_token">
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="<?php echo app('translator')->getFromJson('app.email'); ?>" value="<?php echo e(old('email')); ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" id="username" class="form-control" placeholder="<?php echo app('translator')->getFromJson('app.username'); ?>"  value="<?php echo e(old('username')); ?>">
                        </div>
                      
                        <div class="form-group">
                            <input type="voterid" name="voterid" id="voterid" class="form-control" placeholder="<?php echo app('translator')->getFromJson('app.voterid'); ?>" value="<?php echo e(old('voterid')); ?>" >
                        </div>

                       <!--  <div class="form-group">
                            <input type="text" name="state" id="state" class="form-control" placeholder="<?php echo app('translator')->getFromJson('app.state'); ?>" value="<?php echo e(old('state')); ?>">
                         </div> -->

                        <div class="form-group">
                            <input type="text" name="aadhar_number" id="aadhar_number" class="form-control" placeholder="<?php echo app('translator')->getFromJson('app.aadhar'); ?>" value="<?php echo e(old('aadhar_number')); ?>"> 
                        </div>

                        <div class="form-group">
                         <select id="state" name="state" class="form-control">
                                          <option value="0">MadhyaPradesh</option> 
                                          <option value="3">Maharashtra</option>
                                          <option value="6">Krnataka</option>
                                          <option value="9">UttarPradesh</option>
                                          <option value="12">Punjab</option>
                                          <option value="15">Rajsthan</option>
                                          <option value="18">Kerala</option>
                                          <option value="21">Gujarat</option>
                                          <option value="24">TamilNadu</option>
                                          <option value="27">JammuKashmir</option>

                        </select>
                     </div> 
                     
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="<?php echo app('translator')->getFromJson('app.password'); ?>">
                        </div>
                         <div class="form-group">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="<?php echo app('translator')->getFromJson('app.confirm_password'); ?>">
                        </div>

                        <?php if(settings('tos')): ?>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="tos" id="tos" value="1"/>
                                <label class="custom-control-label font-weight-normal" for="tos">
                                    <?php echo app('translator')->getFromJson('app.i_accept'); ?>
                                    <a href="#tos-modal" data-toggle="modal"><?php echo app('translator')->getFromJson('app.terms_of_service'); ?></a>
                                </label>
                            </div>
                        <?php endif; ?>

                        
                        <?php if(settings('registration.captcha.enabled')): ?>
                            <div class="form-group my-4">
                                <?php echo app('captcha')->display(); ?>

                            </div>
                        <?php endif; ?>
                        

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" id="btn-login">
                                <?php echo app('translator')->getFromJson('app.register'); ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="text-center text-muted">
            <?php if(settings('reg_enabled')): ?>
                <?php echo app('translator')->getFromJson('app.already_have_an_account'); ?>
                <a class="font-weight-bold" href="<?= url("login") ?>"><?php echo app('translator')->getFromJson('app.login'); ?></a>
            <?php endif; ?>
        </div>

    </div>

    <?php if(settings('tos')): ?>
        <div class="modal fade" id="tos-modal" tabindex="-1" role="dialog" aria-labelledby="tos-label">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tos-label"><?php echo app('translator')->getFromJson('app.terms_of_service'); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>1. Terms</h4>

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Donec quis lacus porttitor, dignissim nibh sit amet, fermentum felis.
                            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                            cubilia Curae; In ultricies consectetur viverra. Nullam velit neque,
                            placerat condimentum tempus tincidunt, placerat eu lectus. Nam molestie
                            porta purus, et pretium risus vehicula in. Cras sem ipsum, varius sagittis
                            rhoncus nec, dictum maximus diam. Duis ac laoreet est. In turpis velit, placerat
                            eget nisi vitae, dignissim tristique nisl. Curabitur sollicitudin, nunc ut
                            viverra interdum, lacus...
                        </p>

                        <h4>2. Use License</h4>

                        <ol type="a">
                            <li>
                                Aenean vehicula erat eu nisi scelerisque, a mattis purus blandit. Curabitur congue
                                ollis nisl malesuada egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit:
                            </li>
                        </ol>

                        <p>...</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo app('translator')->getFromJson('app.close'); ?></button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo JsValidator::formRequest('Vanguard\Http\Requests\Auth\RegisterRequest', '#registration-form'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>