@extends('layouts.master')
  @section('content')
    <div class="indivMain section">
      <div class="backBttn">
        <a href="{{ route('cemetery.list') }}" style="color:white"><< BACK</a>
      </div>
      <div class="fullName">
        <div>
          In memory of
        </div>
        <div>
          @if ($deceased->title)
            {{ $deceased->title }}
          @endif
          {{ $deceased->first_name }}
          {{ $deceased->last_name }}
          @if ($deceased->suffix_name)
            {{ $deceased->suffix_name }}
          @endif
        </div>
      </div>
      <div class="photoBox">
        @if ($deceased->profile_photo != null)
          <div class="photoProfile" data-size="main" data-type="profile" style="background-image:url('/{{ $deceased->profile_photo }}')"></div>
        @endif
        @if ($deceased->tombstone_photo != null)
          <div class="photoProfile" data-size="main" data-type="tombstone" style="background-image:url('/{{ $deceased->tombstone_photo }}')"></div>
        @endif
        @if ($deceased->zone != null)
          <div class="photoProfile" data-size="main" data-type="map" style="background-image:url('/images/overview_{{ $deceased->zone }}.jpg')"></div>
        @endif
        @if ($deceased->profile_photo == null && $deceased->tombstone_photo == null && $deceased->zone == null)
          <div class="photoProfile" style="display:flex;flex-direction:column;justify-content:center">
            <div style="text-align:center">
              NO PHOTOS FOUND
            </div>
          </div>
        @endif
        <div class="photoMenu">
          @if ($deceased->profile_photo != null)
            <div data-type="profile" data-size="thumbnail" style="background-image:url('/{{ $deceased->profile_photo }}')"></div>
          @endif
          @if ($deceased->tombstone_photo != null)
            <div data-type="tombstone" data-size="thumbnail" style="background-image:url('/{{ $deceased->tombstone_photo }}')"></div>
          @endif
          @if ($deceased->zone != null)
            <div data-type="map" data-size="thumbnail"style="background-image:url('/images/overview_{{ $deceased->zone }}.jpg')"></div>
          @endif
        </div>
      </div>
      <div class="basicInfoBox">
        <div class="basicElement">
          <div>
            Full Name:
          </div>
          <div>
            {{ $deceased->first_name }}
            @if ($deceased->middle_name)
              {{ $deceased->middle_name }}
            @endif
            @if ($deceased->maiden_name)
              ({{ $deceased->maiden_name }})
            @endif
            {{ $deceased->last_name }}
            @if ($deceased->suffix_name)
              {{ $deceased->suffix_name }}
            @endif
          </div>
        </div>
        <div class="basicElement">
          <div>Born on</div>
          <div>
            @if ($deceased->date_of_birth)
              @php $birth_date = strtotime($deceased->date_of_birth); @endphp
              {{ date("F jS, Y", $birth_date) }}
            @else
              UNKNOWN
            @endif
          </div>
        </div>
        <div class="basicElement">
          <div>Died on</div>
          <div>
            @if ($deceased->date_of_death)
              @php $death_date = strtotime($deceased->date_of_death); @endphp
              {{ date("F jS, Y", $death_date) }}
            @else
              UNKNOWN
            @endif
          </div>
        </div>
        @if ($deceased->date_of_death && $deceased->date_of_birth)
          <div class="basicElement">
            <div>Age</div>
            <div>
              {{ $deceased->age }}
              @if ($deceased->age == 1)
                year old
              @else
                years old
              @endif
            </div>
          </div>
        @endif
        @if ($deceased->vocation)
          <div class="basicElement">
            <div>Vocation</div>
            <div>
              {{ $deceased->vocation }}
            </div>
          </div>
        @endif
        @if ($deceased->father_name)
          <div class="basicElement">
            <div>Father's Name</div>
            <div>
              {{ $deceased->father_name }}
            </div>
          </div>
        @endif
        @if ($deceased->mother_name)
          <div class="basicElement">
            <div>Mother's Name</div>
            <div>
              {{ $deceased->mother_name }}
            </div>
          </div>
        @endif
        @if ($deceased->spouse)
          <div class="basicElement">
            <div>Spouse</div>
            <div>
              {{ $deceased->spouse }}
            </div>
          </div>
        @endif
        @if ($deceased->children)
          <div class="basicElement">
            <div>Children</div>
            <div>
              {{ $deceased->children }}
            </div>
          </div>
        @endif
        @if ($deceased->on_tombstone)
          <div class="basicElement">
            <div>Written on tombstone</div>
            <div>
              {{ $deceased->on_tombstone }}
            </div>
          </div>
        @endif
        @if ($deceased->public_notes)
          <div class="basicElement">
            <div>Additional Notes</div>
            <textarea>{{ $deceased->public_notes }}</textarea>
          </div>
        @endif
      </div>
    </div>
  @endsection
