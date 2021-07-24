@extends('partials.index')
  
@section('css-prime')
  <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
  @yield('css-list')
@endsection

@section('content')
  @yield('content-list')
@endsection

@section('js-prime')
  <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
  <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
  <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
  <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script> 
  <script>
    $.extend( true, $.fn.dataTable.defaults, {
      dom: '<"row"' +
        '<"col-md-12"<"row"<"col-md-6"B> > >' +
        '<"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
      buttons: [
        'excelHtml5',
        'pdfHtml5',
        @can($link.'-add')
        { 
          text: "Tambah Baru",
          className: 'btn btn-info',
          action: function ( e, dt, node, config ) {
            window.location = "{{ url($link.'/edit') }}";
          }
        }
        @endcan
      ],
      processing: false,
      serverSide: false,
      oLanguage: {
        oPaginate: { "sPrevious": '<', "sNext": '>' },
        sInfo: "Halaman _PAGE_ dari _PAGES_",
        sLengthMenu: "Hasil :  _MENU_",
      },
      stripeClasses: [],
      lengthMenu: [10, 20, 50],
      pageLength: 15,
    });
  </script>
  @yield('js-list')
@endsection