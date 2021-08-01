@extends('partials.content-list')
<?php 
  $canEdit = auth()->user()->can('kelas-edit'); 
  $canDelete = auth()->user()->can('kelas-delete');
?>
@section('content-list')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <table id="grid" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
              <tr>
                <th>Kode Kelas</th>
                <th>Nama Kelas</th>
                <th>Wali Kelas</th>
                <th>Keterangan</th>
                @if($canEdit || $canDelete)
                <th></th>
                @endif
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js-list')
<script>
  $(document).ready(function (){
    let grid = $('#grid').DataTable({
        ajax: {
          url: "{{ url('kelas/grid') }}",
          dataSrc: ''
        },
        columns: [
          { 
            data: 'kode_kelas',
            searchText: true
          },
          { 
            data: 'nama_kelas',
            searchText: true
          },
          { 
            data: 'nama_lengkap',
            searchText: true
          },
          { 
            data: 'keterangan',
            searchText: true
          },
          @if($canEdit || $canDelete)
          { 
            data:null,
            width:'80px',
            className: 'text-center',
            render: function(data, type, full, meta){
              let icon = "";
              
              if("{{ $canEdit }}")
                icon += '<a href="{{ $link }}'+ '/edit/' + data.kode_kelas +'" title="Edit" type="button" class="btn btn-success btn-sm waves-effect gridEdit"><i class="ti-marker-alt"></i> Edit</a>';
              
              if("{{ $canDelete }}")
                icon += '&nbsp;<a href="#" title="Delete" '
                  + 'delete-title="Hapus kelas ' + data.kode_kelas + '" '
                  + 'delete-action="{{ $link }}'+ '/' + data.kode_kelas + '" '
                  + 'delete-message="Apakah anda yakin untuk menghapus data ini?" '
                  + 'class="btn btn-danger btn-sm waves-effect gridDelete"><i class="ti-trash"></i> Hapus</a>';
              return icon;
            }
          }
          @endif
        ]
      });
  });
</script>
@endsection
