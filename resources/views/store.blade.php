@extends('layouts.front')

@section('content')





    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

            @include('partials.sidebar')


                <div id="store" class="col-md-9">

                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                                Sort By:
                                <select class="input-select">
                                    <option value="0">Popular</option>
                                    <option value="1">Position</option>
                                </select>
                            </label>

                            <label>
                                Show:
                                <select class="input-select">
                                    <option value="0">20</option>
                                    <option value="1">50</option>
                                </select>
                            </label>
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store top filter -->

                    @php
                       $cnt = 0
                    @endphp
                    <!-- store products     -->
                    <div class="row">

                        <!--  -->
                    @if(count($products) > 0)


                        @foreach($products as $product)



                            <!-- product -->
                                <div class="col-md-4 col-xs-6">
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ asset('storage/' . $product->img1) }}" alt="">
                                            <div class="product-label">
                                                <span class="sale">-5%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{ $product->category }}</p>
                                            <h3 class="product-name"><a href="{{ route('show-product', $product->id) }}">{{ $product->name }}</a></h3>
                                            <h4 class="product-price">
                                                ${{ number_format($product->price, 2) }}
                                                <del class="product-old-price">${{ number_format($product->price + ((5/100) * $product->price), 2) }}</del>
                                            </h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                {{--                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>--}}
                                                {{--                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>--}}
                                                <a title="quick view" href="{{ route('show-product', $product->id) }}" class="quick-view"><i class="fa fa-eye fa-2x"></i></a>

                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            {!! Form::open(['method'=>'POST', 'action'=>['CartController@rapid_add', $product->id]]) !!}
                                            <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            {!! Form::close() !!}

                                        </div>
                                    </div>
                                </div>
                                <!-- /product -->
                            @php
                            $cnt += 1;
                            @endphp

                                @if($cnt == 3)
                                    <div class="clearfix"></div>

                                    @php
                                        $cnt = 0;
                                    @endphp
                                @endif

                            @endforeach

                        @else

                        <h3 class="text-center">No Record Found</h3>

                        @endif




                    </div>
                    <!-- /store products row-->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix"> </div>
                    <div class="d-flex justify-content-end">{{ $products->render() }}</div>

                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->


            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->





@endsection

