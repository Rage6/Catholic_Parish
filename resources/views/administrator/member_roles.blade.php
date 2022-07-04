@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  ROLES: {{ $member->first_name }} {{ $member->last_name }}
                </div>
                <div class="card-body">
                    @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                    @endif
                    <div>
                      <a href="{{ route('admin.roles') }}"><< BACK</a>
                    </div>
                    <div>
                      @foreach ($all_roles as $one_role)
                        <div>
                          <div>{{ $one_role->title }}</div>
                          <div>
                            @php $active = false @endphp
                            @foreach ($all_user_roles as $one_user_role)
                              @if ($one_role->title == $one_user_role->title)
                                @php $active = true @endphp
                              @endif
                            @endforeach
                            @if ($active == true)
                              YES
                            @else
                              NO
                            @endif
                          </div>
                        </div>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
