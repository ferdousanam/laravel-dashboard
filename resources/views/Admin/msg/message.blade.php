@if(Session::has('success'))
  <div class="alert alert-success fade show" role="alert">
    <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
    <div class="alert-text">
      {!! Session::get('success') !!}
    </div>
    <div class="alert-close">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="la la-close"></i></span>
      </button>
    </div>
  </div>
@endif

@if(Session::has('error'))
  <div class="alert alert-danger fade show" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">
      {!! Session::get('error') !!}
    </div>
    <div class="alert-close">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="la la-close"></i></span>
      </button>
    </div>
  </div>
@endif

@if (count($errors) > 0)
  <div class="alert alert-danger fade show" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{!! $error !!}</li>
        @endforeach
      </ul>
    </div>
    <div class="alert-close">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="la la-close"></i></span>
      </button>
    </div>
  </div>
@endif
