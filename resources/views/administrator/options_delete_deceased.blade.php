@extends('layouts.admin_list')

@section('list')
  <div>
    Delete one of the...
  </div>
  <a href="{{ route('cemetery.allcurrentdeletes') }}">
    <button class="btn btn-primary col-12 mb-2">
      CURRENT DECEASED
    </button>
  </a>
  <a href="{{ route('cemetery.allavailabledeletes') }}">
    <button class="btn btn-primary col-12 mb-2">
      AVAILABLE PLOTS
    </button>
  </a>
  <a href="{{ route('cemetery.allpurchaseddeletes') }}">
    <button class="btn btn-primary col-12 mb-2">
      PURCHASED PLOTS
    </button>
  </a>
@endsection
