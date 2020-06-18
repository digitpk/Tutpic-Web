<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layout.includes.breadcrumb',['page_title'=>'Session'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="">

        <?php if(auth()->user()->isStudent()): ?>
            <div class="row" style="margin: 10px 0px;">
                <div class="container">
                    <a class="btn btn-success" style="background-color: #f9004d;color: burlywood;" href="<?php echo e(url('chat/create')); ?>">New Session</a>
                </div>
            </div>
        <?php endif; ?>

        <div class="container" style="margin-top: 10px">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Question</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($record->firstMessage->description); ?></td>
                        <td><?php if($record->is_active): ?> Active <?php else: ?> Closed  <?php endif; ?></td>
                        <td><?php echo e(date('d-m-Y',strtotime($record->created_at))); ?></td>
                        <td>
                            <a href="<?php echo e($url.'/'.base64_encode($record->id)); ?>" class="btn btn-info">View</a>
                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4">You have no session
                            <?php if(auth()->user()->isStudent()): ?>
                                <a href="<?php echo e($url.'/create'); ?>" class="btn text-primary"><b>Start Session</b></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>

                </tbody>

            </table>
            <div class="row">
                <div class="h-100 row align-items-center">            <?php echo e($records->links()); ?>

                </div>

            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>

    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Abdul Majid\Downloads\Personal\DIGIT\Repositories\Tutpic-Web\resources\views/chat/index.blade.php ENDPATH**/ ?>