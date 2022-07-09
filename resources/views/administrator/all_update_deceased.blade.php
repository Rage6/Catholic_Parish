@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  UPDATE CEMETERY RECORDS
                </div>
                <div class="card-body">
                  @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                  @endif
                  <div>
                    <a href="{{ route('admin.index') }}">
                      <button class="btn btn-secondary">
                        << BACK
                      </button>
                    </a>
                  </div>
                  <div class="card-body">
                    <div>
                      <u>DECEASED IN CEMETERY</u>
                    </div>
                    <div style="width:100%">
                      <div style="display:grid;grid-template-columns:25% 25% 25% 25%">
                        <div></div>
                        <div>VIEW</div>
                        <div>EDIT</div>
                      </div>
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
                            <a href="deceased/{{ $one_deceased->id }}/update">
                              <button>
                                EDIT
                              </button>
                            </a>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
