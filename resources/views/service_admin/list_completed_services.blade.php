@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-12">

    <!-- START DEFAULT DATATABLE -->
    <div class="panel panel-default">
      <div class="panel-heading">                                
        <h3 class="panel-title">List Data Services Completed {{date('F Y')}}</h3>
        <ul class="panel-controls">
          <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
          <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
          <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
        </ul>                                
      </div>
      <br>
      <div class="pull-left" style="margin-top: 10px;margin-left: 13px;">
      </div>
      <div class="panel-body">
        <table class="table datatable">
          <thead>
            <tr>
              <th>Id</th>
              <th>Mid</th>
              <th>Tid</th>
              <th>Nama Merchant</th>
              <th>ALamat Merchant</th>
              <th>Nama Service Point</th>
              <th>Description</th>
              <th>Engineer</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($services_completed as $services_complete )
            <tr>
              <td>{{$services_complete->id}}</td>
              <td>{{$services_complete->merchant['mid']}}</td>
              <td>{{$services_complete->merchant['tid']}}</td>
              <td>{{$services_complete->merchant['nama_merchant']}}</td>
              <td>{{$services_complete->merchant['alamat_merchant']}}</td>
              <td>{{$services_complete->service_point['nama']}}</td>
              <td>{{$services_complete->description}}</td>
              <td>{{$services_complete->user['name']}}</td>
              @if($services_complete->status ==4)
              <td>{{'Completed'}}</td>
              @endif
              <td>
              <a href="{{ $services_complete->id }}/detail-completed" class="btn btn-danger btn-sm">Detail</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- Delete modal -->
      <div class="modal fade bs-example-modal-sm3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Delete Data</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                {{ csrf_field() }}
                <input type="hidden" name="id-delete" id="id-delete">
                <p>Yakin Ingin Menghapus Data? </p>
              </div>
              <div class="form-group" align="right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" id="delete" class="btn btn-danger" data-dismiss="modal">Delete</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END DEFAULT DATATABLE -->
  </div>
</div>
<script type="text/javascript">
  $(document).on('click', '.delete-modal', function() {
    $('#id-delete').val($(this).data('id'));
    $('.bs-example-modal-sm3').modal('show');
  });
  $("#delete").click(function() {
    $.ajax({
      type: 'post',
      url: '/admin-services/delete',
      data: {
        '_token': $('input[name=_token]').val(),
        'id' : $('input[name=id-delete]').val()
      },
      success: function(data) {
        $('.item' + data.id).remove();
        toastr.success("Data Berhasil Dihapus.");
        location.href = "/admin-services"
      }
    });
  });
</script>
@endsection