<a href="{{ route('user-type.edit', $id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
  <i class="la la-edit"></i>
</a>
<button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button" data-toggle="modal" data-target="#delete-modal" data-id="{{ $id }}">
  <i class="fa fa-trash lg"></i>
</button>
