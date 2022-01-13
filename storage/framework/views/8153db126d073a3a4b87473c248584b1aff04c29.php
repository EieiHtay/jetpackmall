 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.backend','data' => []]); ?>
<?php $component->withName('backend'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Township </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="<?php echo e(route('backside.township.create')); ?>" class="btn btn-outline-primary">
                <i class="icofont-plus icofont-1x"></i>
            </a>
        </ul>            
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <?php if(session('successMsg')!=NULL): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>SUCCESS!</strong> 
                            <?php echo e(session('successMsg')); ?>


                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Price</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=1;

                                ?>

                                <?php $__currentLoopData = $townships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $township): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php 
                                    $id=$township->id;
                                    $name=$township->name;
                                    $price=$township->price;
                                ?>
                                <tr>
                                    <td> <?php echo e($i++); ?>. </td>
                                    <td>
                                        <?php echo e($name); ?>  
                                    </td>
                                    <td><?php echo e($price); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('backside.township.edit',$id)); ?>" class="btn btn-warning">
                                            <i class="icofont-ui-settings icofont-1x"></i>
                                        </a>

                                        
                                        <form action="<?php echo e(route('backside.township.destroy',$id)); ?>" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure want to delete?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button class="btn btn-outline-danger" type="submit">
                                                <i class="icofont-close icofont-1x"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>                     
</main>
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> <?php /**PATH /opt/lampp/htdocs/jetpackmall/resources/views/backend/township/list.blade.php ENDPATH**/ ?>