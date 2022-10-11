@extends('layouts.admin_list')

@section('list')
  @foreach ($all_deceased as $one_deceased)

      <a href="{{ route('cemetery.updateform', ['id' => $one_deceased->id, 'type' => $type]) }}">
        <button class="btn btn-primary col-12">
          @if ($one_deceased->title) {{ $one_deceased->title }} @endif {{ $one_deceased->first_name }} {{ $one_deceased->last_name }} @if ($one_deceased->suffix_name) {{ $one_deceased->suffix_name }} @endif
        </button>
      </a>

  @endforeach
@endsection
