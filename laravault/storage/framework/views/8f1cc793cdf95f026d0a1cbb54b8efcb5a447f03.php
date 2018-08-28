<?php $__env->startSection('title'); ?>
    Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



    <div class="container">
        <br>
        <div class="col-lg-12 text-center">

            <div class="row">

                <div class="col-lg-12 text-center">

                    <a class="btn btn-primary" href="<?php echo e(route('fileUploadForm')); ?>">File upload</a>

                    <a class="btn btn-primary" href="<?php echo e(route('folderUploadForm')); ?>">Folder upload</a>

                </div>
            </div>

            <div class="card-body" align="right">
                <label>View public files</label>
                <a class="btn btn-primary" href="<?php echo e(route('publicFiles')); ?>">Shared files</a>
            </div>

            <div class="card-body">

                <div class="row">
                    <table class="table table-striped">
                        <thead class=".thead-dark">
                        <tr>
                            <th>#</th>
                            <th>File name</th>
                            <th>Type</th>
                            <th>Privacy</th>
                            <th>Owner</th>
                            <th>Last modified</th>
                            <th>Downloads</th>
                            <th>Edit/Delete</th>
                            <th>Download</th>
                            <th>Size[Byt]</th>
                        </tr>
                        </thead>


                        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($key + 1); ?></td>

                                <td><?php echo e($file['name']); ?></td>

                                <td><?php echo e($file['ext']); ?></td>

                                <td>
                                    <?php if( $file['public'] == 1): ?>
                                        Public
                                    <?php else: ?>
                                        Private
                                    <?php endif; ?>

                                </td>

                                <td>
                                    <?php if($file['ownerid'] == \Auth::user()->id): ?>
                                        Me
                                    <?php else: ?>
                                        <?php echo e($file['ownerfullname']); ?>

                                    <?php endif; ?>
                                </td>

                                <td align="center"><?php echo e($file['updated_at']); ?></td>

                                <td align="center"><?php echo e($file['downloadcount']); ?></td>


                                <td><a href="<?php echo e(route('fileEditForm') . '?fileid=' . $file['id']); ?>">Edit/Delete</a>

                                <td><a href="<?php echo e(route('fileDownload') . '?fileid='); ?> <?php echo e($file['id']); ?>">Download</a>
                                <td><?php echo e($file['size']); ?></td>
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </table>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>