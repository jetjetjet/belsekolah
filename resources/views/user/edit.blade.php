@extends('partials.content-form')

@section('content-form')
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form class="row g-3 needs-validation" method="POST" action="{{ url('/user') }}">
            <div class="col-md-6">
              <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />
              <input type="hidden" id="id" name="id" value="{{ $data->id }}" />
              <label for="full_name" class="form-label">Nama Lengkap</label>
              <input type="text" name="full_name" value="{{ old('full_name', $data->full_name) }}" class="form-control" id="full_name" placeholder="Nama Lengkap">
            </div>
            <div class="col-md-6">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" value="{{ old('username', $data->username) }}" class="form-control" id="username" placeholder="Username">
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">email</label>
              <input type="text" name="email" value="{{ old('email', $data->email) }}" class="form-control" id="email" placeholder="Email">
            </div>
            @if(!isset($data->id))
            <div class="col-md-6">
              <label for="password" class="form-label">Password</label>
              <input type="text" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            @endif
            <div class="col-md-12">
              <label for="password" class="form-label">Peran</label>
              <select name="roles[]" class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="Choose ...">
                @foreach($data->roles as $role)
                <?php $selected = in_array($role, $data->hasRoles) ? 'selected' : null; ?>
                  <option value="{{ $role }}" {!! $selected !!} >{{ $role }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Submit form</button>
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
