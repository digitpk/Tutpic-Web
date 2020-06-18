<?php $__env->startComponent('mail::message'); ?>
# New Chat Session
Please Click Below to join the session
<?php $__env->startComponent('mail::button', ['url' => url($data['url'])]); ?>
join session
<?php echo $__env->renderComponent(); ?>
Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\Abdul Majid\Downloads\Personal\DIGIT\Repositories\Tutpic-Web\resources\views/mail/chat/new.blade.php ENDPATH**/ ?>