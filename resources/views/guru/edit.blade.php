@extends('partials.content-form')

@section('content-form')
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form class="row g-3 needs-validation" method="POST" action="{{ url('/guru') }}{{$data->kode_guru ? '/' : ''}}{{$data->kode_guru}}">
            <div class="col-md-6">
              <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />
              <label for="full_name" class="form-label">Nama Lengkap</label>
              <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $data->nama_lengkap) }}" class="form-control" id="full_name" placeholder="Nama Lengkap">
            </div>
            <div class="col-md-6">
              <label for="username" class="form-label">Mata Pelajaran</label>
              <select class="form-select" name="kode_mapel" aria-label="Default select example">
                <option value="">Pilih Mata Pelajaran</option>
                @foreach($mapel as $m)
                  <option value="{{$m->kode_mapel}}" {{ old('kode_mapel', $data->kode_mapel) == $m->kode_mapel ? ' selected' : '' }}> {{$m->nama_mapel}}</option>
                @endforeach
              </select>                 
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="text" name="email" value="{{ old('email', $data->email) }}" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label">Nomor Unik Pendidik dan Tenaga Kependidikan (NUPTK)</label>
              <input type="number" name="nuptk" value="{{ old('nuptk', $data->nuptk) }}" class="form-control" id="password" placeholder="NUPTK">
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label">Alamat</label>
              <input type="text" name="alamat" value="{{ old('alamat', $data->alamat) }}" class="form-control" id="password" placeholder="alamat">
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label">Kontak</label>
              <input type="text" name="kontak" value="{{ old('kontak', $data->kontak) }}" class="form-control" id="password" placeholder="kontak">
            </div>
            <div class="col-md-12">
              <label class="form-label">Foto</label>
              <input type="file" class="filestyle" accept="image/*" data-buttonname="btn-secondary">
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
