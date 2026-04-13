<section class="map-block bg-dark text-light">
    <div class="container">
        {!! applicationSettings('footer-contact-map-iframe') !!}
        <div class="row get-in-touch">
            <div class="col-md-4">
                <div class="card card-body bg-primary text-light">
                    <div class="inner">
                        {!! applicationSettings('footer-contact-short-description') !!}
                        <ul>
                            <li><span class="material-symbols-outlined">
                                    call
                                </span> <a href="tel:{{ applicationSettings('primary-phone-number') }}"><span>Phone
                                        Number</span>{{ applicationSettings('primary-phone-number') }}</a></li>
                            <li><span class="material-symbols-outlined">
                                    mail
                                </span> <a
                                    href="mailto:{{ applicationSettings('primary-mail') }}"><span>Email</span>{{ applicationSettings('primary-mail') }}</a>
                            </li>
                            <li><span class="material-symbols-outlined">
                                    pace
                                </span> <a href="{{ url('/contact') }}"><span>Opening
                                        Hours</span>{!! applicationSettings('opening-hours') !!}</a></li>
                            <li><span class="material-symbols-outlined">
                                    add_location_alt
                                </span> <a href="{{ url('/contact') }}"><span>Map
                                        Location</span>{!! applicationSettings('map-location') !!}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>