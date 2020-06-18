<header id="main-header" data-height-onload="66">
    <div class="container clearfix et_menu_container">
        <div class="title_container">
            <h1>
                <a href="<?php echo e(url('/')); ?>" title="Divi Builder Layout Pack">
                    TutPic </a>
            </h1>
        </div>
        <div id="et-top-navigation" data-height="66" data-fixed-height="40">
            <nav id="top-menu-nav">
                <ul id="top-menu" class="nav">
                    <li id="menu-item-230210"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-230210"><a
                            href="<?php echo e(url('how-its-works')); ?>">How It Works</a></li>
                    <li id="menu-item-230218"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-230218"><a
                            href="<?php echo e(url('service')); ?>">Service</a></li>
                    <li id="menu-item-230216"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-230216"><a
                            href="<?php echo e(url('about')); ?>">About</a></li>
                    <li id="menu-item-230212"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-230212">
                        <a
                            href="<?php echo e(url('contact')); ?>">Contact</a>
                    </li>
                    <?php if(auth()->check()): ?>
                        <li id="menu-item-230212"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-230212">
                            <a
                                href="<?php echo e(url('account')); ?>">Account</a>
                        </li>
                    <?php else: ?>
                    <li id="menu-item-230212"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-230212">
                        <a
                            href="<?php echo e(url('login')); ?>">Login</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <div id="et_mobile_nav_menu">
                <div class="mobile_nav closed">
                    <span class="select_page">Menu</span>
                    <span class="mobile_menu_bar mobile_menu_bar_toggle"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="et_search_outer">
        <div class="container et_search_form_container">
            <form role="search" method="get" class="et-search-form" action="https://www.elegantthemes.com/layouts/">
                <input type="search" class="et-search-field" placeholder="Search &hellip;" value="" name="s"
                       title="Search for:"/></form>
            <span class="et_close_search_field"></span>
        </div>
    </div>
</header>
<?php /**PATH C:\Users\Abdul Majid\Downloads\Personal\DIGIT\Repositories\Tutpic-Web\resources\views/layout/navbar.blade.php ENDPATH**/ ?>