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
      <div>
        Feel free to search for a specific individual amongst our cemetery's deceased members.
      </div>
      <div>
        <div class="searchTool">
          <div>Search By Name:</div>
          <input id="nameInput" name="searchDead" type="text" placeholder="First, last, or maiden"/>
        </div>
        <div class="resultBox">
          <div class="noResults" id="noResults">
            No results
          </div>
          <div class="resultList">
            @foreach ($all_deceased as $one_deceased)
              @if ($one_deceased->is_deceased == 1)
                <div
                  class="resultRow"
                  data-id="{{ $one_deceased->id }}"
                  data-first="{{ $one_deceased->first_name }}"
                  data-last="{{ $one_deceased->last_name }}"
                  @if ($one_deceased->maiden_name)
                    data-maiden="{{ $one_deceased->maiden_name }}"
                  @endif
                >
                  <div>
                    {{ $one_deceased->first_name }}
                    @if ($one_deceased->maiden_name)
                      {{ "(".$one_deceased->maiden_name.") " }}
                    @endif
                    {{ $one_deceased->last_name }}
                  </div>
                  <div>
                    {{ \Illuminate\Support\Str::limit($one_deceased->date_of_birth,4,$end='') }} - {{ \Illuminate\Support\Str::limit($one_deceased->date_of_death,4,$end='') }}
                  </div>
                </div>
              @endif
            @endforeach
          </div>
        </div>
      </div>
      <div>
        Clicking on their name will provide you their basic information, location, and photos (if available).
      </div>
    </div>
    <div class="basicInfoSection sectionBackground section primaryFont">
      <div class="sectionTitle">
        When Visiting
      </div>
    </div>
    <div class="riteSection sectionBackground section primaryFont">
      <div class="sectionTitle">
        Funeral Rite
      </div>
      <p>
        The Catholic funeral rite is divided into several stations, or parts, each with its own purpose. For this reason we recommend following the complete structure and making use of each station.
      </p>
      <div>
        <div class="riteSubtitle">
          Vigil Service (Wake)
        </div>
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
      <div>
        <div class="riteSubtitle">
          Funeral Liturgy
        </div>
        <p>
          The funeral liturgy is the central liturgical celebration of the Christian community for the deceased. When one of its members dies, the Church encourages the celebration of the funeral liturgy at a Mass. When Mass cannot be celebrated, a funeral liturgy outside Mass can be celebrated at the church or in the funeral home.
        </p>
        <p>
          At the funeral liturgy, the Church gathers with the family and friends of the deceased to give praise and thanks to God for Christ's victory over sin and death, to commend the deceased to God's tender mercy and compassion, and to seek strength in the proclamation of the Paschal Mystery. The funeral liturgy, therefore, is an act of worship, and not merely an expression of grief.
        </p>
      </div>
      <div>
        <div class="riteSubtitle">
          Rite of Committal (Burial or Interment)
        </div>
        <p>
          The Rite of Committal, the conclusion of the funeral rite, is the final act of the community of faith in caring for the body of its deceased member. It should normally be celebrated at the place of committal, that is, beside the open grave or place of interment. In committing the body to its resting place, the community expresses the hope that, with all those who have gone before us marked with the sign of faith, the deceased awaits the glory of the resurrection. The Rite of Committal is an expression of the communion that exists between the Church on earth and the Church in heaven: the deceased passes with the farewell prayers of the community of believers into the welcoming company of those who need faith no longer, but see God face-to-face.
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
        Available Plots
      </div>
      @if ($open_plot_count > 0)
        <div>
          At this time, there
            @if ($open_plot_count != 1)
              are {{ $open_plot_count }} available plots.
            @else
              is {{ $open_plot_count }} available plot.
            @endif
        </div>
        <div class="emptyPlotBox">
          <div class="plotList">
            @foreach ($all_deceased as $one_deceased)
              @if ($one_deceased->purchased_by == null && $one_deceased->first_name == "EMPTY" && $one_deceased->last_name == "PLOT")
                <div
                  class="plotsRow"
                  data-id="{{ $one_deceased->id }}"
                >
                  <div>
                    {{ $one_deceased->first_name }} {{ $one_deceased->last_name }}
                  </div>
                </div>
              @endif
            @endforeach
          </div>
        </div>
      @else
        <div>
          There are no available plots at this time.
        </div>
      @endif
    </div>
    <div class="contactSection sectionBackground section primaryFont">
      <div class="sectionTitle">
        Contact Us
      </div>
    </div>
  @endsection
