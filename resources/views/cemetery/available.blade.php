@extends('layouts.master')
  @section('content')
    <div class="emptyPlotsInfoSection sectionBackground section primaryFont">
      <div class="backBttn">
        <a href="{{ route('cemetery.index') }}" style="color:white"><< BACK</a>
      </div>
      <div class="sectionTitle">
        Available Plots
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
            A single plot costs a one-time payment of either $250 (current parishioner) or $500 (former or non-parishioners), not to include the actual burial process. For all of the details and requirements, read more below.
          </div>
        @else
          <div class="emptyPlotCount">
            There are no available plots at this time. For any questions, please contact the parish staff on the <a style="color:gold" href="{{ route('cemetery.contact') }}">"Contact Us"</a> page.
          </div>
        @endif
        <p>
          The common questions about our cemetery are listed below. If you have any other questions, feel free to message the parish staff in the <a style="color:gold" href="{{ route('cemetery.contact') }}">"Contact Us"</a> page.
        </p>
        <i>What is the cost of the burial?</i>
        <p>
          The equipment and labor necessary for the actual burial depends on the type of burial being carried out. It will take $400 to bury a traditional casket, while a cremation burial costs $200.
        </p>
        <i>Can multiple people be buried on one plot?</i>
        <p>
          The only situation in which two people can be buried on the same plot is if both of the deceased were cremated. Cremated remains are prohibited from being buried on top of an existing buried casket.
        </p>
        <i>Who can be buried in our cemetery?</i>
        <p>
          Only a) current parishioners, b) past parishioners, or c) relatives of those already buried here can be buried in our cemetery.
        </p>
        <i>
          What is different about a Catholic cemetery?
        </i>
        <p>
          There are basically only two places that the Catholic Church consecrates as Holy Ground: a church and a cemetery. But why a cemetery? It represents the continuation, even in death, of the harmony and spiritual alliance which makes all Catholics members of one great family, thereby constituting it an actual family plot. As ministries of the Church, Catholic cemeteries expresses the link of community between all the faithful living and dead—the Communion of Saints.
        </p>
        <i>Why are only eastern plots available?</i>
        <p>
          The western half of the cemetery, often called the "old side", is no longer open for new burials. This is because old records make it difficult to know exactly where each body was buried there, which makes it possible for a body to be accidentally disturbed while digging for a new burial.<br>
          In addition, at least one mass grave happened there in the early 1900's due to an epidemic (likely cholera or the flu). The unknown locations of these deceased and their exposure to a dangerous illness make it difficult to bury anyone on the "old side" without risking the deceased or the living.
        </p>
      </div>
    </div>
  @endsection
