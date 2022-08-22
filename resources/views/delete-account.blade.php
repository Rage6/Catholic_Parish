@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Delete Account') }}</div>
                    <form action="{{ route('home.delete-action') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="card-body">
                            <i>Are you sure?</i> THIS WILL PERMANENTLY DELETE YOUR ACCOUNT!
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-danger">
                              DELETE
                            </button>
                            <a class="btn btn-primary" href="{{ route('home.change-profile') }}">
                              Cancel
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
