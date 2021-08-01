@extends('partials.content-form')

@section('content-form')
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form class="row g-3 needs-validation" method="POST" action="{{ url('/kelas') }}{{$data->kode_kelas ? '/' : ''}}{{$data->kode_kelas}}">
            <div class="col-md-4">
              <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />
              <label for="full_name" class="form-label">Kode Kelas</label>
              <input type="text" name="kode_kelas" value="{{ old('kode_kelas', $data->kode_kelas) }}" class="form-control" id="full_name" placeholder="Kode Kelas">
            </div>
            <div class="col-md-4">
              <label for="username" class="form-label">Nama Kelas</label>
              <input type="text" name="nama_kelas" value="{{ old('nama_kelas', $data->nama_kelas) }}" class="form-control" id="username" placeholder="Nama Kelas">
            </div>
            <div class="col-md-4">
              <label for="username" class="form-label">Wali Kelas</label>
              <select class="form-select" name="wali_kelas" aria-label="Default select example">
                <option value="">Pilih Guru</option>
                @foreach($guru as $g)
                  <option value="{{$g->kode_guru}}" {{ old('wali_kelas', $data->wali_kelas) == $g->kode_guru ? ' selected' : '' }}> {{$g->nama_lengkap}}</option>
                @endforeach
              </select>               
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
