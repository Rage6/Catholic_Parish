@extends('layouts.admin_list')

@section('list')
  <div>
    Update one of the...
  </div>
  <a href="{{ route('cemetery.allcurrentupdates') }}">
    <button class="btn btn-primary col-12 mb-2">
      CURRENT DECEASED
    </button>
  </a>
  <a href="{{ route('cemetery.allavailableupdates') }}">
    <button class="btn btn-primary col-12 mb-2">
      AVAILABLE PLOTS
    </button>
  </a>
  <a href="{{ route('cemetery.allpurchasedupdates') }}">
    <button class="btn btn-primary col-12 mb-2">
      PURCHASED PLOTS
    </button>
  </a>
@endsection
