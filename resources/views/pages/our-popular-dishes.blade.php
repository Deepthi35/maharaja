@php
    $popularDishes = getClienteleCategory('our-popular-dishes');
@endphp
@if ($popularDishes)
    <section class="bg-secondary our-popular-dishes">
        <div class="container my-3">
            <h2 class="section-title text-light text-center  mb-5">
                {{ $popularDishes->name }}
             
            </h2>
            <div class="nine-column mt-5">
                <div class="item">
                    <div class="nine-column-slider  dishes-items">
                        @foreach ($popularDishes->activeClienteles as $popularDish)
                            <div class="product-block">
                                <div class="row align-items-center special-products-inner mx-3">
                                    <div class="col-md-6 pic">
                                        <figure>
                                            <img src="{{ asset(CLIENTELE_IMAGE_PATH . $popularDish->image) }}"
                                                alt="{{ $popularDish->image_alt_text }}">
                                        </figure>
                                    </div>
                                    <div class="col-md-6 content text-light">
                                        <div class="special-products-content bg-primary">
                                            <h4>{{ $popularDish->title }}<span>{{ $popularDish->url }}</span> <em class="clear">&nbsp;</em></h4>
                                            <p> {{ $popularDish->sub_title }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
