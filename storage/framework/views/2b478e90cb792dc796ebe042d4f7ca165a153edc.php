<!-- Start Header Area -->
<header class="header-area formobile-menu header--transparent black-logo-version header--sticky">
    <div class="header-wrapper" id="header-wrapper">
        <div class="header-left">
            <div class="logo">
                <a href="<?php echo e(url('/')); ?>">
                    <img class="logo-1" src="<?php echo e(asset('/')); ?>assets/images/logo/logo-light.png" alt="Logo Images">
                    <img class="logo-2" src="<?php echo e(asset('/')); ?>assets/images/logo/logo-all-dark.png" alt="Logo Images">
                </a>
            </div>
        </div>
        <div class="header-right">
            <nav class="mainmenunav d-lg-block navbar-example2">
                <!-- Start Mainmanu Nav -->
                <ul class="mainmenu nav nav-pills">
                    <li class="nav-item"><a class="nav-link smoth-animation active" href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="<?php echo e(url('/')); ?>#service">Service</a>
                    </li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="<?php echo e(url('/')); ?>#about">About</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="<?php echo e(url('/')); ?>#portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="<?php echo e(url('/')); ?>#team">Team</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation"
                                            href="<?php echo e(url('/')); ?>#testimonial">Testimonial</a>
                    </li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="<?php echo e(url('/')); ?>#blog">Blog</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="<?php echo e(url('/')); ?>#contact">Contact</a></li>
                    <?php if(auth()->check()): ?>
                    <li class="nav-item"><a class="nav-link smoth-animation"  href="<?php echo e(url('logout')); ?>">Logout</a></li>
                        <?php else: ?>
                        <li class="nav-item"><a class="nav-link smoth-animation" href="<?php echo e(url('login')); ?>">Login/Register</a></li>
                    <?php endif; ?>

                </ul>
                <!-- End Mainmanu Nav -->
            </nav>

            <!-- Start Humberger Menu  -->
            <div class="humberger-menu d-block d-lg-none pl--20">
                        <span class="menutrigger text-white">
                            <i data-feather="menu"></i>
                        </span>
            </div>
            <!-- End Humberger Menu  -->
            <!-- Start Close Menu  -->
            <div class="close-menu d-block d-lg-none">
                        <span class="closeTrigger">
                            <i data-feather="x"></i>
                        </span>
            </div>
            <!-- End Close Menu  -->
        </div>
    </div>
</header>
<!-- End Header Area -->

<?php /**PATH C:\Users\Abdul Majid\Downloads\Personal\DIGIT\Repositories\Tutpic-Web\resources\views/layout/header.blade.php ENDPATH**/ ?>