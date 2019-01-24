@extends('layouts.dashboard')

@section('content')
    
<div class="row">
    <div class="col-md-12">
        <h3>IT Guideline</h3>
    </div>

    <div class="col-md-8">
        <!-- Horizontal Form -->
        <div class="box box-info">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            <br>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <!-- form start -->    
            {!! Form::open(['route' => ['it-guideline-update', $it_guidelines->id],'method' => 'PATCH', 'class' => 'form-horizontal' , 'enctype' => 'multipart/form-data']) !!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="file" class="col-sm-2 control-label">Add File</label>

                        <div class="col-sm-10">
                            {!! Form::file('file', array('placeholder' => 'Add File','class' => 'form-control file-upload')) !!}
                            {!! Form::hidden('is_file_delete', false, ['class' => 'is-file-delete']) !!}
                            <span class="file-name">{{$it_guidelines->file_location}}</span>
                            <button class="file-delete-button"><i class="fa fa-times"></i></button>
                            <button class="file-revert-button" style="display:none"><i class="fa fa-undo"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">Message</label>

                        <div class="col-sm-10">
                            {!! Form::textarea('message', $it_guidelines->message, array('placeholder' => 'Add Message','class' => 'form-control', 'id' => 'summary-ckeditor')) !!}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Update</button>
                    <a href="{{route('it-guideline')}}" class="btn btn-info pull-left">Back</a>
                </div>
                <!-- /.box-footer -->
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).on('change', '.file-upload', function(){
            $('.file-delete-button').trigger('click');
        })
        $('.file-revert-button').click(function(e){
            e.preventDefault();
            $('.is-file-delete').val(false);
            $('.file-name').css('text-decoration','none');
            $('.file-delete-button').show();
            $(this).hide();
        })
        $('.file-delete-button').click(function(e){
            e.preventDefault();
            $('.is-file-delete').val(true);
            $('.file-name').css('text-decoration','line-through');
            $('.file-revert-button').show();
            $(this).hide();
        })
    </script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
@endpush