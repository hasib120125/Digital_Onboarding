@extends('layouts.dashboard')

@section('content')
@push('styles')
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
                        <h3 class="box-title">Profile List</h3>
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Joining Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($profiles as $profile)
                                <tr>
                                    <td>{{$profile->id}}</td>
                                    <td>{{$profile->name}}</td>
                                    <th>{{$profile->email}}</th>
                                    <th>{{$profile->username}}</th>
                                    <td>{{$profile->joining_date}}</td>
                                    <td><a href="{{route('profile-edit', $profile->id)}}" class="btn btn-info">Edit</a></td>
                                </tr>
                               @endforeach  
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>SI</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Joining Date</th>
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