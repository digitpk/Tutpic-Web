<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layout.includes.breadcrumb',['page_title'=>'Chat'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="rn-contact-area rn-section-gap bg_color--1">
        <div class="contact-form--1">
            <div class="container">
                <div class="row row--35 align-items-start">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="section-title text-left mb--50">
                            <h3 class="title"></h3>

                        </div>
                        <div class="form-wrapper">
                            <form   action="<?php echo e(url('chat')); ?>" method="post">
                                <br>
                                <?php echo csrf_field(); ?>
                                <label for="question"
                                       class="">Write Question</label>
                                <input type="text" id="question"
                                       class="input"
                                       name="question"
                                       value="<?php echo e(old('question')); ?>"
                                       placeholder="Write Question">
                                <?php if($errors->has('question')): ?>
                                    <span class="help-block" style="color: orangered"> <?php echo e($errors->first('question')); ?></span>
                                <?php endif; ?>
                                <?php $__errorArgs = ['question'];
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


                                <label for="subject"
                                       class="">Select Subject</label>
                                <select class="input" style="margin-bottom: 5%"
                                        name="subject" id="subject">
                                    
                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            <?php echo e(old('subject')==$subject->id ?'selected':''); ?> value="<?php echo e($subject->id); ?>"><?php echo e($subject->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <label style="margin-top: 3%" for="level"
                                       class="">Select Class</label>
                                <select class=" input level" style="margin-top: 3%"
                                        name="level">
                                    
                                    <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            <?php echo e(old('level')==$level->id ?'selected':''); ?> value="<?php echo e($level->id); ?>"><?php echo e($level->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>


                                <button style="margin-top: 5%; !important;" class="rn-button-style--2 btn_solid" type="submit" value="submit" name="submit"
                                        id="mc-embedded-subscribe">Submit
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="thumbnail mb_md--30 mb_sm--30">
                            <img src="<?php echo e(asset('assets/images/about/about-6.jpg')); ?>" alt="trydo"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>


    <script>
        $(document).ready(function() {
            jQuery.noConflict();
            $('.level').select2();
            $('#subject').select2();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Abdul Majid\Downloads\Personal\DIGIT\Repositories\Tutpic-Web\resources\views/chat/create.blade.php ENDPATH**/ ?>