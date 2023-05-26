@extends('layouts.admin_list')

@section('list')
  @foreach ($all_deceased as $one_deceased)

      <a href="{{ route('cemetery.updateform', ['id' => $one_deceased->id, 'type' => $type]) }}">
        <button class="btn btn-primary col-12" style="margin-bottom:10px">
          @if ($one_deceased->title)
            {{ $one_deceased->title }}
          @endif
          {{ $one_deceased->first_name }} {{ $one_deceased->last_name }}
          @if ($one_deceased->suffix_name)
            {{ $one_deceased->suffix_name }}
          @endif
          @if ($one_deceased->first_name === "EMPTY" && $one_deceased->last_name === "PLOT" && $one_deceased->purchased_by)
            <div style="font-size: 0.7rem">
              <u>Purchased By</u>: {{ $one_deceased->purchased_by }}
            </div>
          @endif
        </button>
      </a>

  @endforeach
@endsection
