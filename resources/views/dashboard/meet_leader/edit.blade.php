@extends('layouts.dashboard')

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <h3>Meet The Leader</h3>
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
                {!! Form::open(['route' => ['meet-leader-update',$leader->id],'method' => 'PATCH', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">Add Images</label>

                            <div class="col-sm-10">
                                {!! Form::file('image', array('placeholder' => 'Add Images','class' => 'form-control file-upload')) !!}
                                {!! Form::hidden('is_file_delete', false, ['class' => 'is-file-delete']) !!}
                                    <span class="file-name">{{$leader->picture}}</span>
                                    <button class="file-delete-button"><i class="fa fa-times"></i></button>
                                    <button class="file-revert-button" style="display:none"><i class="fa fa-undo"></i></button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                {!! Form::text('name', $leader->name, array('placeholder' => 'Enter Name','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="designation" class="col-sm-2 control-label">Designation</label>

                            <div class="col-sm-10">
                                {!! Form::text('designation', $leader->designation, array('placeholder' => 'Enter Designation','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="division" class="col-sm-2 control-label">Division</label>

                            <div class="col-sm-10">
                                {!! Form::text('division', $leader->division, array('placeholder' => 'Enter Division','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="department" class="col-sm-2 control-label">Department</label>

                            <div class="col-sm-10">
                                {!! Form::text('department', $leader->department, array('placeholder' => 'Enter Department','class' => 'form-control')) !!}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="short_profile" class="col-sm-2 control-label">Short Profile</label>

                            <div class="col-sm-10">
                                {!! Form::textarea('short_profile', $leader->short_profile, array('placeholder' => 'Add Message','class' => 'form-control', 'id' => 'summary-ckeditor')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="order_by" class="col-sm-2 control-label">Order By</label>

                        <div class="col-sm-10">
                            {!! Form::number('order_by', $leader->order_by, array('placeholder' => 'Order By','class' => 'form-control')) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status</label>

                        <div class="col-sm-4">
                            {!! Form::select('status', ['1' => 'active', '0' => 'decative'], '1', ['placeholder' => 'Select Status','class' => 'form-control']) !!}
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Update</button>
                        <a href="{{route('meet-leader')}}" class="btn btn-info pull-left">Back</a>
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
@endpush