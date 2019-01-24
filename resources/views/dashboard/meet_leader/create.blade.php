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
                {!! Form::open(['route' => 'meet-leader-save','method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">Add Images</label>
                            
                            <div class="col-sm-10">
                                {!! Form::file('image', null, array('placeholder' => 'Add Images','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                {!! Form::text('name', null, array('placeholder' => 'Enter Name','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="designation" class="col-sm-2 control-label">Designation</label>

                            <div class="col-sm-10">
                                {!! Form::text('designation', null, array('placeholder' => 'Enter Designation','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="division" class="col-sm-2 control-label">Division</label>

                            <div class="col-sm-10">
                                {!! Form::text('division', null, array('placeholder' => 'Enter Division','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="department" class="col-sm-2 control-label">Department</label>

                            <div class="col-sm-10">
                                {!! Form::text('department', null, array('placeholder' => 'Enter Department','class' => 'form-control')) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="short_profile" class="col-sm-2 control-label">Short Profile</label>

                            <div class="col-sm-10">
                                {!! Form::textarea('short_profile', null, array('placeholder' => 'Add Message','class' => 'form-control', 'id' => 'summary-ckeditor')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="order_by" class="col-sm-2 control-label">Order By</label>

                            <div class="col-sm-10">
                                {!! Form::number('order_by', null, array('placeholder' => 'Order By','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <input type="hidden" name="status" value="1">
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
@push('styles')
<link rel="stylesheet" href="{{asset('adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('adminLTE/bower_components/bootstrap/css/bootstrap.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('adminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{asset('adminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">
@endpush
    <div class="row">
        <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Meet The Leader List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Name</th>
                                    <th>Short Profile</th>
                                    <th>Order By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaders as $leader)
                                    <tr>
                                        <td>{{$leader->id}}</td>
                                        <td>{{$leader->name}}</td>
                                        <td>{!! htmlspecialchars_decode($leader->short_profile) !!}</td>
                                        <td>{{$leader->order_by}}</td>
                                        <td><a href="{{route('meet-leader-edit', $leader->id)}}" class="btn btn-info">Edit</a></td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>SI</th>
                                    <th>Name</th>
                                    <th>Short Profile</th>
                                    <th>Order By</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
        </div>
    </div>            
@push('scripts')
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
            })
        })
    </script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
@endpush
@endsection