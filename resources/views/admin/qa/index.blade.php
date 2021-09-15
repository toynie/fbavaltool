{{--dd($data)--}}

@extends('layouts.masterAdmin')

@section('page-title')
    Transaction Data
@endsection

@section('content')
{{--dd($data)--}}
{{-- {{dd($data)}} --}}
<div class="card card-body bg-light">

    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-3">
                    Transaction Id :
                </div>
                <div class="col-md-9">
                    {{ $data['transactionInfo']['transactionId'] }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    Business Type :
                </div>
                <div class="col-md-9">
                   [ <strong>{{ $data['transactionInfo']['businessType']['name'] }} </strong>]
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    Name :
                </div>
                <div class="col-md-9">
                    {{ $data['transactionInfo']['clientName'] }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    Email :
                </div>
                <div class="col-md-9">
                    {{ $data['transactionInfo']['clientEmail'] }}
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-md-3">
                    Contact No. :
                </div>
                <div class="col-md-9">
                    {{ $data['transactionInfo']['clientContact'] }}
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-3">
                    Transaction Created :
                </div>
                <div class="col-md-9">
                    {{ $data['transactionInfo']['transactionCreated'] }}
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center border border-right-0 border-top-0 border-bottom-0">
            <h2>Valuation</h2>
            <h1><strong>[ ${{ number_format($data['valuationRange$'][0] , 0) }} -
                    ${{ number_format($data['valuationRange$'][1] , 0) }} ]</strong></h1>
        </div>

    </div>

</div>
    <div class="card card-body bg-light">
        <table class="table table-hover table-bordered ">
            <thead>
                <tr>
                    <th>Analysis</th>
                    <th>Multiplier Effect</th>
                    <th>Red/Yellow Flags</th>
                    <th>Green/Purple Flags</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data["setQA"] as $i=>$set)

                @if ($i < 2)
                <?php continue;?>
                @endif
                <tr>
                    <td>{{$set['setInfo']['name']}}</td>
                    <td>{{$set['setTotals']['valEffect']}}</td>
                    <td>{{$set['setTotals']['redFlag'] + $set['setTotals']['yellowFlag'] }}</td>
                    <td>{{$set['setTotals']['redFlag'] + $set['setTotals']['greenFlag'] }}</td>
                </tr>
                @endforeach


                {{-- <tr>
                    <td>Business Model</td>
                    <td><strong>{{ $data['transactionInfo']['businessType']['name'] }} </strong></td>
                </tr>
                <tr>
                    <td>Base Valuation Multiple</td>
                    <td><strong>{{ $data['baseMultiplier'] }}</strong></td>
                </tr> --}}
                <thead>
                    <tr>
                        <th>Total Multiplier</th>
                        <th>{{ $data['totalMultiplierEffect']['multiplerEffect'] }}</th>
                        <th>{{ $data['totalMultiplierEffect']['redYellowFlag'] ? $data['totalMultiplierEffect']['redYellowFlag'] : '' }}</th>
                        <th>{{ $data['totalMultiplierEffect']['greenPurpleFlag'] ? $data['totalMultiplierEffect']['greenPurpleFlag'] : '' }}</th>
                    </tr>
                </thead>
            </tbody>
        </table>
    </div>

    <div class="card card-body bg-light">
        <div class="col-md-46">
            <table class="table table-hover table-bordered ">
                <tbody>

                    <tr>
                        <td><strong>Net Profit</strong></td>
                        <td>{{ $data['netProfit'] }}</td>
                    </tr>
                    <tr>
                        <td>&nbsp &nbsp &nbsp &nbsp Base Multiplier</td>
                        <td>{{ $data['baseMultiplier'] }}</td>
                    </tr>
                    <tr>
                        <td>&nbsp &nbsp &nbsp &nbsp Valuation Impact Seller Response</td>
                        <td>{{ $data['valImpactSellerResponse'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Multiplier X</strong></td>
                        <td>{{ $data['valMultiplierX'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Valuation ($)</strong></td>
                        <td>${{ number_format($data['valuationDollar'], 0) }}</td>
                    </tr>
                    <tr>
                        <td><strong>Valuation Percent Range</strong></td>
                        <td>{{ $data['valuationRangePercent'] * 100}}%</td>
                    </tr>
                    <tr>
                        <td><strong>Valuation Range ($)</strong></td>
                        <td>[ ${{ number_format($data['valuationRange$'][0] , 0) }} -
                            ${{ number_format($data['valuationRange$'][1] , 0) }} ]</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card card-body bg-light">
        <div class="col-md-46">
            <table class="table table-hover table-bordered ">
                <tbody>
                    <tr>
                        <td><strong>Valuation Accuracy Estimate</strong></td>
                        <td>{{ $data['valuationAccuracyEstimate'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Confidence Score</strong></td>
                        <td>{{ $data['confidenceScore'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Confidence Base</strong></td>
                        <td>{{ $data['confidenceBase'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



    {{-- <div class="card card-body bg-light">
        <span class="m-3"><h1><strong>ANALYSIS</strong></h1></span>
        <div class="row m-3">
            <div class="col-md-46">
                <table class="table table-hover table-bordered">
                    <tbody>
                        <tr>
                            <td>Impact Seller Response</td>
                            <td>{{ $data['valImpactSellerResponse'] }}</td>
                        </tr>
                        <tr>
                            <td>Net Profit</td>
                            <td>{{ $data['netProfit'] }}</td>
                        </tr>
                        <tr>
                            <td>Valuation</td>
                            <td>${{ number_format($data['valuationDollar'], 0) }}</td>
                        </tr>
                        <tr>
                            <td>Valuation Percent Range</td>
                            <td>{{ $data['valuationRangePercent'] }}</td>
                        </tr>
                        <tr>
                            <td>Valuation Accuracy Estimate</td>
                            <td>{{ $data['valuationAccuracyEstimate'] }}</td>
                        </tr>
                        </tr>
                        <tr>
                            <td>Total Confidence Impact Score</td>
                            <td>{{ $data['totalConfidenceImpactScore'] }}</td>
                        </tr>
                        <tr>
                            <td>Confidence Score</td>
                            <td>{{ $data['confidenceScore'] }}</td>
                        </tr>
                        <tr>
                            <td>Confidence Base</td>
                            <td>{{ $data['confidenceBase'] }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <table class="table table-hover table-bordered">
                    <tbody>
                        <tr>
                            <td>Base Multiplier</td>
                            <td>{{ $data['baseMultiplier'] }}</td>
                        </tr>
                        <tr>
                            <td>Multiplier Effect</td>
                            <td>{{ $data['totalMultiplierEffect']['multiplerEffect'] }}</td>
                        </tr>
                        <tr>
                            <td>Multiplier X</td>
                            <td>{{ $data['valMultiplierX'] }}</td>
                        </tr>
                        <tr>
                            <td>Red & Yellow Flag</td>
                            <td>{{ $data['totalMultiplierEffect']['redYellowFlag'] ? $data['totalMultiplierEffect']['redYellowFlag'] : '' }}
                            </td>
                        </tr>
                        <tr>
                            <td>Green & Purple Flag</td>
                            <td>{{ $data['totalMultiplierEffect']['greenPurpleFlag'] ? $data['totalMultiplierEffect']['greenPurpleFlag'] : '' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div> --}}
    <div class="card card-body bg-light">
        <span class="m-3"><h1><strong>Question & Answers</strong></h1></span><br><br>
        @foreach ($data["setQA"] as $i=>$set)
        @if ($i < 2)
        <?php continue;?>
        @endif
            <h5 class="ml-3"><strong>{{$set["setInfo"]->name}}</strong></h5><br>
            <table class="table table-hover table-bordered  ">
                <thead>
                    <tr class="table-primary">
                        <th>Code</th>
                        <th>Question</th>
                        <th>Seller Response</th>
                        <th>Multiplier Effect</th>
                        <th>Red Flag</th>
                        <th>Yellow Flag</th>
                        <th>Green Flag</th>
                        <th>Purple Flag</th>
                        <th>Confidence Score Effect</th>
                        <th>Valuation Impact Comment</th>
                        <th>Confidence Impact Comment</th>

                    </tr>
                </thead>
                <tbody>
           @foreach ( $set["qa"] as $key=> $item)
            {{-- <div class="row ml-3">
            <div class="col-auto text-right"><h3>{{$key+1}}</h3></div>
                <div class="col"><table class="table table-hover table-bordered ">
                    <tr class="bg-info">
                        <td><h5>{{$data['transactionInfo']['businessType']['initial'].'.'. $set["setInfo"]->id.'.'.$item->question_code.'    ||    '.$item->question_name}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5><h5>Answer: {{$item->userInput}}</h5></h5></td>
                    </tr>
                </table></div>
            </div>
            <br> --}}



{{-- {{dd($item)}} --}}

                        <tr>
                            {{-- <td>{{$data['transactionInfo']['businessType']['initial'].'.'. $set["setInfo"]->id.'.'.$item->question_code}}</td> --}}
                            <td>{{$data['transactionInfo']['businessType']['initial'].'.'. $set["setInfo"]->id.'.'.$item->qid}}</td>
                            <td>{{$item->question_name}}</td>
                            <td>
                               {{-- {{$item}} --}}

                               @if ($item->qestion_type ==11)
                                    {{$item->inputVal*100}}%
                               @else
                                    @if($item->inputVal!=null)
                                        {{$item->inputVal}}

                                    @elseif($item->inputValArray!=null)
                                        {{$item->inputVal}}
                                    @elseif($item->qanswer_id!=null)
                                        {{$item->userInput}}
                                    @endif
                               @endif



                            </td>
                            <td>{{$item->valuationEffect}}</td>
                            <td>{{$item->redFlag}}</td>
                            <td>{{$item->yellowFlag}}</td>
                            <td>{{$item->greenFlag}}</td>
                            <td>{{$item->purpleFlag}}</td>
                            <td>{{$item->confidenceImpactScore}}</td>
                            <td>{{$item->valScoreImpactComment}}</td>
                            <td>{{$item->confidenceImpactScoreComment}}</td>

                        </tr>
           @endforeach
        </tbody>
        <thead>
            <tr class="table-danger">
                <th>Total</th>
                <th></th>
                <th></th>
                <th>{{$set["setTotals"]["valEffect"]}}</th>
                <th>{{$set["setTotals"]["redFlag"]}}</th>
                <th>{{$set["setTotals"]["yellowFlag"]}}</th>
                <th>{{$set["setTotals"]["greenFlag"]}}</th>
                <th>{{$set["setTotals"]["purpleFlag"]}}</th>
                <th>{{$set["setTotals"]["confidenceImpactScore"]}}</th>
                <th></th>
                <th></td>
            </tr>
        </thead>
    </table>
           {{-- <div class="ml-4">
            <div class="card card-body bg-light ml-5 ">
                <table class="table table-hover table-bordered  ">
                    <tr>
                        <td >Total ValEffect</td>
                        <td >{{$set["setTotals"]["valEffect"]}}</td>
                    </tr>
                    <tr>
                        <td >Total Red Flag</td>
                        <td >{{$set["setTotals"]["redFlag"]}}</td>
                    </tr>
                    <tr>
                        <td >Total Yellow Flag</td>
                        <td >{{$set["setTotals"]["yellowFlag"]}}</td>
                    </tr>
                    <tr>
                        <td >Total Green Flag</td>
                        <td >{{$set["setTotals"]["greenFlag"]}}</td>
                    </tr>
                    <tr>
                        <td >Total Purple Flag</td>
                        <td >{{$set["setTotals"]["purpleFlag"]}}</td>
                    </tr>
                </table>
                </div>
           </div> --}}

           <br>
           <br>
           <br>
        @endforeach
    </div>


@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">CMS</a></li>
    <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
@endsection
