@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  UPDATE: {{ $deceased->first_name }} {{ $deceased->last_name }} @if ($deceased->suffix_name) {{ $deceased->suffix_name }} @endif
                </div>
                <div class="card-body">
                    @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                    @endif
                    <div>
                      <a href="{{ route('cemetery.allupdates') }}"><< BACK</a>
                    </div>
                    <div>
                      <div>
                        <form method="POST" action="{{ route('cemetery.update',['id' => $deceased->id]) }}" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')

                          <div class="row mb-3">
                              <label for="firstName" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                              <div class="col-md-6">
                                  <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="first_name" value="{{ $deceased->first_name }}" required autocomplete="firstName" autofocus>

                                  @error('$deceased->first_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="middleName" class="col-md-4 col-form-label text-md-end">{{ __('Middle Name') }}</label>

                              <div class="col-md-6">
                                  <input id="middleName" type="text" class="form-control @error('name') is-invalid @enderror" name="middle_name" value="{{ $deceased->middle_name }}" autocomplete="middleName" autofocus>

                                  @error('middle_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="lastName" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                              <div class="col-md-6">
                                  <input id="lastName" type="text" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{ $deceased->last_name }}" required autocomplete="lastName" autofocus>

                                  @error('last_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="suffixName" class="col-md-4 col-form-label text-md-end">{{ __('Suffix Name') }}</label>

                              <div class="col-md-6">
                                  <input id="suffixName" type="text" class="form-control @error('suffix_name') is-invalid @enderror" name="suffix_name" value="{{ $deceased->suffix_name }}" autocomplete="suffixName" autofocus placeholder="Jr, IV, Sr, etc.">

                                  @error('suffix_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="maidenName" class="col-md-4 col-form-label text-md-end">{{ __('Maiden Name') }}</label>

                              <div class="col-md-6">
                                  <input id="maidenName" type="text" class="form-control @error('maiden_name') is-invalid @enderror" name="maiden_name" value="{{ $deceased->maiden_name }}" autocomplete="maidenName" autofocus>

                                  @error('maiden_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="dateOfBirth" class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth') }}</label>

                              <div class="col-md-6">
                                  <input id="dateOfBirth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ $deceased->date_of_birth }}" required autocomplete="dateOfBirth" autofocus>

                                  @error('date_of_birth')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="dateOfBirth" class="col-md-4 col-form-label text-md-end">{{ __('Date of Death') }}</label>

                              <div class="col-md-6">
                                  <input id="dateOfDeath" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_death" value="{{ $deceased->date_of_death }}" required autocomplete="dateOfDeath" autofocus>

                                  @error('date_of_death')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <!-- <div class="row mb-3">

                              <label for="firstName" class="col-md-4 col-form-label text-md-end">{{ __('Profile Photo') }}</label>

                              <div id="profilePhoto" class="col-md-6">
                                <div class="form-control">
                                  @if ($deceased->profile_photo)
                                    <img class="img-thumbnail" src="{{ url($deceased->profile_photo) }}">
                                  @else
                                    <img class="img-thumbnail" src="{{ url('/images/default_profile.png') }}">
                                  @endif
                                </div>
                              </div>
                          </div> -->

                          <div class="row mb-3">
                              <label for="on_tombstone" class="col-md-4 col-form-label text-md-end">{{ __('Words on the Tombstone') }}</label>

                              <div class="col-md-6">
                                  <!-- <input id="onTombstone" type="text" class="form-control @error('on_tombstone') is-invalid @enderror" name="on_tombstone" value="{{ old('on_tombstone') }}" autocomplete="onTombstone" autofocus> -->
                                  <textarea id="onTombstone" type="text" class="form-control @error('on_tombstone') is-invalid @enderror" name="on_tombstone" value="{{ $deceased->on_tombstone }}" autocomplete="onTombstone" autofocus rows="4"></textarea>

                                  @error('on_tombstone')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="spouse" class="col-md-4 col-form-label text-md-end">{{ __('Spouse') }}</label>

                              <div class="col-md-6">
                                  <input id="spouse" type="text" class="form-control @error('spouse') is-invalid @enderror" name="spouse" value="{{ $deceased->spouse }}" autocomplete="spouse" autofocus>

                                  @error('spouse')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="children" class="col-md-4 col-form-label text-md-end">{{ __('Children') }}</label>

                              <div class="col-md-6">
                                  <input id="children" type="text" class="form-control @error('children') is-invalid @enderror" name="children" value="{{ $deceased->children }}" autocomplete="children" autofocus>

                                  @error('children')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">

                              <label for="profilePhoto" class="col-md-4 col-form-label text-md-end">{{ __('Profile Photo') }}</label>

                              <div id="profilePhoto" class="col-md-6">
                                <div class="form-control">
                                  @if ($deceased->profile_photo)
                                    <img class="img-thumbnail" src="{{ url($deceased->profile_photo) }}">
                                  @else
                                    <img class="img-thumbnail" src="{{ url('/images/default_profile.png') }}">
                                  @endif
                                  @if ($deceased->profile_photo)
                                    <button
                                      class="btn btn-danger"
                                      formaction="{{ route('cemetery.deleteProfile',['id' => $deceased->id]) }}">
                                      X
                                    </button>
                                  @endif
                                </div>
                                <div class="form-control">
                                  <div>
                                    Change Profile Photo
                                  </div>
                                  <input id="profile" type="file" class="form-control @error('profile') is-invalid @enderror" name="profile_photo" value="{{ old('profile_photo') }}">
                                </div>
                                @error('profilePhoto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                          </div>

                          <div class="row mb-3">

                              <label for="tombstonePhoto" class="col-md-4 col-form-label text-md-end">{{ __('Tombstone Photo') }}</label>

                              <div id="tombstonePhoto" class="col-md-6">
                                <div class="form-control">
                                  @if ($deceased->tombstone_photo)
                                    <img class="img-thumbnail" src="{{ url($deceased->tombstone_photo) }}">
                                  @else
                                    <img class="img-thumbnail" src="{{ url('/images/default_profile.png') }}">
                                  @endif
                                  @if ($deceased->tombstone_photo)
                                    <button
                                      class="btn btn-danger"
                                      formaction="{{ route('cemetery.deleteTombstone',['id' => $deceased->id]) }}">
                                      X
                                    </button>
                                  @endif
                                </div>
                                <div class="form-control">
                                  <div>
                                    Change Tombstone Photo
                                  </div>
                                  <input id="tombstone" type="file" class="form-control @error('tombstone') is-invalid @enderror" name="tombstone_photo" value="{{ old('tombstone_photo') }}">
                                </div>
                                @error('tombstone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                          </div>

                          <div class="row mb-3">

                              <label for="mapPhoto" class="col-md-4 col-form-label text-md-end">{{ __('Map Photo') }}</label>

                              <div id="mapPhoto" class="col-md-6">
                                <div class="form-control">
                                  @if ($deceased->map_photo)
                                    <img class="img-thumbnail" src="{{ url($deceased->map_photo) }}">
                                  @else
                                    <img class="img-thumbnail" src="{{ url('/images/default_profile.png') }}">
                                  @endif
                                  @if ($deceased->map_photo)
                                    <button
                                      class="btn btn-danger"
                                      formaction="{{ route('cemetery.deleteMap',['id' => $deceased->id]) }}">
                                      X
                                    </button>
                                  @endif
                                </div>
                                <div class="form-control">
                                  <div>
                                    Change Map Photo
                                  </div>
                                  <input id="map" type="file" class="form-control @error('map') is-invalid @enderror" name="map_photo" value="{{ old('map_photo') }}">
                                </div>
                                @error('map')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="filled" class="col-md-4 col-form-label text-md-end">{{ __('Is this person deceased and in this plot?') }}</label>

                              <div class="col-md-6">
                                  <select id="filled" name="is_deceased">
                                    @if ($deceased->is_deceased == 1)
                                      <option value="0">NO</option>
                                      <option selected value="1">YES</option>
                                    @else
                                      <option selected value="0">NO</option>
                                      <option value="1">YES</option>
                                    @endif
                                  </select>
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="purchased" class="col-md-4 col-form-label text-md-end">{{ __('Who purchased this plot?') }}</label>

                              <div class="col-md-6">
                                  <textarea id="purchased" name="purchased_by" class="form-control" placeholder="Include a name and any other useful information (contact information, date of purchase, etc.)">{{ $deceased->purchased_by }}</textarea>
                              </div>
                          </div>

                          <div class="row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                    UPDATE
                                  </button>
                              </div>
                          </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
