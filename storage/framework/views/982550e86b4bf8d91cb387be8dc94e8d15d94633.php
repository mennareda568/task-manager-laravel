<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-10 m-auto">
         <form enctype="multipart/form-data" action="<?php echo e(route('updatepending')); ?>" method="post" >
            <?php echo csrf_field(); ?>
                <input type="hidden" name="old_id" value="<?php echo e($result->id); ?>">

                <label><?php echo e('TITLE'); ?></label>
                <input type="text" name="title" class="form-control mb-4" value="<?php echo e(old('title', $result->title)); ?>">
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                 <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        

                <label><?php echo e('CONTENT'); ?></label>
                <input type="text" name="content" class="form-control mb-4" value="<?php echo e(old('content', $result->content)); ?>">
                <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                 <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <input type="hidden" name="date" value="<?php echo date("D, d M Y h:i A") ?>">         
         
  

                <input type="submit" value='<?php echo e('UPDATE TASK'); ?>' class="form-control btn btn-success">

            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\to do list\resources\views/pending/edit.blade.php ENDPATH**/ ?>