@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  ADD DECEASED TO CEMETERY
                </div>
                <div class="card-body">
                    @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                    @endif
                    <div style="display:flex;justify-content:space-between">
                      <a href="{{ route('admin.index') }}"><< BACK</a>
                      <form method="POST" action="{{ route('cemetery.empty') }}">
                        @csrf
                        <button>+ ADD EMPTY PLOT</button>
                      </form>
                    </div>
                    <div>
                      <div>
                        <form method="POST" action="{{ route('cemetery.create') }}" enctype="multipart/form-data">
                          @csrf
                          <div class="row mb-3">
                              <label for="firstName" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                              <div class="col-md-6">
                                  <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="firstName" autofocus>

                                  @error('first_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="middleName" class="col-md-4 col-form-label text-md-end">{{ __('Middle Name') }}</label>

                              <div class="col-md-6">
                                  <input id="middleName" type="text" class="form-control @error('name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" autocomplete="middleName" autofocus>

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
                                  <input id="lastName" type="text" class="form-control @error('name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="lastName" autofocus>

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
                                  <input id="suffixName" type="text" class="form-control @error('suffix_name') is-invalid @enderror" name="suffix_name" value="{{ old('suffix_name') }}" autocomplete="suffixName" autofocus placeholder="Jr, IV, Sr, etc.">

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
                                  <input id="maidenName" type="text" class="form-control @error('maiden_name') is-invalid @enderror" name="maiden_name" value="{{ old('maiden_name') }}" autocomplete="maidenName" autofocus>

                                  @error('maiden_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="preference" class="col-md-4 col-form-label text-md-end">{{ __('Did they go by their middle name') }}</label>

                              <div class="col-md-6">
                                  <select id="preference" name="prefers_middle_name">
                                    <option value="0" selected>NO</option>
                                    <option value="1">YES</option>
                                  </select>
                              </div>
                          </div>

                          <div class="row mb-3" style="border: 1px dashed blue;padding-top:5px;margin-bottom:10px">
                              <label for="nickname" class="col-md-4 col-form-label text-md-end">{{ __('Nickname') }}</label>

                              <div class="col-md-6">
                                  <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" autocomplete="nickname" autofocus>

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

                          <div class="row mb-3">
                            <div style="margin-left:10%;margin-top:10px;width:80%">
                              <u>Date of Birth</u>
                              <div style="display:grid;grid-template-columns:40% 60%">
                                <div>Month:</div>
                                <input id="dobMonth" type="string" class="form-control @error('dob_month') is-invalid @enderror" name="dob_month" minlength="2"  maxlength="2" placeholder="MM" autocomplete="dobMonth" autofocus>
                                @error('dob_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div>Day:</div>
                                <input id="dobDay" type="string" class="form-control @error('dob_day') is-invalid @enderror" name="dob_day" minlength="2"  maxlength="2" placeholder="DD" autocomplete="dobDay" autofocus>
                                @error('dob_day')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div>Year:</div>
                                <input id="dobYear" type="string" class="form-control @error('dob_year') is-invalid @enderror" name="dob_year" minlength="4"  maxlength="4" placeholder="YYYY" autocomplete="dobYear" autofocus>
                                @error('dob_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                            </div>
                            <div class="mb-3" style="margin-left:10%;margin-top:10px;width:80%">
                              <u>Date of Death</u>
                              <div style="display:grid;grid-template-columns:40% 60%">
                                <div>Month:</div>
                                <input id="dodMonth" type="string" class="form-control @error('dod_month') is-invalid @enderror" name="dod_month" minlength="2"  maxlength="2" placeholder="MM" autocomplete="dodMonth" autofocus>
                                @error('dod_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div>Day:</div>
                                <input id="dodDay" type="string" class="form-control @error('dod_day') is-invalid @enderror" name="dod_day" minlength="2" maxlength="2" placeholder="DD" autocomplete="dodDay" autofocus>
                                @error('dod_day')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div>Year:</div>
                                <input id="dodYear" type="string" class="form-control @error('dod_year') is-invalid @enderror" name="dod_year" minlength="4" maxlength="4" placeholder="YYYY" autocomplete="dodYear" autofocus>
                                @error('dod_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                            </div>
                            <div class="mb-3" style="margin-left:10%;width:80%">
                                IMPORTANT!: If you are entering a day or month, then it must be TWO digits long. If entering a year, then it must be FOUR digits. For example, the date 'Aug. 8th, 1934' would have the month as 09, the day as 08, and the year as 1934.
                            </div>
                          </div>

                          <div class="row mb-3">
                              <label for="father" class="col-md-4 col-form-label text-md-end">{{ __("Father's Name") }}</label>

                              <div class="col-md-6">
                                  <input id="father" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name') }}" autocomplete="father" autofocus>

                                  @error('father_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="father" class="col-md-4 col-form-label text-md-end">{{ __("Mother's Name") }}</label>

                              <div class="col-md-6">
                                  <input id="father" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ old('mother_name') }}" autocomplete="father" autofocus>

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
                                  <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

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
                                  <!-- <input id="map" type="text" class="form-control @error('map') is-invalid @enderror" name="map_photo" value="{{ old('map_photo') }}"> -->
                                  <select id="vocation" class="@error('map') is-invalid @enderror" name="vocation">
                                    <option value="null">
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
                                  <textarea id="onTombstone" type="text" class="form-control @error('on_tombstone') is-invalid @enderror" name="on_tombstone" value="{{ old('on_tombstone') }}" autocomplete="onTombstone" autofocus rows="4"></textarea>

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
                                  <input id="spouse" type="text" class="form-control @error('spouse') is-invalid @enderror" name="spouse" value="{{ old('spouse') }}" autocomplete="spouse" autofocus>

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
                                  <input id="children" type="text" class="form-control @error('children') is-invalid @enderror" name="children" value="{{ old('children') }}" maxlength="2000" autocomplete="children" autofocus>

                                  @error('children')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="profile" class="col-md-4 col-form-label text-md-end">{{ __('Profile Photo') }}</label>

                              <div class="col-md-6">
                                  <input id="profile" type="file" class="form-control @error('profile') is-invalid @enderror" name="profile_photo" value="{{ old('profile_photo') }}">

                                  @error('profile')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="tombstone" class="col-md-4 col-form-label text-md-end">{{ __('Tombstone Photo') }}</label>

                              <div class="col-md-6">
                                  <input id="tombstone" type="file" class="form-control @error('tombstone') is-invalid @enderror" name="tombstone_photo" value="{{ old('tombstone_photo') }}">

                                  @error('tombstone')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="map" class="col-md-4 col-form-label text-md-end">{{ __('Map Zone') }}</label>

                              <div class="col-md-6">
                                  <!-- <input id="map" type="text" class="form-control @error('map') is-invalid @enderror" name="map_photo" value="{{ old('map_photo') }}"> -->
                                  <select id="map" class="@error('map') is-invalid @enderror" name="zone">
                                    <option value="null">
                                      Unknown
                                    </option>
                                    <option value="old_a">
                                      A (Old Section)
                                    </option>
                                    <option value="old_b">
                                      B (Old Section)
                                    </option>
                                    <option value="old_c">
                                      C (Old Section)
                                    </option>
                                    <option value="old_d">
                                      D (Old Section)
                                    </option>
                                    <option value="old_e">
                                      E (Old Section)
                                    </option>
                                    <option value="old_f">
                                      F (Old Section)
                                    </option>
                                    <option value="old_g">
                                      G (Old Section)
                                    </option>
                                    <option value="old_h">
                                      H (Old Section)
                                    </option>
                                    <option value="old_i">
                                      I (Old Section)
                                    </option>
                                    <option value="old_j">
                                      J (Old Section)
                                    </option>
                                    <option value="row_1">
                                      Row 1 (New Section)
                                    </option>
                                    <option value="row_2">
                                      Row 2 (New Section)
                                    </option>
                                    <option value="row_3">
                                      Row 3 (New Section)
                                    </option>
                                    <option value="row_4">
                                      Row 4 (New Section)
                                    </option>
                                    <option value="row_5">
                                      Row 5 (New Section)
                                    </option>
                                    <option value="row_6">
                                      Row 6 (New Section)
                                    </option>
                                    <option value="row_7">
                                      Row 7 (New Section)
                                    </option>
                                    <option value="row_8">
                                      Row 8 (New Section)
                                    </option>
                                    <option value="row_9">
                                      Row 9 (New Section)
                                    </option>
                                    <option value="row_10">
                                      Row 10 (New Section)
                                    </option>
                                    <option value="row_11">
                                      Row 11 (New Section)
                                    </option>
                                    <!-- <option value="nw">
                                      North West (NW)
                                    </option>
                                    <option value="nc">
                                      North Central (NC)
                                    </option>
                                    <option value="ne">
                                      North East (NE)
                                    </option>
                                    <option value="wc">
                                      West Central (WC)
                                    </option>
                                    <option value="c">
                                      Central (C)
                                    </option>
                                    <option value="ec">
                                      East Central (EC)
                                    </option>
                                    <option value="sw">
                                      South West (SW)
                                    </option>
                                    <option value="sc">
                                      South Central (SC)
                                    </option>
                                    <option value="se">
                                      South East (SE)
                                    </option> -->
                                  </select>

                                  @error('map')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div style="margin: 10px 0 20px 0; text-align:center">
                                <i>Unsure which zone the deceased member is buried in? <a href="/zone_instructions.html" target="_blank">Click here</a> for instructions.</i>
                              </div>
                              <div>
                                <u>Overview Map</u></br>
                                <img class="img-fluid max-width" src="/images/overview_zone.jpg">
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="purchased" class="col-md-4 col-form-label text-md-end">{{ __('Is this person deceased and in this plot?') }}</label>

                              <div class="col-md-6">
                                  <select id="filled" name="is_deceased">
                                    <option value="0" selected>NO</option>
                                    <option value="1">YES</option>
                                  </select>
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="filled" class="col-md-4 col-form-label text-md-end">{{ __('Who purchased this plot?') }}</label>

                              <div class="col-md-6">
                                  <textarea name="purchased_by" class="form-control" placeholder="Include a name and any other useful information (contact information, date of purhase, etc.)"></textarea>
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="on_tombstone" class="col-md-4 col-form-label text-md-end">{{ __('Public Notes') }}</label>

                              <div class="col-md-6">
                                  <!-- <input id="onTombstone" type="text" class="form-control @error('on_tombstone') is-invalid @enderror" name="on_tombstone" value="{{ old('on_tombstone') }}" autocomplete="onTombstone" autofocus> -->
                                  <textarea id="addedNotes" type="text" class="form-control @error('public_notes') is-invalid @enderror" name="public_notes" value="{{ old('public_notes') }}" autocomplete="addedNotes" autofocus rows="4" maxlength="10000" placeholder="These notes WILL be visible on the website."></textarea>

                                  @error('public_notes')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="on_tombstone" class="col-md-4 col-form-label text-md-end">{{ __('Private Notes') }}</label>

                              <div class="col-md-6">
                                  <!-- <input id="onTombstone" type="text" class="form-control @error('on_tombstone') is-invalid @enderror" name="on_tombstone" value="{{ old('on_tombstone') }}" autocomplete="onTombstone" autofocus> -->
                                  <textarea id="addedPrivateNotes" type="text" class="form-control @error('admin_notes') is-invalid @enderror" name="admin_notes" value="{{ old('admin_notes') }}" autocomplete="addedPrivateNotes" autofocus rows="4" maxlength="10000" placeholder="These notes will NOT be visible on the website."></textarea>

                                  @error('admin_notes')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                    ADD
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
