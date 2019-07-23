@extends('layouts.app')
@section('content')

<div class="container-fluid" style="margin-top: -30px;">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-content">
        <div class="toolbar">
          <a class="btn btn-primary" href="/user/create">Tambah Data</a>
        </div>
          <div class="material-datatables">
            <table id="example1" class="table">
              <thead>
                <tr role="row">
                  <th style="font-weight: bold;">Id</th>
                  <th style="font-weight: bold;">Nama</th>
                  <th style="font-weight: bold;">Email</th>
                  <th style="font-weight: bold;">Telepon</th>
                  <th style="font-weight: bold;">Faskes</th>
                  <th style="font-weight: bold;">Level</th>
                  <th style="font-weight: bold;">Action</th>
                </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
                @foreach($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->telepon}}</td>
                  <td>{{$user->nama_faskes->nama}}</td>
                  @if($user->level == 1)
                  <td>{{'Administrator'}}</td>
                  @elseif($user->level == 2)
                  <td>{{'Admin Faskes'}}</td>
                  @else($user->level == 3)
                  <td>{{'Engineer'}}</td>
                  @endif
                  <td>
                    <a href="/user/{{ $user->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                    <button class="delete-modal btn btn-danger btn-sm" data-id="{{$user->id}}">Delete</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- end content-->
      </div>
    </div>
  </div>
</div>
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
          <button type="button" id="delete" class="btn btn-info" data-dismiss="modal">Delete</button>
        </div>
      </div>
    </div>
  </div>
</div>   
@endsection
@section('javascript')
<script type="text/javascript">
  $(document).on('click', '.delete-modal', function() {
    $('#id-delete').val($(this).data('id'));
    $('.bs-example-modal-sm3').modal('show');
  });
  $("#delete").click(function() {
    $.ajax({
      type: 'post',
      url: '/user/delete',
      data: {
        '_token': $('input[name=_token]').val(),
        'id' : $('input[name=id-delete]').val()
      },
      success: function(data) {
        $('.item' + data.id).remove();
        swal("Success", "Delete Data Berhasil", "success");
        location.href = "/user"
      }
    });
  });
</script>
@endsection