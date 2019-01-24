@extends('layouts.dashboard')

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <h3>Checklist Setup</h3>
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
                {!! Form::open(['route' => 'checklist-save','method' => 'POST', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="timeline" class="col-sm-2 control-label">Document Timeline</label>

                            <div class="col-sm-4">
                                {!! Form::select('timeline', ['2' => '1 day', '3' => '14 day', '4' => '30 day', '5' => '90 day'], null, ['placeholder' => 'Select Timeline','class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="document_name" class="col-sm-2 control-label">Document Name</label>

                            <div class="col-sm-10">
                                {!! Form::text('document_name', null, array('placeholder' => 'Checklist Name','class' => 'form-control')) !!}
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
<link rel="stylesheet" href="{{asset('vendor/adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/adminLTE/bower_components/bootstrap/css/bootstrap.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('vendor/adminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{asset('vendor/adminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">
@endpush
    <div class="row">
        <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Checklist</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Timeline</th>
                                    <th>Document Name</th>
                                    <th>Order By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($checklists as $checklist)
                                <tr>
                                    <td>Timeline {{$checklist->emp_state_id}}</td>
                                    <td>{{$checklist->document_name}}</td>
                                    <td>{{$checklist->order_by}}</td>
                                    <td><a href="{{route('checklist-edit',$checklist->id)}}" class="btn btn-info">Edit ||</a>
                                        <form method="POST"  id="delete-form-{{$checklist->id}}" action="{{route('checklist-delete',$checklist->id)}}" style="display:none;">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
                                        </form>
                        
                                        <button onclick="if(confirm('Are You Sure, You Want to Delete This?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$checklist->id}}').submit();
                                        }else{
                                            event.preventDefault();
                                        }" class="btn btn-raised btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Timeline</th>
                                    <th>Document Name</th>
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
<script src="{{asset('vendor/adminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/adminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('vendor/adminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('vendor/adminLTE/bower_components/fastclick/lib/fastclick.js')}}"></script>
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
@endpush
@endsection