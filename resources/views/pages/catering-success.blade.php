@extends('frontend.app')
@section('content')
<div class="thanks-section text-center text-light">
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-12">
            {!! applicationSettings('catering-success-message') !!}
        </div>
      </div>
    </div>
</div>
@endsection