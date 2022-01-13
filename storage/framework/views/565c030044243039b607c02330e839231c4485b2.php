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
                        <h2> <?php echo e($subcategory->name); ?> </h2>
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
                <div class="col-lg-4 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul class="list-group">
                            	<?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <li class="list-group-item <?php echo e(Request::segment(2) ==$subcategory->id ? 'active' :''); ?>">
                                    <a href="<?php echo e(route('subcategory',$subcategory->id)); ?>"> <?php echo e($subcategory->name); ?> </a>
                                </li>


                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </ul>
                        </div>

                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                    	<?php $__currentLoopData = $latestitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    	<?php
                                    	$photos=json_decode($latestitem->photo);
                                    	$photo=$photos[0];

                                    	$latest_unitprice=$latestitem->price;
                                    	$latest_discountprice=$latestitem->discount;
                                    	?>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?php echo e(asset($photo)); ?>" alt="" style="width:150px; height:150px; object-fit:cover;">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>
                                                	<?php echo e(Str::limit($latestitem->name),20); ?>

                                                </h6>
                                                <?php if($latest_discountprice): ?>
                                                    <span>
                                                        <?php echo e($latest_discountprice); ?> Ks
                                                    </span>
                                                    <del class="text-muted">
                                                        <?php echo e($latest_unitprice); ?>Ks
                                                    </del>
                                                <?php else: ?>
                                                    <span>
                                                        <?php echo e($latest_unitprice); ?>Ks
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
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
                                    <h6><span><?php echo e($count_result); ?></span> Products found</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <?php if($subcategoryitems->count() > 0): ?>

                        	<?php $__currentLoopData = $subcategoryitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategoryitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        	<?php
                        		$id=$subcategoryitem->id;
    	                        $codeno=$subcategoryitem->codeno;
    	                        $name=$subcategoryitem->name;

    	                    	$photos=json_decode($subcategoryitem->photo);
    	                    	$photo=$photos[0];

    	                    	$price=$subcategoryitem->price;
    	                    	$discount=$subcategoryitem->discount;
                        	?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="<?php echo e(asset($photo)); ?>">
                                            <ul class="product__item__pic__hover">
                                                <li>
                                                	<a href="<?php echo e(route('detail',$id)); ?>">
                                                		<i class="fa fa-eye"></i>
                                                	</a>
                                            	</li>
                                                
                                                <li>
                                                	<a href="javascript:void(0)" class="addtocartBtn" data-id="<?php echo e($id); ?>" data-name="<?php echo e($name); ?>" data-codeno="<?php echo e($codeno); ?>" data-price="<?php echo e($price); ?>" data-discount="<?php echo e($discount); ?>" data-photo="<?php echo e($photo); ?>">	<i class="fa fa-shopping-cart"></i>
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
        	                                 	
        	                                 		<?php echo e($price); ?>Ks
        	                                 	
        	                                 	</div>
        	                                 	<?php endif; ?> 
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>

                            <div class="col-12">
                                <img src="<?php echo e(asset('no_products_found.png')); ?>" class="img-fluid">
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <?php echo $subcategoryitems->links(); ?>


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
<?php endif; ?> <?php /**PATH /opt/lampp/htdocs/jetpackmall/resources/views/frontend/subcategory.blade.php ENDPATH**/ ?>