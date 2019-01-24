@extends('layouts.dashboard')

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <h3>CEO Message</h3>
        </div>

        <div class="col-md-8">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Horizontal Form</h3>
                </div>
                <!-- /.box-header -->

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
                {!! Form::open(['route' => ['ceo-message-update',$messages->id],'method' => 'PATCH', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                    <div class="box-body">

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">CEO Name</label>

                            <div class="col-sm-10">
                                {!! Form::text('name', $messages->name, array('placeholder' => 'Enter CEO Name','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="photo" class="col-sm-2 control-label">Photo</label>

                            <div class="col-sm-10">
                                {!! Form::file('photo', array('placeholder' => 'Add Files','class' => 'form-control photo-upload')) !!}
                                {!! Form::hidden('is_file_delete', false, ['class' => 'is-photo-delete']) !!}
                                <span class="photo-name">{{$messages->photo}}</span>
                                <button class="photo-delete-button"><i class="fa fa-times"></i></button>
                                <button class="photo-revert-button" style="display:none"><i class="fa fa-undo"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file" class="col-sm-2 control-label">Add Files</label>

                            <div class="col-sm-10">
                                {!! Form::file('file', array('placeholder' => 'Add Files','class' => 'form-control file-upload')) !!}
                                {!! Form::hidden('is_file_delete', false, ['class' => 'is-file-delete']) !!}
                                <span class="file-name">{{$messages->file_location}}</span>
                                <button class="file-delete-button"><i class="fa fa-times"></i></button>
                                <button class="file-revert-button" style="display:none"><i class="fa fa-undo"></i></button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message" class="col-sm-2 control-label">Message</label>

                            <div class="col-sm-10">
                                {!! Form::textarea('message', $messages->message, array('placeholder' => 'Add Message','class' => 'form-control', 'id' => 'summary-ckeditor')) !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Update</button>
                        <a href="{{route('ceo-message')}}" class="btn btn-info pull-left">Back</a>
                    </div>
                    <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@push('scripts')
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
@endpush
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
        $(document).on('change', '.photo-upload', function(){
            $('.photo-delete-button').trigger('click');
        })
        $('.photo-revert-button').click(function(e){
            e.preventDefault();
            $('.is-photo-delete').val(false);
            $('.photo-name').css('text-decoration','none');
            $('.photo-delete-button').show();
            $(this).hide();
        })
        $('.photo-delete-button').click(function(e){
            e.preventDefault();
            $('.is-photo-delete').val(true);
            $('.photo-name').css('text-decoration','line-through');
            $('.photo-revert-button').show();
            $(this).hide();
        })
    </script>
@endpush