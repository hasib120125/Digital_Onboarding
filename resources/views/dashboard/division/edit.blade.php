@extends('layouts.dashboard')

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <h3>Create Division</h3>
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
                {!! Form::open(['route' => ['division-update', $division->id],'method' => 'PATCH', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="file" class="col-sm-2 control-label">Add File</label>

                            <div class="col-sm-10">
                                {!! Form::file('file', [$division->file_location], array('placeholder' => 'Add File','class' => 'form-control')) !!}
                                <span>{{$division->file_location}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="division" class="col-sm-2 control-label">Division</label>

                            <div class="col-sm-10">
                                {!! Form::select('division',$divisions, ['placeholder' => 'Please Select','class' => 'select2 form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message" class="col-sm-2 control-label">Summery</label>

                            <div class="col-sm-10">
                                {!! Form::textarea('message', $division->message, array('placeholder' => 'Add Message','class' => 'form-control', 'id' => 'summary-ckeditor')) !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Update</button>
                        <a href="{{route('create-division')}}" class="btn btn-info pull-left">Back</a>
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