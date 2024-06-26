@extends('layouts.master')
  @section('content')
    <div class="listSection searchSection sectionBackground section primaryFont">
      <div class="backBttn">
        <a href="{{ route('cemetery.find') }}" style="color:white"><< BACK</a>
      </div>
      <div class="sectionTitle">
        Find a Grave
      </div>
      <div class="listIntro">
        Feel free to search for a specific individual amongst our cemetery's deceased members.
      </div>
      <div>
        <div class="searchTool searchBox">
          <div class="searchTitle">Find By Name:</div>
          <form method="POST" action="{{ route('cemetery.search') }}" enctype="multipart/form-data">
            @csrf
            <input name="name_type" placeholder="First, Middle, Last, Maiden, Nickname">
            <button>
              SEARCH
            </button>
          </form>
        </div>
        <div class="resultBox">
          <div class="listTitles">
            <div>
              Name
            </div>
            <div>
              Age
            </div>
            <div>
              Date of Birth
            </div>
            <div>
              Date of Death
            </div>
          </div>
          @if ($all_deceased != null && count($all_deceased))
            <div class="resultList">
              @foreach ($all_deceased as $one_deceased)
                @if ($one_deceased->is_deceased == 1)
                  <a style="color:white" href="{{ route('cemetery.person',['id' => $one_deceased->id, 'param_name' => $param_name, 'param_value' => $param_value ]) }}">
                    <div
                      class="resultRow"
                    >
                      <div
                        @if ($one_deceased->profile_photo)
                          style="background-image:url('/{{ $one_deceased->profile_photo }}')"
                        @elseif ($one_deceased->tombstone_photo)
                          style="background-image:url('/{{ $one_deceased->tombstone_photo }}')"
                        @elseif ($one_deceased->zone)
                          style="background-image:url('/images/{{ $one_deceased->zone }}.jpg')"
                        @endif
                      >
                      </div>
                      <div>
                        @if ($one_deceased->title)
                          {{ $one_deceased->title }}
                        @endif
                        @if ($one_deceased->prefers_middle_name && $one_deceased->middle_name)
                          {{ substr($one_deceased->first_name, 0, 1) }}. {{ $one_deceased->middle_name }}
                        @else
                          {{ $one_deceased->first_name }}
                          @if ($one_deceased->middle_name && !$one_deceased->nickname)
                            {{ substr($one_deceased->middle_name, 0, 1) }}.
                          @endif
                        @endif
                        @if ($one_deceased->nickname)
                          "{{ explode(";",$one_deceased->nickname)[0] }}"
                        @endif
                        @if ($one_deceased->maiden_name)
                          {{ "(".$one_deceased->maiden_name.") " }}
                        @endif
                        {{ $one_deceased->last_name }}
                        @if ($one_deceased->suffix_name)
                          {{ $one_deceased->suffix_name }}
                        @endif
                        <!-- @if ($one_deceased->age)
                          {{ "(".$one_deceased->age." y/o)" }}
                        @endif -->
                      </div>
                      <div class="minWidth">
                        @if ($one_deceased->date_of_birth)
                          {{ \Illuminate\Support\Str::limit($one_deceased->date_of_birth,4,$end='') }}
                        @elseif ($one_deceased->dob_year)
                          {{ $one_deceased->dob_year }}
                        @else
                          UNKNOWN
                        @endif
                        -
                        @if ($one_deceased->date_of_death)
                          {{ \Illuminate\Support\Str::limit($one_deceased->date_of_death,4,$end='') }}
                        @elseif ($one_deceased->dod_year)
                          {{ $one_deceased->dod_year }}
                        @else
                          UNKNOWN
                        @endif
                      </div>
                      <div class="maxWidth">
                        {{ $one_deceased->age }}
                      </div>
                      @php
                        $all_months = [
                          "Jan.", "Feb.", "Mar.", "Apr.", "May", "Jun.", "Jul.", "Aug.", "Sept.", "Oct.", "Nov.", "Dec."
                        ];

                        if ($one_deceased->dob_month || $one_deceased->dob_day || $one_deceased->dob_year) {
                          if ($one_deceased->dob_day && intval($one_deceased->dob_day) > 0 && intval($one_deceased->dob_day) < 32) {
                            $dobDay = $one_deceased->dob_day;
                          } else {
                            $dobDay = "__";
                          };
                          if ($one_deceased->dob_month && intval($one_deceased->dob_month) > 0 && intval($one_deceased->dob_month) < 13) {
                            $dobMonth = $all_months[intval($one_deceased->dob_month)-1];
                          } else {
                            $dobMonth = "__";
                          };
                          if ($one_deceased->dob_year && intval($one_deceased->dob_year) > 1000) {
                            $dobYear = $one_deceased->dob_year;
                          } else {
                            $dobYear = "____";
                          };
                          $dob = $dobMonth." ".$dobDay.", ".$dobYear;
                        } elseif ($one_deceased->date_of_birth) {
                          $dob = $one_deceased->date_of_birth;
                          $dob = explode("-",$dob);
                          $dobDay = $dob[2];
                          $dobMonth = $all_months[intval($dob[1])-1];
                          $dobYear = $dob[0];
                          $dob = $dobMonth." ".$dobDay.", ".$dobYear;
                        } else {
                          $dob = "UNKNOWN";
                        };

                        if ($one_deceased->dod_month || $one_deceased->dod_day || $one_deceased->dod_year) {
                          if ($one_deceased->dod_day && intval($one_deceased->dod_day) > 0 && intval($one_deceased->dod_day) < 32) {
                            $dodDay = $one_deceased->dod_day;
                          } else {
                            $dodDay = "__";
                          };
                          if ($one_deceased->dod_month && intval($one_deceased->dod_month) > 0 && intval($one_deceased->dod_month) < 13) {
                            $dodMonth = $all_months[intval($one_deceased->dod_month)-1];
                          } else {
                            $dodMonth = "__";
                          };
                          if ($one_deceased->dod_year && intval($one_deceased->dod_year) > 1000) {
                            $dodYear = $one_deceased->dod_year;
                          } else {
                            $dodYear = "____";
                          };
                          $dod = $dodMonth." ".$dodDay.", ".$dodYear;
                        } elseif ($one_deceased->date_of_death) {
                          $dod = $one_deceased->date_of_death;
                          $dod = explode("-",$dod);
                          $dodDay = $dod[2];
                          $dodMonth = $all_months[intval($dod[1])-1];
                          $dodYear = $dod[0];
                          $dod = $dodMonth." ".$dodDay.", ".$dodYear;
                        } else {
                          $dod = "UNKNOWN";
                        };
                      @endphp
                      <div class="maxWidth">
                        {{ $dob }}
                      </div>
                      <div class="maxWidth">
                        {{ $dod }}
                      </div>
                    </div>
                  </a>
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
    </div>
  @endsection
