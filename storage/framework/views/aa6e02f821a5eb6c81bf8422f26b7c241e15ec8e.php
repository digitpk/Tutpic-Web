<!DOCTYPE html>
<html>
<head>
    
    <?php echo $__env->make('layout.includes.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body class="position-relative spybody" data-spy="scroll" data-target=".navbar-example2" data-offset="150">
<div class="main-page">
<?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="page-wrapper">
        <?php echo $__env->make('layout.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php echo $__env->make('layout.includes.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('js'); ?>

<script>
    function appendChatNotification(m) {
        var new_message = '<li class="bg-l-gray" > <a href="<?php echo e(url('/')); ?>/'+m.url+'?notification_id='+m.id+'">'+m.message+'</a></li>';
        $('#user-notifications').prepend(new_message)
    }
</script>
</body>
</html>
<?php /**PATH C:\Users\Abdul Majid\Downloads\Personal\DIGIT\Repositories\Tutpic-Web\resources\views/layout/master.blade.php ENDPATH**/ ?>