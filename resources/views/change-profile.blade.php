@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Change Profile') }}</div>

                    <form action="{{ route('home.change-profile') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="firstNameInput" class="form-label">First Name</label>
                                <input name="first_name" type="text" value="{{ $current_user->first_name }}" class="form-control @error('first_name') is-invalid @enderror" id="firstNameInput">
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="lastNameInput" class="form-label">Last Name</label>
                                <input name="last_name" type="text" value="{{ $current_user->last_name }}" class="form-control @error('last_name') is-invalid @enderror" id="lastNameInput">
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="suffixNameInput" class="form-label">Suffix Name</label>
                                <input name="suffix_name" type="text" value="{{ $current_user->suffix_name }}" class="form-control @error('suffix_name') is-invalid @enderror" id="suffixNameInput">
                                @error('suffix_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Email</label>
                                <input name="email" type="email" value="{{ $current_user->email }}" class="form-control @error('email') is-invalid @enderror" id="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
