@extends('layouts.dashboard')

@section('content')
@push('styles')
<link rel="stylesheet" href="{{asset('adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('adminLTE/bower_components/bootstrap/css/bootstrap.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('adminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{asset('adminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">
@endpush

<div class="content-header clearfix">
  <h2 class="pull-left  darkblue-color">
    Check Feedbacks
  </h2>
  
</div>
<div class="content">
  <div class="alert alert-success" id="success-msg" style="display:none"></div>
  <div class="alert alert-error" id="error-msg" style="display:none"></div>
  <div class="panel panel-default">
      <div class="panel-body">     

          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <div class="col-sm-12">
                          <p>
                              User Name: 
                              <select id="table-filter" class="select2">
                                  <option value="">All Users</option>
                                  @foreach($users as $user)
                                      <option>{{ $user->name }}</option>
                                  @endforeach
                              </select>
                          </p>
                      </div>
                  </div>
              </div>
              <button>Export as CSV</button>
          </div>

          @if(Session::has('message'))
              <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
          @endif
      </div>
      <div class="table-responsive">
        <table id="feedback-data-table" class="table table-bordered table-striped">
          <thead>
            <tr>
                <th>User Name</th>
                <th>Document Name</th>
            </tr>
            </thead>
            <tbody>
              <?php $sl = 1;
                $j = 1; ?>
              @foreach($checklist_feedbacks as $each_checklist_feedback)
              <tr>
                  <td>{{ $each_checklist_feedback->user->name }}</td>
                  <td>{{ $each_checklist_feedback->checklist->document_name }}</td>
              </tr>
              @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
  <script>
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            //for datatable
            var table = $('#feedback-data-table').DataTable({
                "aLengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
            });

            $('#table-filter').on('change', function(){
                table.column(0).search(this.value).draw();   
            });

        });


        function download_csv(csv, filename) {
          var csvFile;
          var downloadLink;

          // CSV FILE
          csvFile = new Blob([csv], {type: "text/csv"});

          // Download link
          downloadLink = document.createElement("a");

          // File name
          downloadLink.download = filename;

          // We have to create a link to the file
          downloadLink.href = window.URL.createObjectURL(csvFile);

          // Make sure that the link is not displayed
          downloadLink.style.display = "none";

          // Add the link to your DOM
          document.body.appendChild(downloadLink);

          // Lanzamos
          downloadLink.click();
      }

      function export_table_to_csv(html, filename) {
          var csv = [];
          var rows = document.querySelectorAll("table tr");
          
          for (var i = 0; i < rows.length; i++) {
              var row = [], cols = rows[i].querySelectorAll("td, th");
              
              for (var j = 0; j < cols.length; j++) 
                  row.push(cols[j].innerText);
              
              csv.push(row.join(","));		
          }

          // Download CSV
          download_csv(csv.join("\n"), filename);
      }

      document.querySelector("button").addEventListener("click", function () {
          var html = document.querySelector("table").outerHTML;
          export_table_to_csv(html, "ChecklistFeedback.csv");
      });


    </script>
    <style type="text/css">
    .dataTables_wrapper .dt-buttons {
        float: none;  
        text-align: center;
    }

    #example1_length {
        width: 25% !important;
        float: left;
    }

</style>
@endpush