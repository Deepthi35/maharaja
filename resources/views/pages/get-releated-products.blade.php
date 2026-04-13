@foreach ($relatedProducts as $product)
                    <div class="item">
                        <div class="card">
                            <div class="card-body align-items-start">
                                <figure><img src="{{ asset(PRODUCT_IMAGE_PATH . $product->image) }}"
                                        alt="{{ $product->title }}" class="card-img-top"></figure>
                                <h5 class="mb-3 ">
                                    {{ $product->title }}
                                </h5>
                                <span class="btn btn-secondary">View Product</span>
                                <a class="full-link" href="{{ url('products-detail/' . $product->slug) }}">&nbsp;</a>
                            </div>
                        </div>
                    </div>
                @endforeach