@extends('partials.content-form')
<?php $title = 'Error'; 
$breadcrumb = [];
?>
@section('content-form')
  <div class="row justify-content-center">
    <div class="col-xl-10">
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col-lg-4 ms-auto">
              <div class="ex-page-content">
                <h1 class="text-dark display-3 mt-4">Kesalahan!</h1>
                <h4 class="mb-4">Maaf, halaman tidak ditemukan</h4>
                <p class="mb-5">Anda tidak dapat mengakses halaman ini, atau halaman ini tidak Tersedia.</p>
                </div>
            </div>
            <div class="col-lg-5 mx-auto">
              <img src="{{ asset('assets/images/error.png') }}" alt="" class="img-fluid mx-auto d-block">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
