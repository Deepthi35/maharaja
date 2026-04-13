<div class="four-items arrows-inside  mb-6">
    @foreach ($productCategories as $prod)
        <div class="item">
            <div class="card card-body justify-content-between bg-dark text-light">
                <img src="{{ asset(PRODUCT_CATEGORY_IMAGE_PATH . $prod->image) }}" alt="Image"
                    class="bg-image opacity-70 ">
                <div class="d-flex justify-content-between mb-3 position-relative">
                    <div class="d-flex">
                        <div class="mr-2">
                            <h2>{!! $prod->name !!}                             
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="d-flex position-relative">
                    <div class="test">
                        <p>{!! \Illuminate\Support\Str::limit(strip_tags($prod->description), 150, '...') !!}
                        </p>
                        <span class="text-small read-more-span">READ MORE</span>
                    </div>
                </div>
                <a class="full-link" href="{{ url('products') }}">&nbsp;</a>
            </div>
        </div>
    @endforeach
</div>
