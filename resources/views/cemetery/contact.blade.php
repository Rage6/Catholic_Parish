@extends('layouts.master')
  @section('content')
    <div class="contactSection sectionBackground section primaryFont">
      <div class="backBttn">
        <a href="{{ route('cemetery.index') }}" style="color:white"><< BACK</a>
      </div>
      <div class="sectionTitle">
        Contact Us
      </div>
      <div class="contactGrid">
        <div>
          <p>
            Purchasing plots, making funeral arrangements, and general questions can be directed to one of the individuals below.
          </p>
          @foreach ($cem_user as $one_user)
            <div>
              {{ $one_user->first_name }} {{ $one_user->last_name }} @if ($one_user->suffix_name) {{ $one_user->suffix_name }} @endif
            </div>
            <div>
              @for ($num = 0; $num < count($one_user->cemetery_roles); $num++)
                @if ($num == 0)
                  {{ $one_user->cemetery_roles[$num] }}
                @else
                  , {{ $one_user->cemetery_roles[$num] }}
                @endif
              @endfor
            </div>
          @endforeach
        </div>
        <div class="contactForm">
          <form method="post" action="{{ route('cemetery.messaging') }}" enctype="multipart/form-data">
            @csrf
            <div>
              <div>
                Your message is to:
              </div>
              <select name="cem_recipient">
                @foreach ($cem_user as $one_user)
                  <option value="{{ $one_user->id }}">
                    {{ $one_user->first_name }} {{ $one_user->last_name }}
                    @if ($one_user->suffix_name)
                      {{ $one_user->suffix_name }}
                    @endif
                    (
                    @for ($num = 0; $num < count($one_user->cemetery_roles); $num++)
                      @if ($num == 0)
                        {{$one_user->cemetery_roles[$num]}}
                      @else
                        , {{$one_user->cemetery_roles[$num]}}
                      @endif
                    @endfor
                    )
                  </option>
                @endforeach
              </select>
              <div>
                <div>
                  We should reply to:
                </div>
                @guest
                  <input type="email" name="cem_reply_email" placeholder="Enter your email here" required>
                @else
                  <input type="email" name="cem_reply_email" value="{{ Auth::user()->email }}" required>
                @endguest
              </div>
              <div>
                <div>
                  Your message is:
                </div>
                <textarea name="cem_message" required>
                </textarea>
              </div>
              <button>SEND</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endsection
