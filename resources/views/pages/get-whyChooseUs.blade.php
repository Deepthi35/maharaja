@foreach ($whyChooseUs->clienteles as $choose)
<div class="col-md-3">
    <div class="icon-round bg-dark mx-auto mb-4">
        <img src="{{ asset(CLIENTELE_IMAGE_PATH . $choose->image) }}"
            alt="{{ $choose->image_alt_text }}">
    </div>
    <h4 class="h1">{{ $choose->title }}</h4>
    <p class="lead mx-xl-3">{!! $choose->sub_title !!}</p>
</div>
@endforeach