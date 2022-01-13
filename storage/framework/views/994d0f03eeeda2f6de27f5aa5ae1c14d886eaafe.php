 <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend','data' => []]); ?>
<?php $component->withName('frontend'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Order Received </h1>
  		</div>
	</div>
	<div>
		<a href="<?php echo e(route('index')); ?>" class="btn btn-outline-info ml-auto">
		    		<i class="icofont-double-left"></i>Go Back
		    	</a>
	</div>

<!-- Content -->
	<div class="container my-5">

		<div class="row justify-content-center">
			<div class="col-8">

				<div class="alert alert-success" role="alert">
					<div class="row">
						<div class="col-4">
							<img src="<?php echo e(asset('images/tick.gif')); ?>" width="50%" >
						</div>
						<div class="col-8">
							<h4 class="alert-heading">Your order is complete!</h4>
							<p>Your order will be delivered in 4 days.</p>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
	
	
 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> <?php /**PATH /opt/lampp/htdocs/jetpackmall/resources/views/frontend/ordersuccess.blade.php ENDPATH**/ ?>