<x-frontend>
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
                                    <h6><span>{{$promotionitems->count()}}</span> Products found</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	@foreach($promotionitems as $promotionitem)

                    	@php
                    		$id=$promotionitem->id;
	                        $codeno=$promotionitem->codeno;
	                        $name=$promotionitem->name;

	                    	$photos=json_decode($promotionitem->photo);
	                    	$photo=$photos[0];

	                    	$price=$promotionitem->price;
	                    	$discount=$promotionitem->discount;
                    	@endphp
	                        <div class="col-lg-4 col-md-6 col-sm-6">
	                            <div class="product__item">
	                                <div class="product__item__pic set-bg" data-setbg="{{$photo}}">
	                                    <ul class="product__item__pic__hover">
	                                        <li><a href="{{route('detail',$id)}}"><i class="fa fa-eye"></i></a></li>
	                                        
	                                        <li>
	                                        	<a href="javascript:void(0)" class="addtocartBtn" data-id="{{$id}}" data-name="{{$name}}" data-codeno="{{$codeno}}" data-price="{{$price}}" data-discount="{{$discount}}" data-photo="{{$photo}}">
	                                        		<i class="fa fa-shopping-cart"></i>
	                                        	</a>
	                                        </li>
	                                    </ul>
	                                </div>
	                                <div class="product__discount__item__text">
	                                    <h5><a href="#">
	                                    	{{Str::limit($name),20}}
	                                    </a></h5>
	                                    @if($discount)
	                                    <div class="product__item__price">
	                                    	
	                                    		{{$discount}} Ks
	                                    	
	                                    	<span>
	                                    		{{$price}}Ks
	                                    	</span> 
	                                    </div>	 
	                                 	@else
	                                 	<div class="product__item__price">
	                                 	<span>
	                                 		{{$price}}Ks
	                                 	</span>
	                                 	</div>
	                                 	@endif 
	                                 		 
	                                </div>
	                            </div>
	                        </div>
                        @endforeach
                    </div>
                    {!! $promotionitems->links() !!}
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
</x-frontend>