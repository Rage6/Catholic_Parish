@extends('layouts.master')
  @section('content')
    <div class="introSection sectionBackground">
      <div class="introName">
        {{ env('APP_NAME') }}
      </div>
      <div class="introTitle primaryFont">
        PARISH CEMETERY
      </div>
      <div class="introSubtitle">
        <i>Eternal rest grant unto them, O Lord, and let perpetual light shine upon them</i>
      </div>
    </div>
    <div class="videoParent">
      <video
        src="/images/Cemetery_montage_low.mp4"
        autoplay
        loop
        muted
        playsinline>
      </video>
      <div class="videoImages">
        <div class="imageBlank singleImage"></div>
        <div class="imageOne singleImage"></div>
        <div class="imageTwo singleImage"></div>
        <div class="imageThree singleImage"></div>
        <div class="imageFour singleImage"></div>
      </div>
    </div>

    <!--  -->

  @endsection
