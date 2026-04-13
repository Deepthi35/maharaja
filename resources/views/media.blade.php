@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Images</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="clearfix"></div>
        <div class="card media_pages">
            <div class="card-body p-0">
                <div align="center" class="form-search">
                    <form class="form-inline" method="POST" action="{{ url('admin/upload-media') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input multiple="true" name="image[]" type="file">
                        <button type="submit" class="btn btn-primary mb-2 mr-2">Submit</button>
                    </form>
                </div>
                <div class="row">
                    @foreach ($files as $file)
                        <div class="col-md-2">
                            <div class="gallery-block">
                                <a href="{{ url('admin/remove-media/'.$file->getFilename()) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                                <a href="{{ asset('images/media/' . $file->getFilename()) }}" target="_blank"><img  src="{{ asset('images/media/' . $file->getFilename()) }}" class="img-responsive" height="150" /></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
