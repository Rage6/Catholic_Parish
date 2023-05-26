@extends('layouts.admin_list')

@section('list')

  <!-- Gets only empty, available plots -->
  @foreach ($all_deceased as $one_deceased)
      @if (!$one_deceased->is_deceased && !$one_deceased->purchased_by)
        <a href="{{ route('cemetery.updateform', ['id' => $one_deceased->id, 'type' => $type]) }}">
          <button class="btn btn-primary col-12" style="margin-bottom:10px">
            @if ($one_deceased->title)
              {{ $one_deceased->title }}
            @endif
            {{ $one_deceased->first_name }} {{ $one_deceased->last_name }}
            @if ($one_deceased->suffix_name)
              {{ $one_deceased->suffix_name }}
            @endif
          </button>
        </a>
      @endif
  @endforeach

  <!-- Gets only empty, purchased plots -->
  @foreach ($all_deceased as $one_deceased)
      @if (!$one_deceased->is_deceased && $one_deceased->purchased_by)
        <a href="{{ route('cemetery.updateform', ['id' => $one_deceased->id, 'type' => $type]) }}">
          <button class="btn btn-primary col-12 mb-2">
            @if ($one_deceased->title)
              {{ $one_deceased->title }}
            @endif
            {{ $one_deceased->first_name }} {{ $one_deceased->last_name }}
            @if ($one_deceased->suffix_name)
              {{ $one_deceased->suffix_name }}
            @endif
            <div style="font-size: 0.7rem">
              <u>Purchased By</u>: @if (strlen($one_deceased->purchased_by) <= 30) {{ $one_deceased->purchased_by }} @else {{ substr($one_deceased->purchased_by,0,29) }}... @endif
            </div>
          </button>
        </a>
      @endif
  @endforeach

  <!-- Gets only filled plots -->
  @foreach ($all_deceased as $one_deceased)
      @if ($one_deceased->is_deceased)
        <a href="{{ route('cemetery.updateform', ['id' => $one_deceased->id, 'type' => $type]) }}">
          <button class="btn btn-primary col-12" style="margin-bottom:10px">
            @if ($one_deceased->title)
              {{ $one_deceased->title }}
            @endif
            {{ $one_deceased->first_name }} {{ $one_deceased->last_name }}
            @if ($one_deceased->suffix_name)
              {{ $one_deceased->suffix_name }}
            @endif
          </button>
        </a>
      @endif
  @endforeach
@endsection
