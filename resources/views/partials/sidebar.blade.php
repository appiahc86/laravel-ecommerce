<!-- ASIDE -->
<div id="aside" class="col-md-3">


    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Categories</h3>
        <div class="checkbox-filter" style="max-height: 300px; overflow: auto;">

            @php

                $categs = \App\Category::all()

            @endphp

            @if(count($categs) > 0)

                @foreach($categs as $catt)

                    @php
                       $num = \App\Product::where('category', $catt->name)->get();
                    @endphp

                    <div class="input-checkbox">
{{--                        <input type="checkbox" class="check">--}}
                        <i class="fa fa-circle text-primary"></i>&nbsp;

                            <span></span>
                            <a href=" {{ route('search.cat', $catt->name) }}">
                                {{ $catt->name }}
                            <small>({{ count($num) }})</small>
                            </a>

                    </div>

                @endforeach

            @endif


        </div>
    </div>
    <!-- /aside Widget -->










    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">New Products</h3>

                       {{--   Getting New Products     --}}
        @php

             $new_products = \App\Product::orderBy('id', 'desc')->skip(0)->take(5)->get();
        @endphp


        @foreach($new_products as $prod)


            <div class="product-widget">
                <div class="product-img">
                    <img src="{{ asset('storage/'.$prod->img1) }}" alt="">
                </div>
                <div class="product-body">
                    <p class="product-category">{{ $prod->category }}</p>
                    <h3 class="product-name"><a href="#">{{ $prod->name }}</a></h3>
                    <h4 class="product-price">
                        ${{ number_format($prod->price, 2) }}
                        <del class="product-old-price">${{ number_format($prod->price + ((5 / 100) * $prod->price ), 2) }}</del>
                    </h4>
                </div>
            </div>


        @endforeach



    </div>
    <!-- /aside Widget -->
</div>
<!-- /ASIDE -->
