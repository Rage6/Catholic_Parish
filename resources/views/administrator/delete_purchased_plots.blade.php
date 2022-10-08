@extends('layouts.admin_list')

@section('list')
  @foreach ($all_deceased as $one_deceased)
    @if (!$one_deceased->is_deceased && $one_deceased->purchased_by)
      <a href="{{ route('cemetery.deleteform', ['id' => $one_deceased->id, 'type' => 'purchased']) }}">
        <button class="btn btn-primary col-12">
          {{ $one_deceased->first_name }} {{ $one_deceased->last_name }}
        </button>
      </a>
    @endif
  @endforeach
@endsection
