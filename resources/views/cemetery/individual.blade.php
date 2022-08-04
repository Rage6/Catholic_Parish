@extends('layouts.master')
  @section('content')
    <div class="indivMain">
      <div>
        <a href="{{ route('cemetery.index') }}" style="color:white"><< BACK</a>
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
          <div class="photoProfile" style="background-image:url('/{{ $deceased->profile_photo }}')"></div>
        @else
          <div class="photoProfile" style="background-image:url('/images/default_profile.png')"></div>
        @endif
        <div class="photoMenu">
          @if ($deceased->profile_photo == null)
            <div>Profile</div>
          @endif
          <div>Tomb</div>
          <div>Map</div>
        </div>
      </div>
      <div class="basicInfoBox">
        <div>
          <div>
            Full Name:
          </div>
          <div>
            {{ $deceased->first_name }}
            @if ($deceased->middle_name)
              {{ $deceased->middle_name }}
            @endif
            {{ $deceased->last_name }}
            @if ($deceased->maiden_name)
              ({{ $deceased->maiden_name }})
            @endif
            @if ($deceased->suffix_name)
              {{ $deceased->suffix_name }}
            @endif
          </div>
        </div>
        <div>
          <div>Born on</div>
          <div>
            @php $birth_date = strtotime($deceased->date_of_birth); @endphp
            {{ date("F jS, Y", $birth_date) }}
          </div>
        </div>
        <div>
          <div>Died on</div>
          <div>
            @php $death_date = strtotime($deceased->date_of_death); @endphp
            {{ date("F jS, Y", $death_date) }}
          </div>
        </div>
        @if ($deceased->spouse)
          <div>
            <div>Spouse</div>
            <div>
              {{ $deceased->spouse }}
            </div>
          </div>
        @endif
        @if ($deceased->children)
          <div>
            <div>Children</div>
            <div>
              {{ $deceased->children }}
            </div>
          </div>
        @endif
        @if ($deceased->on_tombstone)
          <div>
            <div>Written on tombstone</div>
            <div>
              {{ $deceased->on_tombstone }}
            </div>
          </div>
        @endif
      </div>
    </div>
  @endsection
