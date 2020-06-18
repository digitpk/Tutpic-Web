<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layout.includes.breadcrumb',['page_title'=>'Login'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="rn-contact-area rn-section-gap bg_color--1">
        <div class="contact-form--1">
            <div class="container">
                <?php if(session('success')): ?>
                    <div class="alert alert-info">
                        <p><?php echo e(session('success')); ?></p>
                    </div>
                    <?php endif; ?>
                <div class="row row--35 align-items-start">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="section-title text-left mb--50">
                            <h2 class="title">Login Here.</h2>
                        </div>
                        <div class="form-wrapper">
                            <form action="<?php echo e(url('/login')); ?>"  method="post">
                                <br>
                                <br>
                                <a style="float: right" href="<?php echo e('register'); ?>">For SignUp</a>
                                <?php echo csrf_field(); ?>
                                <label>
                                    <input type="text" name="email" id="item02" placeholder="Your email *">
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                </label>

                                <label>
                                    <input type="password" name="password" id="item01" placeholder="Your Password *" />
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </label>

                                <button class="rn-button-style--2 btn_solid" type="submit" value="submit" name="submit"
                                        id="mc-embedded-subscribe">Submit
                                </button>
                                <a style="float: right" href="<?php echo e('reset-password'); ?>">Reset Password</a>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="inner  " style="margin-left: 100%">
                                        <ul class="social-share rn-lg-size d-flex justify-content-center liststyle">
                                            <li><a  href="<?php echo e(url('login/facebook')); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a  href="<?php echo e(url('login/google')); ?>"><i class="fab fa-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="thumbnail mb_md--30 mb_sm--30">
                            <img src="assets/images/about/about-6.jpg" alt="trydo"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script >




    </script>



    <?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Abdul Majid\Downloads\Personal\DIGIT\Repositories\Tutpic-Web\resources\views/auth/login.blade.php ENDPATH**/ ?>