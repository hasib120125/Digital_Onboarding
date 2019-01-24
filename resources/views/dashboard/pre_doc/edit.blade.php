@extends('layouts.dashboard')

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <h3>Add New Document checkList</h3>
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
                {!! Form::open(['route' => ['pre-doc-update',$docList->id],'method' => 'PATCH', 'class' => 'form-horizontal']) !!}
                    <input type="hidden" name="emp_state_id" value="1">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="document_name" class="col-sm-2 control-label">checkList Name</label>

                            <div class="col-sm-10">
                                {!! Form::text('document_name', $docList->document_name, array('placeholder' => 'Checklist Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order_by" class="col-sm-2 control-label">Order By</label>

                            <div class="col-sm-10">
                                {!! Form::number('order_by', $docList->order_by, array('placeholder' => 'Order By','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">Status</label>

                            <div class="col-sm-4">
                                {!! Form::select('status', ['1' => 'active', '0' => 'decative'], '1', ['placeholder' => 'Select Status','class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Update</button>
                        <a href="{{route('pre-doc-list')}}" class="btn btn-info pull-left">Back</a>
                    </div>
                    <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection