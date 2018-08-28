<?php $__env->startSection('title'); ?>
    Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Edit <?php echo e(" \""); ?><?php echo e($file['name']); ?>.<?php echo e($file['ext']); ?><?php echo e("\""); ?></div>

                    <div class="card-body">

                        <form enctype="multipart/form-data" action="<?php echo e(route('fileEdit')); ?><?php echo e('?fileid='); ?><?php echo e($file['id']); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Filename</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" name="filename" value="<?php echo e($file['name']); ?>">
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-6 text-md-right">
                                    <input type="radio" name="privacy" value=1> Public
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 text-md-right">
                                    <input type="radio" name="privacy" value=0> Private
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 text-md-right">
                                    <input type="submit" value="Update">
                                </div>
                            </div>

                        </form>

                    </div>


                </div>
                <br>
                <div class="card">
                    <div class="card-header"> Delete <?php echo e(" \""); ?><?php echo e($file['name']); ?>.<?php echo e($file['ext']); ?> <?php echo e("\""); ?></div>
                    <div class="card-body">
                    <a class="btn btn-danger" href="<?php echo e(route('fileDelete') . '?fileid='); ?><?php echo e($file['id']); ?>">Delete File</a>
                </div>
            </div>
        </div>

    </div>

    </div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>