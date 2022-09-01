@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  ROLES: {{ $member->first_name }} {{ $member->last_name }} @if ($member->suffix_name) {{ $member->suffix_name }} @endif
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
                      <form method="POST" action="{{ route('admin.assign',['id'=>$member->id]) }}">
                        @csrf

                        @foreach ($all_roles as $one_role)
                          <div style="display:grid;grid-template-columns:50% 50%;margin-bottom:50px">
                            <div>
                              {{ $one_role->title }}
                              <div>
                                @foreach ($all_role_descriptions as $one_description)
                                  @if ($one_description->role_title == $one_role->title)
                                    @if (count($one_description->permissions) > 0)
                                      <ul>
                                        @foreach ($one_description->permissions as $this_permission)
                                          <li>{{ $this_permission }}</li>
                                        @endforeach
                                      </ul>
                                    @else
                                      <i>No permissions are assigned to this role</i>
                                    @endif
                                  @endif
                                @endforeach
                              </div>
                            </div>
                            @php $active = false @endphp
                            @foreach ($all_user_roles as $one_user_role)
                              @if ($one_role->title == $one_user_role->title)
                                @php $active = true @endphp
                              @endif
                            @endforeach
                            @if ($active == true)
                              <div>
                                <select name="role_{{ $one_role->id }}">
                                  <option selected value="1">YES</option>
                                  <option value="0">NO</option>
                                </select>
                              </div>
                            @else
                              <div>
                                <select name="role_{{ $one_role->id }}">
                                  <option value="1">YES</option>
                                  <option selected value="0">NO</option>
                                </select>
                              </div>
                            @endif
                          </div>
                        @endforeach
                        <button>CHANGE</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
