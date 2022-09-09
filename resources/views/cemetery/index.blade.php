@extends('layouts.master')
  @section('content')
    <div class="introSection sectionBackground">
      <div class="introTitle primaryFont">
        PARISH CEMETERY
      </div>
      <div class="introSubtitle">
        <i>Eternal rest grant unto them, O Lord, and let perpetual light shine upon them</i>
      </div>
    </div>
    <div class="searchSection sectionBackground section primaryFont">
      <div class="sectionTitle">
        Find a Grave
      </div>
      <p class="searchInfo">
        Our records make it easy to browse the entire list of graves, while the search tool helps you quickly find a specific grave.
      </p>
      <div class="listTools">
        <div>
          <a href="{{ route('cemetery.list') }}">
            <div class="browseBttn">
              <div>
                BROWSE RECORDS
              </div>
            </div>
          </a>
          <div class="orDivider">
            -- OR --
          </div>
          <div class="searchBox">
            <div style="color:gold">
              FIND BY NAME
            </div>
            <form method="POST" action="{{ route('cemetery.search') }}" enctype="multipart/form-data">
              @csrf
              <div>
                <input name="name_type" placeholder="First, Last, or Maiden">
              </div>
              <button>
                SEARCH
              </button>
            </form>
          </div>
        </div>
        <div class="all_grids">
          @php
            $num = 0;
            $zone_index = 0;
            $zone_list = [1,2,5,3,4];
            $last_index = count($zone_list) - 1;
          @endphp
          @foreach ($random_list as $one_random)
            @if ($zone_index == 0)
              <div class="zoneGridLayout">
            @endif
                <div class="deceased_animation zone_{{ $zone_list[$zone_index] }}" style="animation-name: name_{{ $num }}">
                  {{ $one_random[0] }}</br>{{ $one_random[1] }}
                </div>
            @if ($zone_index == $last_index)
              </div>
            @endif
            @php
              $num = $num + 1;
              if ($zone_index >= $last_index) {
                $zone_index = 0;
              } else {
                $zone_index++;
              };
            @endphp
          @endforeach
        </div>
      </div>
    </div>
    <div class="basicInfoSection sectionBackground section primaryFont">
      <div class="sectionTitle">
        When Visiting
      </div>
      <div class="basicInfoList">
        <p>
          <u>Obey the Hours</u>: Our cemetery is open from dawn until dusk. Try not to remain in the cemetery after dark.
        </p>
        <p>
          <u>Speak Softly & Politely</u>: Remember to keep your voice down when having conversations, and avoid using bad language.
        </p>
        <p>
          <u>Drive with Care</u>: When starting to driving around the cemetery, turn to the right. Make sure to follow the roadway and remain off the grass. Drive slowly, and watch out for people who might not be paying attention.
        </p>
        <p>
          <u>Respect the Graves</u>: Don't touch any monuments or headstones; this is not only disrespectful, but may cause damage to the memorials, especially older ones. Never remove anything from a gravestone, such as flowers, coins, or tributes that have been left by family.
        </p>
        <p>
          <u>Look After Your Children</u>: If you bring children, make sure to keep a close eye on them and keep them from running, yelling, playing or climbing on graves and monuments. Teach them to act in a respectful and considerate manner.
        </p>
        <!-- <p>
          <u>Speak Softly & Politely</u>: Be respectful to other mourners: remember to keep your voice down when having conversations, and avoid using bad language.
        </p> -->
        <p>
          <u>Lower the Volume</u>: If you choose to bring it with you, take a moment to ensure that your cellphone is turned off. Avoid having phone conversations, as voices tend to carry in open spaces. Make sure to turn off your car stereo while driving or parking in the cemetery.
        </p>
        <p>
          <u>Be Respectful of Services and Other Mourners</u>: If a funeral is occurring, take care not to get in the way of processions. Never take photos of strangers at a funeral or visiting a gravesite; it is extremely disrespectful to them in their time of grief. Respect their privacy and give them their space.
        </p>
        <p>
          <u>Don't Leave Trash Behind</u>: Litter creates extra work for the caretakers, and is disrespectful to both other visitors and those who are buried there. Hang onto your trash and take it with you when you leave.
        </p>
      </div>
    </div>
    <div class="riteSection sectionBackground section primaryFont">
      <div class="sectionTitle">
        Funeral Rite
      </div>
      <p>
        The Catholic funeral rite is divided into several stations, or parts, each with its own purpose. For this reason we recommend following the complete structure and making use of each station.
      </p>
      <div class="riteSubtitleChild">
        1. Vigil Service (Wake)
      </div>
      <div class="riteSubtitleContent">
        <div class="riteImage riteImageOne"></div>
        <p>
          "At the vigil, the Christian community keeps watch with the family in prayer to the God of mercy and finds strength in Christ's presence" (Order of Christian Funerals, no. 56).
        </p>
        <p>
          The Vigil Service usually takes place during the period of visitation and viewing at the funeral home. It is a time to remember the life of the deceased and to commend him/her to God. In prayer we ask God to console us in our grief and give us strength to support one another.
        </p>
        <p>
          The Vigil Service can take the form of a Service of the Word with readings from Sacred Scripture accompanied by reflection and prayers. It can also take the form of one of the prayers of the Office for the Dead from the Liturgy of the Hours. The clergy and your funeral director can assist in planning such service.
        </p>
        <p>
          It is most appropriate, when family and friends are gathered together for visitation, to offer time for recalling the life of the deceased. For this reason, eulogies are usually encouraged to be done at the funeral home during visitation or at the Vigil Service.
        </p>
      </div>
      <div class="riteSubtitleChild">
        2. Funeral Liturgy
      </div>
      <div class="riteSubtitleContent">
        <div class="riteImage riteImageTwo"></div>
        <p>
          The funeral liturgy is the central liturgical celebration of the Christian community for the deceased. When one of its members dies, the Church encourages the celebration of the funeral liturgy at a Mass. When Mass cannot be celebrated, a funeral liturgy outside Mass can be celebrated at the church or in the funeral home.
        </p>
        <!-- <div class="riteImage riteImageTwo"></div> -->
        <p>
          At the funeral liturgy, the Church gathers with the family and friends of the deceased to give praise and thanks to God for Christ's victory over sin and death, to commend the deceased to God's tender mercy and compassion, and to seek strength in the proclamation of the Paschal Mystery. The funeral liturgy, therefore, is an act of worship, and not merely an expression of grief.
        </p>
      </div>
      <div class="riteSubtitleChild">
        3. Rite of Committal (Burial or Interment)
      </div>
      <div class="riteSubtitleContent">
        <div class="riteImage riteImageThree"></div>
        <p>
          The Rite of Committal, the conclusion of the funeral rite, is the final act of the community of faith in caring for the body of its deceased member. It should normally be celebrated at the place of committal, that is, beside the open grave or place of interment. In committing the body to its resting place, the community expresses the hope that, with all those who have gone before us marked with the sign of faith, the deceased awaits the glory of the resurrection.
        </p>
        <!-- <div class="riteImage riteImageThree"></div> -->
        <p>
          The Rite of Committal is an expression of the communion that exists between the Church on earth and the Church in heaven: the deceased passes with the farewell prayers of the community of believers into the welcoming company of those who need faith no longer, but see God face-to-face.
        </p>
      </div>
    </div>
    <div class="historySection sectionBackground section primaryFont">
      <div class="sectionTitle">
        Cemetery History
      </div>
    </div>
    <div class="emptyPlotsInfoSection sectionBackground section primaryFont">
      <div class="sectionTitle">
        About Available Plots
      </div>
      <div>
        @if ($open_plot_count > 0)
          <div class="emptyPlotCount">
            At this time, there
              @if ($open_plot_count != 1)
                are <b>{{ $open_plot_count }}</b> available plots.
              @else
                is <b>{{ $open_plot_count }}</b> available plot.
              @endif
            Each plot costs a one-time payment of $___. This cost is to assist the respectful maintenance of the cemetery. You can claim a plot by messaging the Cemetery Manager in the "Contact Us" information below.
          </div>
        @else
          <div class="emptyPlotCount">
            There are no available plots at this time. Any questions about the cemetery can be messaged to the Cemetery Manager by the "Contact Us" information below.
          </div>
        @endif
        <p>
          There are some common questions when considering a plot or arranging a burial in our cemetery. Please review the below list of questions because they may answer your confusion. If your answer is not satisfied, feel free to message the Cemetery Manager in the "Contact Us" information below.
        </p>
        <i>
          What is different about a Catholic cemetery?
        </i>
        <p>
          There are basically only two places that the Catholic Church consecrates as Holy Ground: a church and a cemetery. But why a cemetery? It represents the continuation, even in death, of the harmony and spiritual alliance which makes all Catholics members of one great family, thereby constituting it an actual family plot. As ministries of the Church, Catholic cemeteries expresses the link of community between all the faithful living and dead—the Communion of Saints.
        </p>
        <i>Who can be buried in a Catholic Cemetery?</i>
        <p>
          Baptized Catholics may be buried in a Catholic cemetery. Likewise, non-Catholic spouses and other family members of Catholics may be buried in a Catholic Cemetery.
        </p>
        <i>Does the Catholic Church permit cremation?</i>
        <p>
          Yes.  Cremation is permitted, although the Church does prefer the body to be present at the funeral Mass.
        </p>
      </div>
    </div>
    <div class="contactSection sectionBackground section primaryFont">
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
