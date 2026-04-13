@php
        $brands = getClienteleCategory('ourclients');
    @endphp
    @if ($brands)
        <section class="sg-clients">
            <div class="container">
            <div class="our-brands">
                @foreach ($brands->activeClienteles as $clientele)
                    <div class="item">
                        <div class="inner">
                            <a href="#">
                                <img src="{{ asset(CLIENTELE_IMAGE_PATH . $clientele->image) }}"
                                    alt="{{ $clientele->image_alt_text }}">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </section>
    @endif