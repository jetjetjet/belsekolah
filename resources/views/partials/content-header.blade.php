<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
          <h6 class="page-title">{!! $title !!}</h6>
          <ol class="breadcrumb m-0">
            @foreach($breadcrumb as $name => $link)
              <li class="breadcrumb-item active"><a href="{{ url($link) }}">{{ $name }}</a></li>
            @endforeach
          </ol>
        </div>
        <div class="col-md-4">
          <div class="float-end d-none d-md-block">
            <div class="dropdown">
              <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-cog me-2"></i> Settings
              </button>
              <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>