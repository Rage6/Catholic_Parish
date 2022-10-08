@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  @if ($current_user->title) {{ $current_user->title }} @endif {{ $current_user->first_name }} {{ $current_user->last_name }} @if ($current_user->suffix_name) {{ $current_user->suffix_name }} @endif
                </div>
                <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  @if ($is_admin)
                    <div class="col-6 offset-6">
                      <a href="{{route('admin.index')}}">
                        <button class="btn btn-secondary">ADMINISTRATOR</button>
                      </a>
                    </div>
                  @endif
                  <div>
                    @if (count($user_roles) > 1)
                      MY ROLES:
                    @else
                      MY ROLE:
                    @endif
                  </div>
                  @foreach ($user_roles as $one_role)
                    <div>
                      {{ $one_role->title }}
                    </div>
                  @endforeach
                  <br>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
