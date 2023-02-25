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
                      @php $route_name = 'cemetery.all'.$type.'updates' @endphp
                      <a href="{{ route($route_name) }}"><< BACK</a>
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

                          <div class="row mb-3" style="border: 1px dashed blue;padding-top:5px;margin-bottom:10px">
                              <label for="nickname" class="col-md-4 col-form-label text-md-end">{{ __('Nickname') }}</label>

                              <div class="col-md-6">
                                  <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ $deceased->nickname }}" autocomplete="nickname" autofocus>

                                  @error('nickname')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="col-md-6" style="margin-left:10%;margin-top:10px;width:80%">
                                When entering a nickname:
                                <ul>
                                  <li>
                                    No need to surround the nicknames with quotation marks ("). This will be entered automatically
                                  </li>
                                  <li>
                                    Multiple nicknames can be entered, but they MUST be seperated by semicolons (;)
                                  </li>
                                  <li>
                                    Only the first nickname will be commonly included on the individual's name. Any other nicknames will only be seen in their individual profile.
                                  </li>
                                </ul>
                              </div>
                          </div>

                          <div style="border: 1px dashed blue;margin-bottom:10px">
                            <div class="mb-3" style="margin-left:10%;margin-top:10px;width:80%">
                              <b>Date of Birth</b>
                              <div style="display:flex">
                                <span class="row mb-5">
                                    <span class="col-md-5">
                                        Month:</br>
                                        <input id="dobMonth" type="string" class="form-control @error('dob_month') is-invalid @enderror" name="dob_month" minlength="2" maxlength="2"
                                        value="{{ $deceased->dob_month }}" placeholder="MM" autocomplete="dobMonth" autofocus>

                                        @error('dob_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </span>
                                </span>
                                <span class="row mb-5">
                                    <span class="col-md-5">
                                        Day:</br>
                                        <input id="dobDay" type="string" class="form-control @error('dob_day') is-invalid @enderror" name="dob_day" minlength="2" maxlength="2"
                                        value="{{ $deceased->dob_day }}" placeholder="DD" autocomplete="dobDay" autofocus>

                                        @error('dob_day')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </span>
                                </span>
                                <span class="row mb-5">
                                    <span class="col-md-5">
                                        Year:</br>
                                        <input id="dobYear" type="string" class="form-control @error('dob_year') is-invalid @enderror" name="dob_year" minlength="4" maxlength="4"
                                        value="{{ $deceased->dob_year }}" placeholder="YYYY" autocomplete="dobYear" autofocus>

                                        @error('dob_year')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </span>
                                </span>
                              </div>
                            </div>
                            <div class="mb-3" style="margin-left:10%;margin-top:10px;width:80%">
                              <b>Date of Death</b>
                              <div style="display:flex">
                                <span class="row mb-5">
                                    <span class="col-md-5">
                                        Month:</br>
                                        <input id="dodMonth" type="string" class="form-control @error('dod_month') is-invalid @enderror" name="dod_month" minlength="2" maxlength="2"
                                        value="{{ $deceased->dod_month }}" placeholder="MM" autocomplete="dodMonth" autofocus>

                                        @error('dod_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </span>
                                </span>
                                <span class="row mb-5">
                                    <span class="col-md-5">
                                        Day:</br>
                                        <input id="dodDay" type="string" class="form-control @error('dod_day') is-invalid @enderror" name="dod_day" minlength="2" maxlength="2"
                                        value="{{ $deceased->dod_day }}" placeholder="DD" autocomplete="dodDay" autofocus>

                                        @error('dod_day')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </span>
                                </span>
                                <span class="row mb-5">
                                    <span class="col-md-5">
                                        Year:</br>
                                        <input id="dodYear" type="string" class="form-control @error('dod_year') is-invalid @enderror" name="dod_year" minlength="4" maxlength="4"
                                        value="{{ $deceased->dod_year }}" placeholder="YYYY" autocomplete="dodYear" autofocus>

                                        @error('dod_year')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </span>
                                </span>
                              </div>
                            </div>
                            <div class="row mb-3" style="margin-left:10%">
                                IMPORTANT!: If you are entering a day or month, then it must be TWO digits long. If entering a year, then it must be FOUR digits. For example, the date 'Aug. 8th, 1934' would have the month as 09, the day as 08, and the year as 1934.
                            </div>
                          </div>

                          <div class="row mb-3">
                              <label for="father" class="col-md-4 col-form-label text-md-end">{{ __("Father's Name") }}</label>

                              <div class="col-md-6">
                                  <input id="father" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ $deceased->father_name }}" autocomplete="father" autofocus>

                                  @error('father_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="mother" class="col-md-4 col-form-label text-md-end">{{ __("Mother's Name") }}</label>

                              <div class="col-md-6">
                                  <input id="mother" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ $deceased->mother_name }}" autocomplete="mother" autofocus>

                                  @error('mother_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="title" class="col-md-4 col-form-label text-md-end">{{ __("Title") }}</label>

                              <div class="col-md-6">
                                  <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $deceased->title }}" autocomplete="title" autofocus>

                                  @error('title')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="vocation" class="col-md-4 col-form-label text-md-end">{{ __("Vocation") }}</label>

                              <div class="col-md-6">
                                  <select id="vocation" class="@error('map') is-invalid @enderror" name="vocation">
                                    @if ($deceased->vocation == null)
                                      <option selected value="null">
                                        None
                                      </option>
                                      <option value="Priest">
                                        Priest
                                      </option>
                                      <option value="Nun">
                                        Nun
                                      </option>
                                      <option value="Monk">
                                        Monk
                                      </option>
                                      <option value="Deacon">
                                        Deacon
                                      </option>
                                    @else
                                      <option value="null">
                                        None
                                      </option>
                                      <option
                                        @if ($deceased->vocation == 'Priest')
                                          selected
                                        @endif
                                        value="Priest">
                                        Priest
                                      </option>
                                      <option
                                        @if ($deceased->vocation == 'Nun')
                                          selected
                                        @endif
                                        value="Nun">
                                        Nun
                                      </option>
                                      <option
                                        @if ($deceased->vocation == 'Monk')
                                          selected
                                        @endif
                                        value="Monk">
                                        Monk
                                      </option>
                                      <option
                                        @if ($deceased->vocation == 'Deacon')
                                          selected
                                        @endif
                                        value="Deacon">
                                        Deacon
                                      </option>
                                    @endif
                                  </select>

                                  @error('vocation')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="on_tombstone" class="col-md-4 col-form-label text-md-end">{{ __('Words on the Tombstone') }}</label>

                              <div class="col-md-6">
                                  <!-- <input id="onTombstone" type="text" class="form-control @error('on_tombstone') is-invalid @enderror" name="on_tombstone" value="{{ old('on_tombstone') }}" autocomplete="onTombstone" autofocus> -->
                                  <textarea id="onTombstone" type="text" class="form-control @error('on_tombstone') is-invalid @enderror" name="on_tombstone" autocomplete="onTombstone" autofocus rows="4">{{ $deceased->on_tombstone }}</textarea>

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
                                  <input id="children" type="text" class="form-control @error('children') is-invalid @enderror" name="children" value="{{ $deceased->children }}" maxlength="2000" autocomplete="children" autofocus>

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
                                      name="action"
                                      value="profile">
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
                                      name="action"
                                      value="tombstone">
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

                              <label for="mapPhoto" class="col-md-4 col-form-label text-md-end">{{ __('Map Zone') }}</label>

                              <div id="mapPhoto" class="col-md-6">
                                <div class="form-control">
                                  @if ($deceased->zone)
                                    <img class="img-thumbnail" src="/images/overview_{{ $deceased->zone }}.jpg">
                                  @else
                                    <img class="img-thumbnail" src="/images/overview_zone.jpg"/>
                                  @endif
                                </div>
                                <div class="form-control">
                                  <div>
                                    Change Zone
                                  </div>
                                  <!-- <input id="map" type="file" class="form-control @error('map') is-invalid @enderror" name="map_photo" value="{{ old('map_photo') }}"> -->
                                  <select id="map" class="@error('map') is-invalid @enderror" name="zone">
                                    <option value="null"
                                      @if ($deceased->zone == null)
                                        selected
                                      @endif
                                    >
                                      Unknown
                                    </option>
                                    <option value="nw"
                                      @if ($deceased->zone == "nw")
                                        selected
                                      @endif
                                    >
                                      North West (NW)
                                    </option>
                                    <option value="nc"
                                      @if ($deceased->zone == "nc")
                                        selected
                                      @endif
                                    >
                                      North Central (NC)
                                    </option>
                                    <option value="ne"
                                      @if ($deceased->zone == "ne")
                                        selected
                                      @endif
                                    >
                                      North East (NE)
                                    </option>
                                    <option value="wc"
                                      @if ($deceased->zone == "wc")
                                        selected
                                      @endif
                                    >
                                      West Central (WC)
                                    </option>
                                    <option value="c"
                                      @if ($deceased->zone == "c")
                                        selected
                                      @endif
                                    >
                                      Central (C)
                                    </option>
                                    <option value="ec"
                                      @if ($deceased->zone == "ec")
                                        selected
                                      @endif
                                    >
                                      East Central (EC)
                                    </option>
                                    <option value="sw"
                                      @if ($deceased->zone == "sw")
                                        selected
                                      @endif
                                    >
                                      South West (SW)
                                    </option>
                                    <option value="sc"
                                      @if ($deceased->zone == "sc")
                                        selected
                                      @endif
                                    >
                                      South Central (SC)
                                    </option>
                                    <option value="se"
                                      @if ($deceased->zone == "se")
                                        selected
                                      @endif
                                    >
                                      South East (SE)
                                    </option>
                                  </select>
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

                          <div class="row mb-3">
                              <label for="public_notes" class="col-md-4 col-form-label text-md-end">{{ __('Public Notes') }}</label>

                              <div class="col-md-6">
                                  <!-- <input id="onTombstone" type="text" class="form-control @error('on_tombstone') is-invalid @enderror" name="on_tombstone" value="{{ old('on_tombstone') }}" autocomplete="onTombstone" autofocus> -->
                                  <textarea id="public_notes" type="text" class="form-control @error('public_notes') is-invalid @enderror" name="public_notes" autocomplete="public_notes" autofocus rows="4" maxlength="10000" placeholder="These notes WILL be visible on the website.">{{ $deceased->public_notes }}</textarea>

                                  @error('public_notes')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="private_notes" class="col-md-4 col-form-label text-md-end">{{ __('Private Notes') }}</label>

                              <div class="col-md-6">
                                  <!-- <input id="onTombstone" type="text" class="form-control @error('on_tombstone') is-invalid @enderror" name="on_tombstone" value="{{ old('on_tombstone') }}" autocomplete="onTombstone" autofocus> -->
                                  <textarea id="private_notes" type="text" class="form-control @error('private_notes') is-invalid @enderror" name="admin_notes" autocomplete="private_notes" autofocus rows="4" maxlength="10000" placeholder="These notes will NOT be visible on the website.">{{ $deceased->admin_notes }}</textarea>

                                  @error('private_notes')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" name="action" value="update" class="btn btn-primary">
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
