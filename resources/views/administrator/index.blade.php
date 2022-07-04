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
                    <a href="{{ route('home.index') }}"><< BACK</a>
                  </div>
                  <div>
                    @foreach ($users_permissions as $one_permission)
                      @if ($one_permission[0] != "Edit Deceased" && $one_permission[0] != "Delete Deceased")
                        <div>
                          <a href="/{{ $one_permission[1] }}">
                            {{ $one_permission[0] }}
                          </a>
                        </div>
                      @endif
                    @endforeach
                    <div>
                      <u>DECEASED IN CEMETERY</u>
                    </div>
                    <div style="width:100%">
                      <div style="display:grid;grid-template-columns:25% 25% 25% 25%">
                        <div></div>
                        <div>VIEW</div>
                        <div>EDIT</div>
                        <div>DELETE</div>
                      </div>
                      @php
                        $can_edit = false;
                        $can_delete = false;
                        foreach($users_permissions as $one_check) {
                          if ($one_check[0] == 'Edit Deceased') {
                            $can_edit = true;
                          };
                          if ($one_check[0] == 'Delete Deceased') {
                            $can_delete = true;
                          };
                        };
                      @endphp
                      @foreach ($all_deceased as $one_deceased)
                        <div style="display:grid;grid-template-columns:25% 25% 25% 25%">
                          <div>
                            {{ $one_deceased->first_name }} {{ $one_deceased->last_name }}
                          </div>
                          <div>
                            <a href="deceased/{{$one_deceased->id}}/show">
                              <button>
                                VIEW
                              </button>
                            </a>
                          </div>
                          <div>
                            @if ($can_edit == true)
                              <a href="deceased/{{ $one_deceased->id }}/update">
                                <button>
                                  EDIT
                                </button>
                              </a>
                            @else
                              ----
                            @endif
                          </div>
                          <div>
                            @if ($can_delete == true)
                              <button data-deletebutton="deceased_{{ $one_deceased->id }}">
                                DELETE
                              </button>
                            @else
                              ----
                            @endif
                          </div>
                        </div>
                        @if ($can_delete == true)
                          <div data-deletebox="deceased_{{ $one_deceased->id }}" style="display:none">
                            <div>
                              Are you sure you want to permanently delete this deceased record?
                            </div>
                            <div style="display:grid;grid-template-columns:25% 25%;">
                              <button data-canceldelete="deceased_{{ $one_deceased->id }}">
                                CANCEL
                              </button>
                              <form method="POST" action="{{ route('cemetery.delete',['id' => $one_deceased->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button>
                                  DELETE
                                </button>
                              </form>
                            </div>
                          </div>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
