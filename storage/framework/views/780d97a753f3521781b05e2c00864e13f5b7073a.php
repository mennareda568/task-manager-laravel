<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 m-auto ">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <?php echo e(' TASKS'); ?>

                            <div>
                                <a href="<?php echo e(route('finishall')); ?>" class="btn btn-success">Complete All Tasks</a>
                                <a href="<?php echo e(route('delete-selected')); ?>" class="btn btn-danger">Delete All Tasks</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <?php if(session('message')): ?>
                            <h4 class="alert alert-success mt-2"><?php echo e(session('message')); ?></h4>
                        <?php endif; ?>
                        <table class="table table-dark ">
                            <thead>
                                <tr>
                                    <td><?php echo e('TITLE'); ?></td>
                                    <td><?php echo e('CONTENT'); ?></td>
                                    <td><?php echo e('LAST EDIT'); ?></td>
                                    <td><?php echo e('ACTION'); ?></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->title); ?></td>

                                        <?php
                                            $description = $item->content;
                                            $words = explode(' ', $description);
                                            $short_description = implode(' ', array_slice($words, 0, 4));
                                        ?>

                                        <?php if(count($words) > 4): ?>
                                            <td><span class="short-description"><?php echo e($short_description); ?></span>
                                                <a href="#" class="see-more">See more</a>
                                                <div class="full-description" style="display: none;"><?php echo e($description); ?>

                                                </div>
                                            </td>
                                        <?php else: ?>
                                            <td><?php echo e($description); ?></td>
                                        <?php endif; ?>
                                        <td><?php echo e($item->date); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('editpending', $item->id)); ?>" class="btn btn-primary"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="<?php echo e(route('finishtask', $item->id)); ?>" class="btn btn-warning"><i
                                                    class="fa-solid fa-check"></i></a>
                                            <a href="<?php echo e(route('deletepending', $item->id)); ?>" class="btn btn-danger"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php echo e($result->links()); ?> <!-- Display pagination links -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\to do list\resources\views/pending.blade.php ENDPATH**/ ?>