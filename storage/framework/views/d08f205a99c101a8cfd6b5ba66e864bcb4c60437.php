 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend','data' => []]); ?>
<?php $component->withName('frontend'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
	<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg subtitle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2> Promotion </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0"> A - Z </option>
                                        <option value="0"> Z - A </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span><?php echo e($promotionitems->count()); ?></span> Products found</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	<?php $__currentLoopData = $promotionitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotionitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    	<?php
                    		$id=$promotionitem->id;
	                        $codeno=$promotionitem->codeno;
	                        $name=$promotionitem->name;

	                    	$photos=json_decode($promotionitem->photo);
	                    	$photo=$photos[0];

	                    	$price=$promotionitem->price;
	                    	$discount=$promotionitem->discount;
                    	?>
	                        <div class="col-lg-4 col-md-6 col-sm-6">
	                            <div class="product__item">
	                                <div class="product__item__pic set-bg" data-setbg="<?php echo e($photo); ?>">
	                                    <ul class="product__item__pic__hover">
	                                        <li><a href="<?php echo e(route('detail',$id)); ?>"><i class="fa fa-eye"></i></a></li>
	                                        
	                                        <li>
	                                        	<a href="javascript:void(0)" class="addtocartBtn" data-id="<?php echo e($id); ?>" data-name="<?php echo e($name); ?>" data-codeno="<?php echo e($codeno); ?>" data-price="<?php echo e($price); ?>" data-discount="<?php echo e($discount); ?>" data-photo="<?php echo e($photo); ?>">
	                                        		<i class="fa fa-shopping-cart"></i>
	                                        	</a>
	                                        </li>
	                                    </ul>
	                                </div>
	                                <div class="product__discount__item__text">
	                                    <h5><a href="#">
	                                    	<?php echo e(Str::limit($name),20); ?>

	                                    </a></h5>
	                                    <?php if($discount): ?>
	                                    <div class="product__item__price">
	                                    	
	                                    		<?php echo e($discount); ?> Ks
	                                    	
	                                    	<span>
	                                    		<?php echo e($price); ?>Ks
	                                    	</span> 
	                                    </div>	 
	                                 	<?php else: ?>
	                                 	<div class="product__item__price">
	                                 	<span>
	                                 		<?php echo e($price); ?>Ks
	                                 	</span>
	                                 	</div>
	                                 	<?php endif; ?> 
	                                 		 
	                                </div>
	                            </div>
	                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php echo $promotionitems->links(); ?>

                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> <?php /**PATH /opt/lampp/htdocs/jetpackmall/resources/views/frontend/promotion.blade.php ENDPATH**/ ?>