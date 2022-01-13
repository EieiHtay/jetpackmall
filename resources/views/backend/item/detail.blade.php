<x-backend>
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

    
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i> Item Detail </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <a href="{{ route('backside.item.index') }}" class="btn btn-outline-primary">
                    <i class="icofont-double-left icofont-1x"></i>
                </a>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">

                        <!-- Breadcrumb Section Begin -->
                        <section class="breadcrumb-section set-bg subtitle text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
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
                                                src="{{asset($photo)}}" alt="" width="300px" height="300px">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="product__details__text">
                                            <div class="row">
                                                <div class="col-4">
                                                    <h5><b>Name: </b></h5>
                                                </div>
                                                <div class="col-8">
                                                    <h5>{{Str::limit($name),20}}</h5>
                                                </div>
                                            </div>
                                            
                                            <div class="product__details__rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                            @if($discount)
                                            <div class="product__item__price">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h5><b>Price: </b></h5>
                                                    </div>
                                                    <div class="col-4">
                                                        <h5>
                                                            {{$discount}} Ks<br>
                                                            <del class="text-muted">
                                                                {{$price}}Ks
                                                            </del> 
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>   
                                            @else
                                            <div class="product__item__price">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h5><b>Price: </b></h5>
                                                    </div>
                                                    <div class="col-4">
                                                        <h5>
                                                            {{$price}}Ks 
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif 
                                            <div class="product__item__description">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h5><b>Description: </b></h5>
                                                    </div>
                                                    <div class="col-4">
                                                        <h5>
                                                            {!!$description!!} 
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product__item__brandname">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h5><b>Brand: </b></h5>
                                                    </div>
                                                    <div class="col-4">
                                                        <h5>
                                                            {{$brandname}} 
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                                            {{-- <ul type="none">
                                                
                                                <li><b>Share on</b>
                                                    <div class="share">
                                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                                    </div>
                                                </li>
                                            </ul> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Product Details Section End -->

                    </div>
                </div>
            </div>
        </div>
    </main>
</x-backend>