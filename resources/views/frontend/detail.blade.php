<x-frontend>
	@php
	$id=$itemdetails->id;
	$codeno=$itemdetails->codeno;
	$name=$itemdetails->name;

	$photos=json_decode($itemdetails->photo);
	$photo=$photos[0];

	$price=$itemdetails->price;
	$discount=$itemdetails->discount;
	$description=$itemdetails->description;
	$brandname=$itemdetails->brand->name;
	@endphp

	<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg subtitle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2> {{$codeno}} </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{asset($photo)}}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach($photos as $img)
                                <img data-imgbigurl="frontend/img/product/details/product-details-2.jpg" src="{{asset($img)}}" alt="">
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{Str::limit($name),20}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        @if($discount)
                        <div class="product__item__price">
                        	<span>
                        	{{$discount}} Ks
                        	</span><br>
                        	<del class="text-muted">
                        		{{$price}}Ks
                        	</del> 
                        </div>	 
                        @else
                        <div class="product__item__price">
                        	<span>
                        		{{$price}}Ks
                        	</span>
                        </div>
                        @endif 
                       	<p>{!!$description!!}</p>
                        <a href="javascript:void(0)" class="primary-btn addtocartBtn" data-id="{{$id}}" data-name="{{$name}}" data-codeno="{{$codeno}}" data-price="{{$price}}" data-discount="{{$discount}}" data-photo="{{$photo}}">ADD TO CARD</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Brand</b> <span> {{$brandname}} </span></li>
                            
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
</x-frontend>