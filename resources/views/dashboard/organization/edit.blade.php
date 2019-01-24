@extends('layouts.dashboard')

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <h3>Organization Structure</h3>
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
                {!! Form::open(['route' => ['org-structure-update',$orgStructures->id], 'method'=>'PATCH', 'class' => 'form-horizontal', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="file" class="col-sm-2 control-label">Add File</label>
    
                                <div class="col-sm-10">
                                    {!! Form::file('file', array('placeholder' => 'Add File','class' => 'form-control file-upload')) !!}
                                    {!! Form::hidden('is_file_delete', false, ['class' => 'is-file-delete']) !!}
                                    <span class="file-name">{{$orgStructures->file_location}}</span>
                                    <button class="file-delete-button"><i class="fa fa-times"></i></button>
                                    <button class="file-revert-button" style="display:none"><i class="fa fa-undo"></i></button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Guideline</label>
    
                                <div class="col-sm-10">
                                    {!! Form::textarea('description', $orgStructures->description, array('placeholder' => 'Guide Line','class' => 'form-control', 'id' => 'summary-ckeditor')) !!}
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">update</button>
                        <a href="{{route('org-structure')}}" class="btn btn-info pull-left">Back</a>
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