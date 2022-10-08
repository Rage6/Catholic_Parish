@extends('layouts.admin_list')

@section('list')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  DELETE FROM CEMETERY RECORDS
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
                      <div style="display:grid;grid-template-columns:50% 50%">
                        <div>NAME:</div>
                        <div>DELETE</div>
                      </div>
                      @foreach ($all_deceased as $one_deceased)
                        @if ($one_deceased->is_deceased)
                        <div style="display:grid;grid-template-columns:50% 50%">
                          <div>
                            {{ $one_deceased->first_name }} {{ $one_deceased->last_name }} @if ($one_deceased->suffix_name) {{ $one_deceased->suffix_name }} @endif
                          </div>
                          <div>
                            <a href="deceased/{{ $one_deceased->id }}/delete">
                              <button>
                                DELETE
                              </button>
                            </a>
                          </div>
                        </div>
                        @endif
                      @endforeach
                    </div>
                  </div>
                  <div class="card-body">
                    <div>
                      <u>PURCHASED PLOTS</u>
                    </div>
                    <div style="width:100%">
                      <div style="display:grid;grid-template-columns:50% 50%">
                        <div>NAME:</div>
                        <div>DELETE</div>
                      </div>
                      @foreach ($all_deceased as $one_deceased)
                        @if (!$one_deceased->is_deceased && $one_deceased->purchased_by)
                          <div style="display:grid;grid-template-columns:50% 50%">
                            <div>
                              {{ $one_deceased->first_name }} {{ $one_deceased->last_name }}
                            </div>
                            <div>
                              <a href="deceased/{{ $one_deceased->id }}/delete">
                                <button>
                                  DELETE
                                </button>
                              </a>
                            </div>
                          </div>
                        @endif
                      @endforeach
                    </div>
                  </div>
                  <div class="card-body">
                    <div>
                      <u>AVAILABLE PLOTS</u>
                    </div>
                    <div style="width:100%">
                      <div style="display:grid;grid-template-columns:50% 50%">
                        <div>NAME:</div>
                        <div></div>
                      </div> -->
                      @foreach ($all_deceased as $one_deceased)
                        @if (!$one_deceased->is_deceased && !$one_deceased->purchased_by)
                          <!-- <div style="display:grid;grid-template-columns:50% 50%">
                            <div> -->
                            <a href="{{ route('cemetery.deleteform',['id' => $one_deceased->id,'type' => 'available']) }}">
                              <button class="btn btn-primary col-12">
                              {{ $one_deceased->first_name }} {{ $one_deceased->last_name }}
                            </button>
                          </a>
                            <!-- </div>
                            <div>
                              <a href="deceased/{{ $one_deceased->id }}/delete">
                                <button>
                                  DELETE?
                                </button>
                              </a>
                            </div>
                          </div> -->
                        @endif
                      @endforeach
                    <!-- </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
