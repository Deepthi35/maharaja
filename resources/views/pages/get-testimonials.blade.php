<section class="bg-secondary  text-center reviews">
    <div class="container">
        <h2 class="section-title text-center text-dark">Our Customers</h2>
        <div class="reviews-nav-max">
            <div class="reviews-for">
                @if ($testimonials->count() > 0)
                    @foreach ($testimonials as $testimonial)
                        <div class="item">
                            <div class="inner">
                                {!! strip_tags($testimonial->description) !!}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="reviews-nav">
                @if ($testimonials->count() > 0)
                    @foreach ($testimonials as $testimonial)
                        <div class="item">
                            <div class="inner">
                                <figure><img src="{{ asset(TESTIMONIAL_IMAGE_PATH . $testimonial->image) }}"
                                        alt=" Image"></figure>
                                <h3>{{ $testimonial->name }}</h3>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
