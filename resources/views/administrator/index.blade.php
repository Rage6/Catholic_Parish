@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  ADMINISTRATION
                </div>
                <div class="card-body">
                  @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                  @endif
                  <div>
                    <a href="{{ route('home.index') }}">
                      <button class="btn btn-secondary">
                        << BACK
                      </button>
                    </a>
                  </div>
                  <div class="card-body">
                    @foreach ($users_permissions as $one_permission)

                        <!-- <ul class="list-group">
                          <li class="list-group-item"> -->
                            <a href="/{{ $one_permission[1] }}">
                              <button class="btn btn-primary col-12">
                                {{ $one_permission[0] }}
                              </button>
                            </a>
                          <!-- </li>
                        </ul> -->

                    @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
