@if($opportunity->stage_id == $stage->id)
  <a href="{{ $url }}" class="btn btn-sm btn-primary disabled" disabled="true">{{ $label }}</a>
@endif
@if($opportunity->stage_id != $stage->id)
  <a href="{{ $url }}" class="btn btn-sm btn-outline-primary">{{ $label }}</a>
@endif
