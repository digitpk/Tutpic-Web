














<div class="<?php echo e($message->user_id==auth()->id()?'outgoing_msg':'incoming_msg'); ?>">
    <div class="<?php echo e($message->user_id==auth()->id()?'sent_msg':'received_msg'); ?>">
        <div class="<?php echo e($message->user_id==auth()->id()?'':'received_withd_msg'); ?>">
            <p>
                <?php if($message->description): ?>
                    <?php echo e($message->description); ?>

                <?php endif; ?>
                <?php if($message->image): ?>
                    <a title="click to preview full" target="_blank" href="<?php echo e($message->getImageOriginal()); ?>">
                        <img src="<?php echo e($message->getImageThumbnail()); ?>" alt="">
                    </a>
                <?php endif; ?>
                <?php if($message->video): ?>
                    <video width="320" height="240" controls>
                        <source src="<?php echo e($message->getVideo()); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php endif; ?>
            </p>
            <span class="time_date"><?php echo e(date('d-m-y H:i', strtotime($message->created_at))); ?></span>
        </div>
    </div>
</div>




















<?php /**PATH C:\Users\Abdul Majid\Downloads\Personal\DIGIT\Repositories\Tutpic-Web\resources\views/chat/partials/message.blade.php ENDPATH**/ ?>