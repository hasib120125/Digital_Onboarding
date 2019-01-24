@extends('layouts.dashboard')

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <h3>Create FAQ</h3>
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
                {!! Form::open(['route' => 'faq-save','method' => 'POST', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Question</label>

                            <div class="col-sm-10">
                                {!! Form::textarea('question', null, array('placeholder' => 'Enter Question','class' => 'form-control', 'id' => 'summary-ckeditor')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="answer" class="col-sm-2 control-label">Answer</label>

                            <div class="col-sm-10">
                                {!! Form::textarea('answer', null, array('placeholder' => 'Enter Answer','class' => 'form-control')) !!}
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
                        <h3 class="box-title">FAQ List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Order By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $faq)
                                <tr>
                                    <td>{{$faq->id}}</td>
                                    <td>{!! htmlspecialchars_decode($faq->question) !!}</td>
                                    <td>{{$faq->answer}}</td>
                                    <td>{{$faq->order_by}}</td>
                                    <td><a href="{{route('faq-edit', $faq->id)}}" class="btn btn-info">Edit ||</a>
                                        <form method="POST"  id="delete-form-{{$faq->id}}" action="{{route('faq-delete',$faq->id)}}" style="display:none;">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
                                        </form>
                        
                                        <button onclick="if(confirm('Are You Sure, You Want to Delete This?')){
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$faq->id}}').submit();
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
                                    <th>Question</th>
                                    <th>Answer</th>
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
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
@endpush
@endsection