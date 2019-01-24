@extends('layouts.dashboard')

@section('content')
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
                    <h3 class="box-title">Candidate List</h3>
                </div>
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Name</th>
                                <th>Joining Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($candidateList as $list)
                            <tr>
                                <td>{{$list->name}}</td>
                                <td>{{$list->email}}</td>
                                <td>{{$list->username}}</td>
                                <td>{{$list->joining_date}}</td>
                                <td><a href="{{route('send-mail',$list->id)}}" class="btn btn-primary inputButton" name="sendNewSms" value=" Send ">Send Mail</a> <input type="checkbox" class="checkme" {{$list->is_send_email == 1 ? 'checked':''}}> || <a href="{{route('candidate-edit',$list->id)}}"><button class="btn btn-primary">Edit </button>||</a>
                                    <form method="POST"  id="delete-form-{{$list->id}}" action="{{route('candidate-delete',$list->id)}}" style="display:none;">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                    </form>
                    
                                    <button onclick="if(confirm('Are You Sure, You Want to Delete This?')){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{$list->id}}').submit();
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Name</th>
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

    <script>
        debugger
        $(".checkme:checked").each(function(){
            $(this).siblings('.inputButton').first().attr('disabled', 'disabled');
        })
        
        $(".checkme").change(function(e){
            if($(this).is(":checked")){
                $(this).siblings('.inputButton').first().attr('disabled', 'disabled');
            }else{
                $(this).siblings('.inputButton').first().removeAttr('disabled');
            }
        })
        $(".inputButton").click(function(e){
            if($(this).attr('disabled')){
                e.preventDefault()
            }
        })
    </script>
@endpush
@endsection