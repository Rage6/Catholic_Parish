@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  {{ $list_title }}
                </div>
                <div class="card-body">
                  @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                  @endif
                  <div>
                    <a href="{{ route($list_route) }}">
                      <button class="btn btn-secondary">
                        << BACK
                      </button>
                    </a>
                  </div>
                  <div class="card-body">
                    <div style="width:100%">
                      @yield('list')
                    </div>
                  </div>
                  @if (isset($all_deceased))
                    {{ $all_deceased->links('pagination::cemetery-list') }}
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
