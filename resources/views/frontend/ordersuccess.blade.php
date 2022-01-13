<x-frontend>
	<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Order Received </h1>
  		</div>
	</div>
	<div>
		<a href="{{route('index')}}" class="btn btn-outline-info ml-auto">
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
							<img src="{{asset('images/tick.gif')}}" width="50%" >
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
	
	
</x-frontend>