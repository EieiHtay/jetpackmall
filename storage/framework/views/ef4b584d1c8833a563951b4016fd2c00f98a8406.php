 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend','data' => []]); ?>
<?php $component->withName('frontend'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>

    <?php if(Auth::check()): ?>
        <?php
            $deliveryTownship = Auth::user()->township->name;
            $deliveryPrice = Auth::user()->township->price;
        ?>
    <?php endif; ?>

	 <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo e(asset('frontend/img/breadcrumb.jpg')); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="<?php echo e(route('index')); ?>">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row shoppingcart_div">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="shoppingcart_table">

                                
                                
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
            <div class="row shoppingcart_div">
                <div class="col-lg-6">
                    <div class="shoping__cart__btns">
                        <textarea placeholder="Note" id="notes" class="form-control mb-5" rows="4" cols="50"></textarea>
                        <a href="<?php echo e(route('index')); ?>" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="shoping__checkout mt-1">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span class="shoppingcartTotal"></span></li>
                             
                             <?php if(Auth::check()): ?>
                            <li> Delivery <small> ( <?php echo e($deliveryTownship); ?> ) </small> 
                                <span> <?php echo e(number_format($deliveryPrice)); ?> Ks </span>
                            </li>
                            <?php endif; ?>

                            <li>Total <span class="totality"></span></li>
                        </ul>
                        <?php if(Auth::check()): ?>
                            <a href="javascript:void(0)" class="primary-btn checkoutBtn">PROCEED TO CHECKOUT</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="primary-btn">PROCEED TO CHECKOUT</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="container noneshoppingcart_div">
            <div class="row">
                <div class="col-12 text-center">
                    <img src="<?php echo e(asset('images/no-shopping-cart.png')); ?>" class="img-fluid d-inline-block" style="width: 80px; height: 80px; object-fit: cover;">
                    <h3 class="d-inline-block mx-2"> There are no items in this cart </h3>
                </div>
                <div class="col-12 text-center mt-3">
                    <a href="<?php echo e(route('index')); ?>" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> <?php /**PATH /opt/lampp/htdocs/jetpackmall/resources/views/frontend/cart.blade.php ENDPATH**/ ?>