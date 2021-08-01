@extends('partials.content-form')

@section('content-form')
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form class="row g-3 needs-validation" method="POST" action="{{ url('/mapel') }}{{$data->kode_mapel ? '/' : ''}}{{$data->kode_mapel}}">
            <div class="col-md-6">
              <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />
              <label for="full_name" class="form-label">Kode Mata Pelajaran</label>
              <input type="text" name="kode_mapel" value="{{ old('kode_mapel', $data->kode_mapel) }}" class="form-control" id="full_name" placeholder="Kode Mapel">
            </div>
            <div class="col-md-6">
              <label for="username" class="form-label">Nama Mata Pelajaran</label>
              <input type="text" name="nama_mapel" value="{{ old('nama_mapel', $data->nama_mapel) }}" class="form-control" id="username" placeholder="Nama Mapel">
            </div>
            <div class="col-md-12">
              <label for="email" class="form-label">Keterangan</label>
              <textarea name="keterangan" class="form-control"  rows="3" placeholder="Keterangan">{{ old('keterangan', $data->keterangan) }}</textarea>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js-form')
<script>
  $(document).ready(function (){
    $('.select2').select2();
  });
</script>
@endsection
