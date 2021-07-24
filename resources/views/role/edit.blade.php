@extends('partials.content-form')

@section('css-form')
@endsection

@section('content-form')
  <div class="row">
    <form class="row g-3 needs-validation" method="POST" action="{{ url('/role') }}">
      <div class="col-lg-12 mt-0">
        <div class="card">
          <div class="card-body">
            <div class="form-row">
              <div class="col-md-12">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />
                <input type="hidden" id="id" name="id" value="{{ $data->id }}" />  
                <label for="name" class="form-label">Peran</label>
                <?php $read = isset($data->id) ? 'readonly' : null; ?> 
                <input type="text" name="name" value="{{ old('name', $data->name) }}" class="form-control" id="name" {!! $read !!}>
              </div>
              
              <div class="col-md-12 mt-4">
                <label for="username" class="form-label mb-0">User</label>
                <div class="mt-0">
                @foreach($data->user as $user)
                  <h4><span class="badge bg-info">{{ $user->username }}</span></h4>
                @endforeach
                </div>
              </div>
              <hr/>
              <div class="col-md-12 my-5">
                <legend>Hak Akses</legend>
                <p class="card-title-desc">Here are a few types of switches. </p>
                <div class="row row-sm mg-b-10">
                @foreach($perms as $perm)
                <div class="col-sm-2">
                  <h4><b>{{ $perm->module}}</b></h4>
                  @foreach($perm->actions as $act)
                    <div class="d-flex justify-content-between mx-4 my-2">
                      <div class="mx-2 text-right">
                        <label class="custom-control-label">{{$act->raw}}</label>
                      </div>
                      <?php $checkedStr = $act->active ? 'checked="checked"' : null; ?> 
                      <div class="custom-control custom-switch">
                        <input class="form-check form-switch" name="roleperms[]" value="{{ $act->value }}" type="checkbox" id="{{ $act->value }}" switch="none" {!! $checkedStr !!} >
                        <label class="form-label" for="{{ $act->value }}" data-on-label="Ya" data-off-label="X"></label>
                      </div>
                    </div>
                  @endforeach
                  </div>
                @endforeach    
                </div>
              </div>
            </div>
            <div class="text-right">
              <a href="{{ url('/role') }}" type="button" class="btn btn-danger mt-2" type="submit">{{ isset($data->id) ? 'Kembali' : 'Batal' }}</a>
              <button class="btn btn-primary mt-2" type="submit">Submit form</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection

@section('js-form')
<script>
  $(document).ready(function (){
    $('.select2').select2();
  });
</script>
@endsection
