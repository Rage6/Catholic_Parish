@extends('layouts.master')
  @section('content')
    <div class="searchSection sectionBackground section primaryFont">
      <div class="backBttn">
        <a href="{{ route('cemetery.index') }}" style="color:white"><< BACK</a>
      </div>
      <div class="searchTop">
        <div class="sectionTitle">
          Find a Grave
        </div>
        <p class="searchInfo">
          Our records make it easy to browse the entire list of graves, while our search tool helps you quickly find a specific grave.
        </p>
      </div>
      <div class="listTools">
        <div>
          <a href="{{ route('cemetery.list') }}">
            <div class="browseBttn">
              <div>
                BROWSE RECORDS
              </div>
            </div>
          </a>
          <div class="orDivider">
            -- OR --
          </div>
          <div class="searchTool searchBox" style="width:90%">
            <div class="searchTitle">
              FIND BY NAME
            </div>
            <form method="POST" action="{{ route('cemetery.search') }}" enctype="multipart/form-data">
              @csrf
              <input name="name_type" placeholder="First, Last, Maiden, or Nickname">
              <button>
                SEARCH
              </button>
            </form>
          </div>
          <div class="downloadList">
            Do you want to download a complete list and map of the those buried in our cemetery? <a href="{{ route('cemetery.print') }}">Click here</a>
          </div>
        </div>
        <div class="all_grids">
          @php
            $num = 0;
            $zone_index = 0;
            $zone_list = [1,5,3,2,4];
            $last_index = count($zone_list) - 1;
          @endphp
          @foreach ($random_list as $one_random)
            @if ($zone_index == 0)
              <div class="zoneGridLayout">
            @endif
                <div class="deceased_animation zone_{{ $zone_list[$zone_index] }}" style="animation-name: name_{{ $num }}">
                  <span>
                    {{ $one_random[0] }}</br>{{ $one_random[1] }}
                  </span>
                </div>
            @if ($zone_index == $last_index)
              </div>
            @endif
            @php
              $num = $num + 1;
              if ($zone_index >= $last_index) {
                $zone_index = 0;
              } else {
                $zone_index++;
              };
            @endphp
          @endforeach
        </div>
      </div>
    </div>
  @endsection
