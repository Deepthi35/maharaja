@extends('layouts.app')
@section('content')
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2>Quick Links</h2>
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $sliders }}</h3>
                                        <p >Slider</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="{{ route('sliders.index') }}" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $pages }}</h3>
                                        <p class="text-light">Pages</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="{{ route('cms.index') }}" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ !empty($brands->clienteles) ? $brands->clienteles->count() : null }}</h3>
                                        <p>Brands</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="{{ route('clienteles.index') }}" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ $blogs }}<sup style="font-size: 20px"></sup></h3>
                                        <p>Blog Posts</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="{{ route('blogPosts.index') }}" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-6">
                                <div class="small-box bg-gradient-primary">
                                    <div class="inner">
                                        <h3>{{ $faqs }}</h3>
                                        <p>FAQ's</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="{{ route('faqs.index') }}" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img style="max-width: 300px; display:block; margin:0 auto 30px auto"
                                class="logo-dark logo-default" alt="{{ applicationSettingsAltText('logo') }}"
                                src="{{ asset(APPLICATION_SETTING_IMAGE_PATH . applicationSettings('logo')) }}" />
                        </div>
                        <h2 class="profile-username text-center mb-5">Products</h2>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Categories</b> <a href="{{ route('productCategories.index') }}"
                                    class="float-right">{{ $productCategories }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Products</b> <a href="{{ route('products.index') }}"
                                    class="float-right">{{ $product }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
