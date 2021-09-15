@extends('layouts.masterAdmin')

@section('page-title')
Paid Output
@endsection

@section('content')


<!-- <h1>free</h1> -->

<table class="table table-hover table-bordered" style="font-size: .7em">

  <table class="table table-hover table-bordered" style="font-size: .7em">
    <tr>
      <td>Business  Name</td>
      {{-- <td>
        {{ print FbaHelpers::getPaidOutputSpecificQuestion(1, 1)['analysis']['businessModel'] }}</td>
        --}}
        <td>{{ $paidOutputResult['info']['businessName'] }}</td>
      </tr>
      <tr>
        <td>Business Model</td>
        {{-- <td>
          {{ print FbaHelpers::getPaidOutputSpecificQuestion(1, 1)['analysis']['businessModel'] }}</td>
          --}}
          <td>{{ $paidOutputResult['info']['businessModel'] }}</td>
        </tr>
        <tr>
          <td>Business Valuation Multiple</td>
          <td>{{ $paidOutputResult['info']['baseValMultiple'] }}</td>
        </tr>
      </table>

      <h5>Analysis</h5>
      <table class="table table-hover table-bordered" style="font-size: .7em">

        <thead>
          <tr>
            <th>Valuation Impact from Seller Responses</th>
            <th>Multiplier Effect</th>
            <th>Red/Yellow Flags</th>
            <th>Green/Purple Flags</th>
            <th>Black Flags</th>
          </tr>
        </thead>

        @foreach ($paidOutputResult['sets'] as $set)
        @php
        $totalRedYellowFlags=0;
        $greenPupleFlags = 0;
        $blackFlags=0;
        @endphp

        <tr>
          <th>{{ $set['setInfo']['setName'] }}</th>
          <th>{{ $set['totalMultiplierEffect'] }}</th>
          <th>{{ $set['totalYellowFlags'] + $set['totalRedFlags'] }}</th>
          <th>{{ $set['totalPurpleFlags'] + $set['totalGreenFlags'] }}</th>
          <th>{{ $set['totalBlackFlags'] }}</th>
        </tr>

        @endforeach

        <tfoot>
          <tr>
            <td></td>
            <td>{{ $paidOutputResult['info']['grandTotalMultiplierEffect'] }}</td>
            <td>{{ $paidOutputResult['info']['grandTotalRedYellow'] }}</td>
            <td>{{ $paidOutputResult['info']['grandTotalGreenPurple'] }}</td>
            <td>{{ $paidOutputResult['info']['grandTotalBlack'] }}</td>
          </tr>
        </tfoot>
      </table>
      <table class="table table-hover table-bordered">
        <tr>
          <td>NetProfit: </td>
          <td>{{ $paidOutputResult['info']['netProfit'] }} </td>
        </tr>
        <tr>
          <td>Base Multiplier: </td>
          <td>{{ $paidOutputResult['info']['baseValMultiple'] }} </td>
        </tr>
        <tr>
          <td>Valuation Impact from seller responses: </td>
          <td>{{ $paidOutputResult['info']['grandTotalMultiplierEffect'] }} </td>
        </tr>
        <tr>
          <td>Valuation Multiplier(X): </td>
          <td>{{ $paidOutputResult['info']['valuationMultiplier'] }} </td>
        </tr>
        <tr>
          <td>Valuation($): </td>
          <td>{{ $paidOutputResult['info']['valuation'] }} </td>
        </tr>
        <tr>
          <td>Valuation($): </td>
          <td>{{ $paidOutputResult['info']['valuationRangePercent'] }}% </td>
        </tr>
        </tr>
        <tr>
          <td>Valuation($): </td>
          <td>${{ $paidOutputResult['info']['valuationRangePrice1'] }} ${{ $paidOutputResult['info']['valuationRangePrice1'] }} </td>
        </tr>
        </table>


        <br><br>

        <h1>Seller Responses</h1><br>
        @foreach ($paidOutputResult['sets'] as $set)


        <h5>{{ $set['setInfo']['setName'] }}</h5>
        <div class="table-responsive">
          <table class="table table-hover table-bordered" style="font-size: .7em">
            <thead>
              <tr>
                <th style="width: 40px">Code</th>
                <th style="width: 80px">Q-A</th>
                <th style="width: 80px">Free</th>
                <th style="width: 80px">Type</th>
                <th style="width: 200px">Question</th>
                <th style="width: 100px">Select Response</th>
                <th>Multiplier Effect</th>
                <th>Red Flag</th>
                <th>Yellow Flag</th>
                <th>Green Flag</th>
                <th>Puple Flag</th>
                <th>Black Flag</th>
                <th>Confidence Score</th>
                <th>Non-answer Effect</th>
                <th>Non-answer Scale</th>
                <th>Val. Impact Comment</th>
                <th>Confidence Impact Comment</th>
              </tr>
            </thead>
            <tbody>

              {{-- @foreach (FbaHelpers::getPaidOutputSpecificQuestion(1, $set->id)['data'] as $freeQuestion)
              --}}
              @foreach ($set['data'] as $freeQuestion)
              <tr @if ($freeQuestion->isFree == 1)
                style="background-color:ivory "
                @endif>
                <td>S.{{ $freeQuestion->qsetId }}.{{ $freeQuestion->qid }}</td>
                <td>{{ $freeQuestion->id }} - @if ($freeQuestion->answerSelect)
                  {{ $freeQuestion->answerSelect->answerId }}@endif
                </td>
                <td>
                  @if ($freeQuestion->isFree == true) Yes
                  @elseif($freeQuestion->isFree==False) No @endif
                </td>
                <td>
                  @if ($freeQuestion->answerSelect != null)
                  Select
                  @elseif ($freeQuestion->answerVal != null)
                  Value
                  @elseif ( $freeQuestion->answerMulti != null)
                  Array
                  @else
                  No Answer
                  @endif
                </td>
                <td>{{ $freeQuestion->qname }} </td>


                <td>
                  @if ($freeQuestion->answerSelect)
                  {{ $freeQuestion->answerSelect->userInput }}
                  @elseif($freeQuestion->answerVal)
                  {{ $freeQuestion->answerVal->value }}
                  @elseif($freeQuestion->answerMulti)
                  {{ print_r($freeQuestion->answerMulti) }}

                  @endif
                </td>
                <td>
                  @if ($freeQuestion->answerSelect)
                  {{ $freeQuestion->answerSelect->valuationEffect }}
                  @else

                  @endif
                </td>
                <td>
                  @if ($freeQuestion->answerSelect)
                  {{ $freeQuestion->answerSelect->redFlag ? 'Yes' : 0 }}
                  @else

                  @endif
                </td>
                <td>
                  @if ($freeQuestion->answerSelect)
                  {{ $freeQuestion->answerSelect->yellowFlag ? 'Yes' : 0 }}
                  @else

                  @endif
                </td>
                <td>
                  @if ($freeQuestion->answerSelect)
                  {{ $freeQuestion->answerSelect->greenFlag ? 'Yes' : 0 }}
                  @else

                  @endif
                </td>
                <td>
                  @if ($freeQuestion->answerSelect)
                  {{ $freeQuestion->answerSelect->purpleFlag ? 'Yes' : 0 }}
                  @else

                  @endif
                </td>
                <td>
                  @if ($freeQuestion->answerSelect)
                  {{ $freeQuestion->answerSelect->blackFlag ? 'Yes' : 0 }}
                  @else

                  @endif
                </td>
                <td>
                  @if ($freeQuestion->answerSelect)
                  {{ $freeQuestion->answerSelect->confidenceImpactScore ? $freeQuestion->answerSelect->confidenceImpactScore : 0 }}
                  @else

                  @endif
                </td>
                <td></td>
                <td></td>

                <td>
                  @if ($freeQuestion->answerSelect)
                  {{ $freeQuestion->answerSelect->valScoreImpactComment }}
                  @else

                  @endif
                </td>
                <td>
                  @if ($freeQuestion->answerSelect)
                  {{ $freeQuestion->answerSelect->confidenceImpactComment }}
                  @else

                  @endif
                </td>
              </tr>

              @endforeach
            </tbody>

            <tfoot>
              <tr style="background-color: #c7fff8;">
                <th>TOTAL</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th> {{ $set['totalMultiplierEffect'] }}</th>
                <th> {{ $set['totalRedFlags'] }}</th>
                <th>{{ $set['totalYellowFlags'] }}</th>
                <th>{{ $set['totalGreenFlags'] }}</th>
                <th>{{ $set['totalPurpleFlags'] }}</th>
                <th>{{ $set['totalBlackFlags'] }}</th>
                <th>{{ $set['totalConfidenceImpactScore'] }}</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </tfoot>
          </table>
        </div>
        <br><br>
        @endforeach

        {{-- <h1>All Questions</h1>
          <div class="table-responsive">
            <table class="table table-hover " style="font-size: .7em">
              <thead>
                <tr>
                  <th style="width: 40px">Code</th>
                  <th style="width: 80px">Q-A</th>
                  <th style="width: 200px">Question</th>
                  <th style="width: 100px">Select Response</th>
                  <th>Multiplier Effect</th>
                  <th>Red Flag</th>
                  <th>Yellow Flag</th>
                  <th>Green Flag</th>
                  <th>Puple Flag</th>
                  <th>Black Flag</th>
                  <th>Confidence Score</th>
                  <th>Non-answer Effect</th>
                  <th>Non-answer Scale</th>
                  <th>Val. Impact Comment</th>
                  <th>Confidence Impact Comment</th>
                </tr>
              </thead>
              <tbody>

                @foreach (FbaHelpers::getPaidOutput(1) as $freeQuestion)
                <tr @if ($freeQuestion->answerSelect != null || $freeQuestion->answerVal != null || $freeQuestion->answerMulti != null)
                  style="background-color:ivory "
                  @endif

                  >
                  <td>S.{{ $freeQuestion->qsetId }}.{{ $freeQuestion->qid }}</td>
                  <td>{{ $freeQuestion->qid }} - @if ($freeQuestion->answerSelect)
                    {{ $freeQuestion->answerSelect->answerId }}@endif
                  </td>

                  <td>{{ $freeQuestion->qname }} </td>

                  <td>
                    @if ($freeQuestion->answerSelect)
                    {{ $freeQuestion->answerSelect->userInput }}
                    @elseif($freeQuestion->answerVal)
                    {{ $freeQuestion->answerVal->value }}
                    @elseif($freeQuestion->answerMulti)
                    {{ print_r($freeQuestion->answerMulti) }}

                    @endif
                  </td>
                  <td>
                    @if ($freeQuestion->answerSelect)
                    {{ $freeQuestion->answerSelect->valuationEffect }}
                    @else

                    @endif
                  </td>
                  <td>
                    @if ($freeQuestion->answerSelect)
                    {{ $freeQuestion->answerSelect->redFlag ? 'Yes' : 0 }}
                    @else

                    @endif
                  </td>
                  <td>
                    @if ($freeQuestion->answerSelect)
                    {{ $freeQuestion->answerSelect->yellowFlag ? 'Yes' : 0 }}
                    @else

                    @endif
                  </td>
                  <td>
                    @if ($freeQuestion->answerSelect)
                    {{ $freeQuestion->answerSelect->greenFlag ? 'Yes' : 0 }}
                    @else

                    @endif
                  </td>
                  <td>
                    @if ($freeQuestion->answerSelect)
                    {{ $freeQuestion->answerSelect->purpleFlag ? 'Yes' : 0 }}
                    @else

                    @endif
                  </td>
                  <td>
                    @if ($freeQuestion->answerSelect)
                    {{ $freeQuestion->answerSelect->blackFlag ? 'Yes' : 0 }}
                    @else

                    @endif
                  </td>
                  <td>
                    @if ($freeQuestion->answerSelect)
                    {{ $freeQuestion->answerSelect->confidenceImpactScore ? $freeQuestion->answerSelect->confidenceImpactScore : 0 }}
                    @else

                    @endif
                  </td>
                  <td></td>
                  <td></td>

                  <td>
                    @if ($freeQuestion->answerSelect)
                    {{ $freeQuestion->answerSelect->valScoreImpactComment }}
                    @else

                    @endif
                  </td>
                  <td>
                    @if ($freeQuestion->answerSelect)
                    {{ $freeQuestion->answerSelect->confidenceImpactComment }}
                    @else

                    @endif
                  </td>
                </tr>

                @endforeach
              </tbody>
            </table>
          </div> --}}

          @endsection

          @section('breadcrumb')
          <li class="breadcrumb-item"><a href="#">CMS</a></li>
          <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
          @endsection
