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
                        <button>+ EMPTY PLOT</button>
                      </form>
                    </div>
                    <div>
                      <div>
                        <form method="POST" action="{{ route('cemetery.create') }}">
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
                              <label for="dateOfBirth" class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth') }}</label>

                              <div class="col-md-6">
                                  <input id="dateOfBirth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="dateOfBirth" autofocus>

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
                                  <input id="dateOfDeath" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_death" value="{{ old('date_of_death') }}" required autocomplete="dateOfDeath" autofocus>

                                  @error('date_of_death')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="row mb-3">
                              <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                              <div class="col-md-6">
                                  <input id="description" type="text" class="form-control @error('personal_description') is-invalid @enderror" name="personal_description" value="{{ old('personal_description') }}" autocomplete="description" autofocus>

                                  @error('personal_description')
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
                                  <input id="children" type="text" class="form-control @error('children') is-invalid @enderror" name="children" value="{{ old('children') }}" autocomplete="children" autofocus>

                                  @error('children')
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
