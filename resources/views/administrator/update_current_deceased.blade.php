@extends('layouts.admin_list')

@section('list')
  @foreach ($all_deceased as $one_deceased)
    @if ($one_deceased->is_deceased)
      <a href="{{ route('cemetery.updateform', ['id' => $one_deceased->id, 'type' => 'current']) }}">
        <button class="btn btn-primary col-12">
          {{ $one_deceased->first_name }} {{ $one_deceased->last_name }} @if ($one_deceased->suffix_name) {{ $one_deceased->suffix_name }} @endif
        </button>
      </a>
    @endif
  @endforeach
@endsection
