@extends('partials.index')

@section('css-prime')

<link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
  @yield('css-form')
@endsection

@section('content')
  @yield('content-form')
@endsection

@section('js-prime')
  <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
  @yield('js-form')
@endsection