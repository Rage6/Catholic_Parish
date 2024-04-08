@extends('layouts.master')
  @section('content')
    <div class="riteSection sectionBackground section primaryFont">
      <div class="backBttn">
        <a href="{{ route('cemetery.index') }}" style="color:white"><< BACK</a>
      </div>
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
  @endsection
