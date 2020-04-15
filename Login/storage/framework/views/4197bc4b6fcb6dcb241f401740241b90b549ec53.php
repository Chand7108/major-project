<?php $__env->startSection('page-title', 'Voting Setup'); ?>
<?php $__env->startSection('page-heading', 'Voting Setup'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        Voting Setup
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <h3>
        Voting Setup
    </h3>
    <br>
    <h5>
        Follow these step-by-step instructions to vote
    </h5>
    <br>
    <h5>
        Step 1 : Install the MetaMask extension
    </h5>
    <p>
        <ol>
        <li>
        Open <a href="https://metamask.io">https://metamask.io</a> website or search for “Metamask extension” in your favorite browser (you can install Metamask for Chrome, Firefox and Opera browsers).
        <br>
        <br>
        <img src="assets/img/Chrome.png" style="width:700px;height:350px;" class="img-fluid" alt="Responsive image">
        </li>
        <br>
        <li>Click <strong>Add to Chrome</strong> to install MetaMask as Google Chrome extension (same as for other browsers). 
        </li>
        <br>
        <li>
            Click <strong>Add Extension</strong>. 
        </li>
        <br>
        <img src="assets/img/Extension1.png" style="width:450px;height:350px;" class="img-fluid" alt="Responsive image">
        <img src="assets/img/Extension2.png" style="width:450px;height:350px;" class="img-fluid" alt="Responsive image">
        </li>
        <br>
        <br>
        <li>
            Create MetaMask account.
        </li>
        </ol>
    </p>
        <br>
         <h5>
        Step 2 :  Import a wallet using a private key
        </h5>
    <p>
        <ol>
            <li>
               After creating an account, click on the <strong>“Account”</strong> button in the upper right corner.
            </li>
            <br>
            <li>
                Click <strong>Import account</strong>.
            </li>
            <br>
            <li>
                Import an account using below <strong>private key</strong>, simply paste this private key string and click Import. 
                [<i> Do not share your private key with anyone.</i>]
            </li>
             <div class="user text-center">
                   <div class="d-flex justify-content-center flex-column">
                    <br>
                    <h4>
                <small class="text-muted"><?php echo e($user->ethereum_privatekey); ?></small>
                </h4>
                     </div>
             </div>
            <br>
            <img src="assets/img/ImportAccount1.jpeg" style="width:300px;height:550px;" class="img-fluid" alt="Responsive image">
            <img src="assets/img/ImportAccount2.jpeg" style="width:300px;height:550px;" class="img-fluid" alt="Responsive image">
            <img src="assets/img/ImportAccount3.jpeg" style="width:300px;height:550px;" class="img-fluid" alt="Responsive image">
            <br>
            <br>
            <h5 class="text-center">
            <i> Click on the vote button below if you have completed above procedure. </i>
            </h5>


            <form role="form" action="http://localhost:3000" method="GET" id="login-form" autocomplete="off" class="mt-3">

                    <input type="hidden" value="<?= csrf_token() ?>" name="_token">

                    

                    <div class="form-group mt-4 text-center">
                        <button type="submit" class="btn btn-primary btn-lg" id="btn-login">
                            <?php echo app('translator')->getFromJson('app.vote'); ?>
                        </button>
                    </div>
            </form>
        </ol>
    </p>


       
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <style>
        .user.media {
            float: left;
            border: 1px solid #dfdfdf;
            background-color: #fff;
            padding: 15px 20px;
            border-radius: 4px;
            margin-right: 15px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>