@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Add Candidate</h3>
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
                {!! Form::open(['route' => ['candidate-update',$candidate->id], 'method'=>'PATCH', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Candidate Name</label>

                            <div class="col-sm-10">
                                {{-- {!! Form::text('name', null, array('placeholder' => 'Candidate Name', 'value' => '$candidate->name', 'class' => 'form-control')) !!} --}}
                                <input type="text" class="form-control" name="name" value="{{$candidate->name}}" placeholder="Candidate Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Candidate User Name</label>

                            <div class="col-sm-10">
                                {{-- {!! Form::text('name', null, array('placeholder' => 'Candidate Name', 'value' => '$candidate->name', 'class' => 'form-control')) !!} --}}
                                <input type="text" class="form-control" name="username" value="{{$candidate->username}}" placeholder="Candidate Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" value="{{$candidate->email}}" placeholder="Candidate Email">
                                {{-- {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!} --}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password</label>
        
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" placeholder="Candidate password">
                                {{-- {!! Form::password('password', null, array('placeholder' => 'password','class' => 'form-control')) !!} --}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">Mobile No.</label>
        
                            <div class="col-sm-10">
                                {!! Form::number('phone', $candidate->phone, array('placeholder' => 'Enter Mobile Number','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputJoiningdate" class="col-sm-2 control-label">Joining Date</label>
        
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="joining_date" value="{{$candidate->joining_date}}" placeholder="Joining Date">
                                {{-- {!! Form::date('joining_date', null, array('placeholder' => 'Joining Date','class' => 'form-control')) !!} --}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="designation" class="col-sm-2 control-label">Designation</label>
        
                            <div class="col-sm-10">
                                {!! Form::text('designation', $candidate->designation, array('placeholder' => 'Enter Designation','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <input type="hidden" name="emp_state_id" value="{{$candidate->emp_state_id}}">
                        
                        <input type="hidden" name="is_sendemail" value="{{$candidate->is_send_email}}">
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Update</button>
                        <a href="{{route('candidate-list')}}" class="btn btn-info pull-left">Back</a>
                    </div>
                    <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection