@extends('layouts.master')
  @section('content')
    <div class="indivMain">
      <div class="backBttn">
        <a href="{{ route('cemetery.list') }}" style="color:white"><< BACK</a>
      </div>
      <div class="fullName">
        <div>
          In memory of
        </div>
        <div>
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
        @if ($deceased->map_photo != null)
          <div class="photoProfile" data-size="main" data-type="map" style="background-image:url('/{{ $deceased->map_photo }}')"></div>
        @endif
        @if ($deceased->profile_photo == null && $deceased->tombstone_photo == null && $deceased->map_photo == null)
          <div class="photoProfile">NO PHOTOS AVAILABLE</div>
        @endif
        <div class="photoMenu">
          @if ($deceased->profile_photo != null)
            <div data-type="profile" data-size="thumbnail" style="background-image:url('/{{ $deceased->profile_photo }}')"></div>
          @endif
          @if ($deceased->tombstone_photo != null)
            <div data-type="tombstone" data-size="thumbnail" style="background-image:url('/{{ $deceased->tombstone_photo }}')"></div>
          @endif
          @if ($deceased->map_photo != null)
            <div data-type="map" data-size="thumbnail"style="background-image:url('/{{ $deceased->map_photo }}')"></div>
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
            @php $birth_date = strtotime($deceased->date_of_birth); @endphp
            {{ date("F jS, Y", $birth_date) }}
          </div>
        </div>
        <div class="basicElement">
          <div>Died on</div>
          <div>
            @php $death_date = strtotime($deceased->date_of_death); @endphp
            {{ date("F jS, Y", $death_date) }}
          </div>
        </div>
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
      </div>
    </div>
  @endsection
