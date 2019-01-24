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
                {!! Form::open(['route' => ['faq-update',$faq->id], 'method'=>'PATCH', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Question</label>

                            <div class="col-sm-10">
                                {!! Form::textarea('question', $faq->question, array('placeholder' => 'Enter Question','class' => 'form-control', 'id' => 'summary-ckeditor')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="answer" class="col-sm-2 control-label">Answer</label>

                            <div class="col-sm-10">
                                {!! Form::textarea('answer', $faq->answer, array('placeholder' => 'Enter Answer','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order_by" class="col-sm-2 control-label">Order By</label>

                            <div class="col-sm-10">
                                {!! Form::number('order_by', $faq->order_by, array('placeholder' => 'Order By','class' => 'form-control')) !!}
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
                        <button type="submit" class="btn btn-info pull-right">update</button>
                        <a href="{{route('create-faq')}}" class="btn btn-info pull-left">Back</a>
                    </div>
                    <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
@endpush