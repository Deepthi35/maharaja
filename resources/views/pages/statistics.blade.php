<section class="our-statistics"><div class="container">
<div class="row justify-content-center statistics text-center">
    @foreach (getStats() as $stat)
        <div class="col-6 mb-3 col-lg-3 mb-lg-0 block">
            {{-- {{ $stat->prefix }} --}}
            <span class="display-4 text-primary d-block" data-countup data-start="4567"
                data-end="{{ $stat->number }}" data-suffix="{!! $stat->suffix !!}" data-prefix="{!! $stat->prefix !!}" data-duration="3" data-grouping="false"> </span>
            {{-- {{ $stat->suffix }} --}}
            <span class="h6">{{ $stat->title }}</span>
        </div>
    @endforeach
</div>
</div></section>