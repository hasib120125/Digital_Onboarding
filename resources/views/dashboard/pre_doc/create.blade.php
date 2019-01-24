@extends('layouts.dashboard')

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <h3>Add Pre Joining Document checkList</h3>
        </div>

        <div class="col-md-8">
            <!-- Horizontal Form -->
            <div class="box box-info">
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
                {!! Form::open(['route' => 'pre-doc-save','method' => 'POST', 'class' => 'form-horizontal']) !!}
                    <input type="hidden" name="emp_state_id" value="1">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="document_name" class="col-sm-2 control-label">checkList Name</label>

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
                        <h3 class="box-title">Document List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Checklist Name</th>
                                    <th>Order By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @php ($sl = 1)
                               @foreach ($preDocs as $preDoc)
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td>{{$preDoc->document_name}}</td>
                                    <td>{{$preDoc->order_by}}</td>
                                    <td><a href="{{route('pre-doc-edit',$preDoc->id)}}" class="btn btn-info">Edit ||</a>
                                        <form method="POST"  id="delete-form-{{$preDoc->id}}" action="{{route('pre-doc-delete',$preDoc->id)}}" style="display:none;">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
                                        </form>
                        
                                        <button onclick="if(confirm('Are You Sure, You Want to Delete This?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$preDoc->id}}').submit();
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
                                    <th>SI</th>
                                    <th>Checklist Name</th>
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
@endpush
@endsection