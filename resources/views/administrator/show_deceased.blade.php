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

                        @if ($deceased->middle_name)
                          <div class="row mb-3">
                              <label for="middleName" class="col-md-4 col-form-label text-md-end">{{ __('Middle Name') }}</label>

                              <div id="middleName" class="col-md-6">
                                <div class="form-control">
                                  {{ $deceased->middle_name }}
                                </div>
                              </div>
                          </div>
                        @endif

                        <div class="row mb-3">
                            <label for="lastName" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div id="lastName" class="col-md-6">
                              <div class="form-control">
                                {{ $deceased->last_name }}
                              </div>
                            </div>
                        </div>

                        @if ($deceased->suffix_name)
                          <div class="row mb-3">
                              <label for="suffixName" class="col-md-4 col-form-label text-md-end">{{ __('Suffix Name') }}</label>

                              <div id="suffixName" class="col-md-6">
                                <div class="form-control">
                                  {{ $deceased->suffix_name }}
                                </div>
                              </div>
                          </div>
                        @endif

                        @if ($deceased->maiden_name)
                          <div class="row mb-3">
                              <label for="maidenName" class="col-md-4 col-form-label text-md-end">{{ __('Maiden Name') }}</label>

                              <div id="maidenName" class="col-md-6">
                                <div class="form-control">
                                  {{ $deceased->maiden_name }}
                                </div>
                              </div>
                          </div>
                        @endif

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

                        @if ($deceased->on_tombstone)
                          <div class="row mb-3">
                              <label for="on_tombstone" class="col-md-4 col-form-label text-md-end">{{ __('Words on the Tombstone') }}</label>

                              <div id="on_tombstone" class="col-md-6">
                                <div class="form-control">
                                  {{ $deceased->on_tombstone }}
                                </div>
                              </div>
                          </div>
                        @endif

                        @if ($deceased->spouse)
                          <div class="row mb-3">
                              <label for="spouse" class="col-md-4 col-form-label text-md-end">{{ __('Spouse') }}</label>

                              <div id="spouse" class="col-md-6">
                                <div class="form-control">
                                  {{ $deceased->spouse }}
                                </div>
                              </div>
                          </div>
                        @endif

                        @if ($deceased->children)
                          <div class="row mb-3">
                              <label for="children" class="col-md-4 col-form-label text-md-end">{{ __('Children') }}</label>

                              <div id="children" class="col-md-6">
                                <div class="form-control">
                                  {{ $deceased->children }}
                                </div>
                              </div>
                          </div>
                        @endif

                        <div class="row mb-3">
                            <label for="purchased" class="col-md-4 col-form-label text-md-end">{{ __('Has this plot been purchased for this person?') }}</label>

                            <div id="purchased" class="col-md-6">
                              <div class="form-control">
                                @if ($deceased->is_purchased == 1)
                                  YES
                                @else
                                  NO
                                @endif
                              </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deceased" class="col-md-4 col-form-label text-md-end">{{ __('Is this person deceased and in this plot?') }}</label>

                            <div id="deceased" class="col-md-6">
                              <div class="form-control">
                                @if ($deceased->is_deceased == 1)
                                  YES
                                @else
                                  NO
                                @endif
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
