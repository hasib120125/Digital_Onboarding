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
                {!! Form::open(['route' => 'org-structure-save','method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="file" class="col-sm-2 control-label">Add Files</label>
    
                                <div class="col-sm-10">
                                    {!! Form::file('file', null, array('placeholder' => 'Add Files','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Guideline</label>
    
                                <div class="col-sm-8">
                                    {!! Form::textarea('description', null, array('placeholder' => 'Add Guideline','class' => 'form-control', 'id' => 'summary-ckeditor')) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-sm-2 control-label">Status</label>

                                <div class="col-sm-4">
                                    {!! Form::select('status', ['1' => 'active', '0' => 'decative'], '1', ['placeholder' => 'Select Status','class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        
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
                        <h3 class="box-title">Organization List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Guideline</th>
                                    <th>File Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($orgStructures as $orgStructure)
                               <tr>
                                    <td>{{$orgStructure->id}}</td>
                                    <td>{!! htmlspecialchars_decode($orgStructure->description) !!}</td>
                                    <td>{{$orgStructure->file_type}}</td>
                                    <td><a href="{{route('org-structure-edit', $orgStructure->id)}}" class="btn btn-info">Edit</a></td>
                                </tr>
                               @endforeach 
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>SI</th>
                                    <th>Guideline</th>
                                    <th>File Type</th>
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