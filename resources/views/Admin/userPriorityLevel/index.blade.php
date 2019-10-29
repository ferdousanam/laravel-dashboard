@extends('Admin.layouts.app')

@push('css')

@endpush

@section('page_title', 'User Priority Level')
@section('page_tagline', '')

@section('content')
  @include('Admin.msg.message')
  <!--begin::Portlet-->
  <div class="kt-portlet">
    <div class="kt-portlet__head">
      <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">
          User Priority Level
        </h3>
      </div>
    </div>

    <!--begin::Form-->
    <form id="menu-form" action="{{ route('user-priority-level.update',1) }}" method="POST" class="kt-form kt-form--label-right">
      <div class="kt-portlet__body">
        @method('PUT')
        @csrf

        <div class="form-group row align-self-center col col-sm-5">
          <label class="align-self-center col text-center"><h2>User Type Name *</h2></label>
          <div></div>
          <select name="priority_id" id="priority_id" class="custom-select form-control chosen" required onchange="getAppModuleView();">
            <option value="">Select A User Type</option>
            @if(isset($priority) && count($priority)>0)
              @foreach ($priority as $pr)
                <option value="{{$pr->id}}">{{$pr->priority_name}}</option>
              @endforeach
            @endif
          </select>
        </div>
        <div class="row" id="appmodule_view"></div>
        <div class="kt-portlet__foot" style="display: none;">
          <div class="kt-form__actions">
            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-10">
                <button type="submit" class="btn btn-success">Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <!--end::Portlet-->
@endsection
@push('scripts')
  <script type="text/javascript">
      $('#user-priority-level-mm').addClass('kt-menu__item--active');

      function getAppModuleView() {
          $('.kt-portlet__foot').hide();
          $('#appmodule_view').html(
              '<div class="col-1"></div><div class="align-self-center col col-10"><h4 class="alert alert-success text-center">Loading...</h4></div>');
          var pr_id = $('#priority_id').val();
          if (pr_id !== "") {
              $.ajax({
                  url: "{{ route('user-priority-level.index') }}/" + pr_id,
                  type: 'GET',
                  data: {},
                  success: function (data) {
                      $('#appmodule_view').html(data);
                  }
              }).done(function () {
                    $('.kt-portlet__foot').show();
              });

          } else {
              $('#appmodule_view').html(
                  '<div class="col-1"></div><div class="align-self-center col col-10"><h4 class="alert alert-danger text-center">Please Select User Type Name</h4></div>'
              );
          }
      }
  </script>
@endpush
