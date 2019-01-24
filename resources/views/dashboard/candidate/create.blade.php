@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Add Candidate</h3>
        </div>

        <div class="col-md-8">
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
                {!! Form::open(['route' => 'candidate-save','method'=>'POST', 'name' => 'myform', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        <input type="hidden" name="length" value="10">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Candidate Name</label>

                            <div class="col-sm-10">
                                {!! Form::text('name', null, array('placeholder' => 'Candidate Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Candidate User Name</label>

                            <div class="col-sm-10">
                                {!! Form::text('username', null, array('placeholder' => 'Candidate User Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password</label>
        
                            <div class="col-sm-10">
                                {!! Form::text('password', null, array('placeholder' => 'password', 'class' => 'form-control')) !!}
                                <input type="button" class="button" value="Generate" onClick="generate();" tabindex="2">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">Mobile No.</label>
        
                            <div class="col-sm-10">
                                {!! Form::tel('phone', null, array('placeholder' => 'Enter Mobile Number', 'pattern' => '^\+?\d{0,13}', 'class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputJoiningdate" class="col-sm-2 control-label">Joining Date</label>
        
                            <div class="col-sm-10">
                                {!! Form::date('joining_date', null, array('placeholder' => 'Joining Date','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="designation" class="col-sm-2 control-label">Designation</label>
        
                            <div class="col-sm-10">
                                {!! Form::text('designation', null, array('placeholder' => 'Enter Designation','class' => 'form-control')) !!}
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <label class="col-sm-2" style="text-align:right">Division</label>
                            <div class="col-sm-10">
                                {!! Form::select('division',$divisions,null,['placeholder' => 'Please Select', 'class' => 'select2 form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2" style="text-align:right">Department</label>
                            <div class="col-sm-10">
                                {!! Form::select('department',$departments,null,['placeholder' => 'Please Select', 'class' => 'select2 form-control']) !!}
                            </div>
                        </div> --}}

                        <input type="hidden" name="emp_state_id" value="1">
                        
                        <input type="hidden" name="is_sendemail" value="1">
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Add</button>
                    </div>
                    <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function randomPassword(length) {
            var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
            var pass = "";
            for (var x = 0; x < length; x++) {
                var i = Math.floor(Math.random() * chars.length);
                pass += chars.charAt(i);
            }
            return pass;
        }

        function generate() {
            myform.password.value = randomPassword(myform.length.value);
        }
    </script>
@endpush