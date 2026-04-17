<div class="form-group col-sm-4">
    <label>{{ $field_label }}</label>

    <div class="input-group image_input">
        <div class="custom-file">
            {!! Form::file($field_name, [
                'class' => 'custom-file-input',
                'onchange' => 'readURL(this, "image_preview' . $field_name . '")',
            ]) !!}
            {!! Form::label($field_name, $field_label, ['class' => 'custom-file-label']) !!}
        </div>
    </div>
    <div id="image_preview{{ $field_name }}">
        @if (!empty($data))
            <img src="{{ asset($path . $data) }}" alt="" height="50">
            <div>
                <a class="btn btn-danger btn-xs"
                onclick="event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                var id = '{{$field_name}}';
                
                window.location.href = '/admin/removesettingsiamge/' + id ;
            }
                });">
                <i class="fa fa-trash"></i>
            </a>
            </div>
        @endif
    </div>
</div>