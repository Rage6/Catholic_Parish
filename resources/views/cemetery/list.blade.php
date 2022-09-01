@extends('layouts.master')
  @section('content')
    <div class="listSection searchSection sectionBackground section primaryFont">
      <div class="backBttn">
        <a href="{{ route('cemetery.index') }}" style="color:white"><< BACK</a>
      </div>
      <div class="sectionTitle">
        Find a Grave
      </div>
      <div>
        Feel free to search for a specific individual amongst our cemetery's deceased members.
      </div>
      <div>
        <div class="searchTool">
          <div>Search By Name:</div>
          <form method="POST" action="{{ route('cemetery.search') }}" enctype="multipart/form-data">
            @csrf
            <input name="name_type" placeholder="First, Last, or Maiden">
            <button>
              SEARCH
            </button>
          </form>
        </div>
        <div class="resultBox">
          @if ($all_results != null)
            @php
              $all_deceased = $all_results;
            @endphp
          @endif
          @if ($all_deceased != null)
            <div class="resultList">
              @foreach ($all_deceased as $one_deceased)
                @if ($one_deceased->is_deceased == 1)
                  <div
                    class="resultRow"
                    data-id="{{ $one_deceased->id }}"
                    data-first="{{ $one_deceased->first_name }}"
                    data-last="{{ $one_deceased->last_name }}  @if ($one_deceased->suffix_name) {{ $one_deceased->suffix_name }} @endif"
                    @if ($one_deceased->maiden_name)
                      data-maiden="{{ $one_deceased->maiden_name }}"
                    @endif
                  >
                    <div>
                      <a style="color:white" href="{{ route('cemetery.person',['id' => $one_deceased->id ]) }}">
                        {{ $one_deceased->first_name }}
                        @if ($one_deceased->maiden_name)
                          {{ "(".$one_deceased->maiden_name.") " }}
                        @endif
                        {{ $one_deceased->last_name }}
                        @if ($one_deceased->suffix_name)
                          {{ $one_deceased->suffix_name }}
                        @endif
                      </a>
                    </div>
                    <div>
                      {{ \Illuminate\Support\Str::limit($one_deceased->date_of_birth,4,$end='') }} - {{ \Illuminate\Support\Str::limit($one_deceased->date_of_death,4,$end='') }}
                    </div>
                  </div>
                @endif
              @endforeach
            </div>
          @else
            <div class="noResults">
              No results
            </div>
          @endif
        </div>
        {{ $all_deceased->links('pagination::cemetery-list') }}
      </div>
      <div>
        Clicking on their name will provide you their basic information, location, and photos (if available).
      </div>
    </div>
  @endsection
