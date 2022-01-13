 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend','data' => []]); ?>
<?php $component->withName('frontend'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?php echo e(asset($category->photo)); ?>">
                            <h5><a href="#">
                                <?php echo e($category->name); ?>

                            </a></h5>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Banner Begin -->
    <div class="banner mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="frontend/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="frontend/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
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
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
    
                                <div class="latest-prdouct__slider__item">
                                    <?php $__currentLoopData = $topitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $photos=json_decode($topitem->photo);
                                        $photo=$photos[0];

                                        $top_unitprice=$topitem->price;
                                        $top_discountprice=$topitem->discount;
                                    ?>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?php echo e(asset($photo)); ?>" alt="" style="width:150px; height:150px; object-fit:cover;">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>
                                                    <?php echo e(Str::limit($topitem->name),20); ?>

                                                </h6>
                                                <?php if($top_discountprice): ?>
                                                    <span>
                                                        <?php echo e($top_discountprice); ?> Ks
                                                    </span>
                                                    <del class="text-muted">
                                                        <?php echo e($top_unitprice); ?>Ks
                                                    </del>
                                                <?php else: ?>
                                                    <span>
                                                        <?php echo e($top_unitprice); ?>Ks
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">

                            <div class="latest-prdouct__slider__item">

                                <?php $__currentLoopData = $discountitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $photos=json_decode($discountitem->photo);
                                        $photo=$photos[0];

                                        $discount_unitprice=$discountitem->price;
                                        $discount_discountprice=$discountitem->discount;
                                    ?>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo e(asset($photo)); ?>" alt="" style="width:150px; height:150px; object-fit:cover;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>
                                            <?php echo e(Str::limit($discountitem->name),20); ?>

                                        </h6>
                                        <span>
                                            <?php if($discount_discountprice): ?>
                                                <span>
                                                    <?php echo e($discount_discountprice); ?> Ks
                                                </span>
                                                <del class="text-muted">
                                                    <?php echo e($discount_unitprice); ?>Ks
                                                </del>    
                                            <?php else: ?>
                                                <span>
                                                    <?php echo e($discount_unitprice); ?>Ks
                                                </span>
                                            <?php endif; ?>      
                                        </span>
                                    </div>
                                </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> <?php /**PATH /opt/lampp/htdocs/jetpackmall/resources/views/frontend/index.blade.php ENDPATH**/ ?>