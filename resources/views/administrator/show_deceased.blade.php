@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  {{ $deceased->first_name }} {{ $deceased->last_name }}
                </div>
                <div class="card-body">
                    @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                    @endif
                    <div>
                      <a href="{{ route('admin.index') }}"><< BACK</a>
                    </div>
                    <div>
                      <div>
                        <div class="row mb-3">

                            <label for="firstName" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div id="firstName" class="col-md-6">
                              <div class="form-control">
                                {{ $deceased->first_name }}
                              </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="middleName" class="col-md-4 col-form-label text-md-end">{{ __('Middle Name') }}</label>

                            <div id="middleName" class="col-md-6">
                              <div class="form-control">
                                {{ $deceased->middle_name }}
                              </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lastName" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div id="lastName" class="col-md-6">
                              <div class="form-control">
                                {{ $deceased->last_name }}
                              </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="suffixName" class="col-md-4 col-form-label text-md-end">{{ __('Suffix Name') }}</label>

                            <div id="suffixName" class="col-md-6">
                              <div class="form-control">
                                {{ $deceased->suffix_name }}
                              </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="maidenName" class="col-md-4 col-form-label text-md-end">{{ __('Maiden Name') }}</label>

                            <div id="maidenName" class="col-md-6">
                              <div class="form-control">
                                {{ $deceased->maiden_name }}
                              </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dateOfBirth" class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth') }}</label>

                            <div id="dateOfBirth" class="col-md-6">
                              <div class="form-control">
                                {{ $deceased->date_of_birth }}
                              </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dateOfDeath" class="col-md-4 col-form-label text-md-end">{{ __('Date of Death') }}</label>

                            <div id="dateOfDeath" class="col-md-6">
                              <div class="form-control">
                                {{ $deceased->date_of_death }}
                              </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div id="description" class="col-md-6">
                              <div class="form-control">
                                {{ $deceased->personal_description }}
                              </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="on_tombstone" class="col-md-4 col-form-label text-md-end">{{ __('Words on the Tombstone') }}</label>

                            <div id="on_tombstone" class="col-md-6">
                              <div class="form-control">
                                {{ $deceased->on_tombstone }}
                              </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="spouse" class="col-md-4 col-form-label text-md-end">{{ __('Spouse') }}</label>

                            <div id="spouse" class="col-md-6">
                              <div class="form-control">
                                {{ $deceased->spouse }}
                              </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="children" class="col-md-4 col-form-label text-md-end">{{ __('Children') }}</label>

                            <div id="children" class="col-md-6">
                              <div class="form-control">
                                {{ $deceased->children }}
                              </div>
                            </div>
                        </div>

                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
