@extends('layouts.master')
  @section('content')
    <div class="emptyPlotsInfoSection sectionBackground section primaryFont">
      <div class="backBttn">
        <a href="{{ route('cemetery.index') }}" style="color:white"><< BACK</a>
      </div>
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
  @endsection
