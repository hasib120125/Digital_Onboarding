@extends('layouts.dashboard')

@section('content')
    
    <div class="row">

        <div class="col-md-8">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Profile Edit</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start --> 
                
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
                {!! Form::open(['route' => ['profile-update',$profiles->id],'method' => 'PATCH', 'class' => 'form-horizontal']) !!}          
        
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">AD Username</label>

                            <div class="col-sm-10">
                                {!! Form::text('username', $profiles->username, ['placeholder' => 'Enter AD Username', 'class' => 'form-control'])!!}
                            </div>
                        </div>

                        {!! Form::hidden('password') !!}

                        <div class="form-group">
                            <label for="designation" class="col-sm-2 control-label">Designation</label>

                            <div class="col-sm-10">
                                {!! Form::text('designation', null, ['placeholder' => 'Enter Designation', 'class' => 'form-control'])!!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="department" class="col-sm-2 control-label">Department</label>

                            <div class="col-sm-10">
                                {!! Form::select('department',$department, null, ['placeholder' => 'Please Select', 'class' => 'select2 form-control'])!!}
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="division" class="col-sm-2 control-label">Division</label>

                            <div class="col-sm-10">
                                {!! Form::select('division',$division, null, ['placeholder' => 'Please Select','class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="is_join" class="col-sm-2 control-label">Is Join</label>

                            <div class="col-sm-4">
                                {!! Form::select('is_join', ['2' => 'yes', '1' => 'No'], '2', ['placeholder' => 'Select Status','class' => 'form-control']) !!}
                            </div>
                        </div>
                        
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">update</button>
                        <a href="{{route('profile')}}" class="btn btn-info pull-left">Back</a>
                    </div>
                    <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection