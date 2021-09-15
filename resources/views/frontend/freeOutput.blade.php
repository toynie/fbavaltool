@extends('layouts.masterFrontend')

@section('page-title')

    Paid Output
@endsection

@section('custom-style')
body {

    background-color: unset;
}
    .divbtn .img-thumbnail {
    background-color: #081b53;
    border: 6px solid #5bd0a0;
    padding: 0;
    }
    .divbtn .img-thumbnail:hover {
    background-color: #081b53;
    border: 8px solid #399b73;
    padding: 0;
    box-shadow: 1px 1px 9px 0px;
    }
    .divbtn{
    cursor: pointer;
    }
    /*
    *
    * ==========================================
    * CUSTOM UTIL CLASSES
    * ==========================================
    */
    .nav-pills-custom .nav-link {
    color: #5bd1a1;
    background: #393ba3;
    position: relative;
    }

    .nav-pills-custom .nav-link.active {
    color: #393ba3;
    background: #5bd1a1;
    }


    /* Add indicator arrow for the active tab */
    @media (min-width: 992px) {
    .nav-pills-custom .nav-link::before {
    content: '';
    display: block;
    border-top: 23px solid transparent;
    border-left: 10px solid #5bd1a1;
    border-bottom: 23px solid transparent;
    position: absolute;
    top: 50%;
    right: -10px;
    transform: translateY(-50%);
    opacity: 0;
    z-index: 99;
    }
    }


    .df-bg-blue{
        background-color:#001961;
        color:white;
    }

    .text-df-bg-blue{
        {{-- background-color:#001961; --}}
        color:#001961;
    }

    .nav-pills-custom .nav-link.active::before {
    opacity: 1;
    }
    div.container-fluid.row-client-response, #ourresorces{
        background-color:#f0f0f0;
    }
    {{-- div.container-fluid.row-whysellbusiness{
        background-color:#182b62;
    } --}}

    .row-client-response .card{

        border-top-left-radius:40px !important;
        border-bottom-right-radius:40px !important;
        max-width:400px;
    }

    .row-client-response .card-body {
        border:none;
    }
    .row-client-response.p-5 > div > div > div > div > div:nth-child(1){
        background-color:white !important;
        color:#182b62 !important;

    }
    {{-- .row-client-response.card-title{ --}}
    .row-client-response .card-title{
        line-height:unset;
    }

    .numberCircle {
        border-radius: 50%;
        width: 36px;
        height: 36px;
        padding: 4px;

        background: #182b62;
        border: 2px solid #666;
        color: white;
        text-align: center;

        {{-- font: 5 Arial, sans-serif; --}}
    }

    .row-client-response button.btn.btn-primary.btn-block, #freeaudit center  button,
    .row-client-response a.btn.btn-primary.btn-block, #freeaudit center  button,
    #tellusmore,
    #breakdown-sellbusiness
    {
        background-color: #5bd0a1 !important;
        border-style:none;
        border-radius: 0;
    }

    div.row-whysellbusiness{
        color:white;
    }
    #row-whysellbusiness .whysell-thumbs{
              max-width:80px;
    }

    #row-whysellbusiness .col-whysellbusiness .media-body{
        padding-left: 10px;
    }
    div.row.p_businesstypes.sec_advisors{
        {{-- background-color: #182b62; --}}
        color: #182b62;;

    }
    p.advisor_position{
        color: #5bd0a1;
    }

    #ourresorces div.card-header{
        padding: 0px;
    }

    #ourresorces div.card-body{
        border: unset;
    }

    .card-header {
        background-color: unset;
    }
    .font-quicksand{
        font-family: 'Quicksand', sans-serif;
    }
    .schedulecall-header{
        background-color: #6353d8;
    }

    #sellyourbusiness .media  .whysell-thumbs{
        width: 80px;
    }
    #sellyourbusiness .col-step{

    }
    p{
        font-size: 1rem;
    }
@endsection

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gauge.js/1.3.7/gauge.min.js" integrity="sha512-J0d1VfdfTSDoDPEsahCtf2nC+groXdWkuQFyJjS+s3CpKj63X9Hf3pMEJtjIJt/ODh0QwTRx2/OioL+9fMoqSA==" crossorigin="anonymous"></script>
<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
{{-- {{dd( Request::get('continue')) }} --}}
<?php

    if ( isset($_GET['continue']) ) {
        $isContinue=  Request::get('continue');
        // dd($isContinue);
    }
?>

    @if($result!='error_duplicate')

    <div class="container-fluid px-0 {{ isset($isContinue) ? 'd-none': ''  }}">
        @if(request()->get('part')==2)
            <div class="container-fluid text-white" style="background:#00175c">
                <div class="row">
                    <div class="col-md-12 text-center py-3">
                        <h1 >
                            <span class="font-quicksand">CONFIDENCE</span>
                            LEVEL
                        </h1>
                    </div>
                </div>
            </div>
        @endif

        @if(request()->get('part')==2)
        <div class="part2-sec1-head text-center my-5 pt-5 ">
            <h5 class="font-weight-light text-df-bg-blue">
                Confidence Level
                <b>is measured by the level of confidence we have in our <br>tool's accuracy based on how you answered certain questions.</b>
            </h5>
        </div>
        @endif
        <div class="row mt-5">
            {{-- <div class="col-md-10  offset-md-1 border border-primary dfbThickBorder p-4"> --}}
            <div class="col-md-12 p-4">

                    <center>
                        @if(request()->get('part')==1)
                            <div style="display: inline-block;" >
                                <div class="text-left">
                                    <h5>The current market value of your business is ...</h5>
                                    <h1 class="display-4">${{ number_format($result['valuationRange$'][0]) }} - ${{ number_format($result['valuationRange$'][1]) }}</h1>
                                    <h5>at 2.5x - 2.8x multiple</h5>
                                </div>
                            </div>
                            <br>
                        @endif

                        <div id="confidenceScoreGauge" hidden></div>
                        <canvas id="valGuage" style="height:300px; width:600px"></canvas>
                        @if(request()->get('part')==1)
                            <h3>Confidence Score</h3>
                        @elseif(request()->get('part')==2)
                            <h5>When valuing your business, our confidence in the<br>accuracy of our valuation was reduce by:</h5><br><br>
                            <div class=" row text-left pt-5">

                                <div class="offset-md-4 col-md-4">
                                    {{-- {{dd($result["setQA"])}} --}}
                                    @foreach ($result["setQA"] as $qsets )
                                                        {{-- {{dd($qsets['qa'])}} --}}
                                        @foreach ($qsets['qa'] as $question)
                                            <p>{{($question->confidenceImpactScoreComment)}}</p>

                                            {{-- @if ($question['confidenceImpactScoreCommen']!=null)

                                               <h5>fdf{{$question['confidenceImpactScoreCommen']}}</h5>
                                            @endif --}}
                                        @endforeach

                                    @endforeach


                                    {{-- <h5 class="font-weight-light t  ext-df-bg-blue">
                                        Non-unique products<br>
                                        <b>While unique and semi-unique products always fare better in valuations, how big of an impact the non-uniqueness has depends on the exact situation and a lot of subjective metrics.</b>
                                    </h5><br>
                                    <h5 class="font-weight-light text-df-bg-blue">
                                        Business kept separate from other businesses<br>
                                        <b>Without having a closer look out your accounting books, it is difficult to determine exactly how much co-mingled financials will impact your overall business valuation.</b>
                                    </h5><br>
                                    <h5 class="font-weight-light text-df-bg-blue">
                                        Recent Changes<br>
                                        <b>While unique and semi-unique products always fare better in valuations, how big of an impact the non-uniqueness has depends on the exact situation and a lot of subjective metrics.</b>
                                    </h5><br>
                                    <h5 class="font-weight-light text-df-bg-blue">
                                        Another Example<br>
                                        <b>While unique and semi-unique products always fare better in valuations, how big of an impact the non-uniqueness has depends on the exact situation and a lot of subjective metrics.</b>
                                    </h5><br> --}}


                                    <center>
                                        <button style="min-width: 250px;" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/dealflowteam/fba-business-valuation-meeting-call'});return false;" id="tellusmore" type="button" class="btn btn-primary btn-lg my-5">
                                            <h5 class="mb-0">TELL US MORE</h5>
                                        </button>
                                    </center>
                                </div>

                            </div>
                        @endif

                    </center>


            </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-0 my-5 {{ isset($isContinue) ? 'd-none': ''  }}">
        @if(request()->get('part')==2)
            <div class="container-fluid text-white mb-5 pt-3" style="background:#00175c">
                <div class="row">
                    <div class="col-md-12 text-center py-3">
                        <h1 >
                            <span class="font-quicksand">VALUATION</span>
                            BREAKDOWN
                        </h1>
                    </div>
                </div>

            </div>
            <div class="container my-5 pt-5">
                @foreach ($result["setQA"] as $qsets )
                {{-- {{dd( $qsets['qa']->toArray() )}} --}}
                {{-- {{dd( array_filter( $qsets['qa']->toArray(), function($x) { return !empty($x); }) ) }} --}}
                {{-- {{
                   dd( count(array_filter( $qsets['qa']->toArray(), function($x) { return $x['valScoreImpactComment']!=null; })) )
                }} --}}

                <div class="row my-5  @if (count(array_filter( $qsets['qa']->toArray(), function($x) { return $x['valScoreImpactComment']!=null; })) <=0) d-none @endif ">
                    <div class="col-md-1"><img class="img-responsive " src="/img/breakdown-{{$qsets["setInfo"]["id"]}}.png" alt="Chania"></div>
                    <div class="col-md-11">
                        <div class="row">
                            <div class="col-md-12 text-left"><h4 class="text-uppercase">{{$qsets["setInfo"]->name}}</h4></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <br>
                                <h5>Things you can be proud of</h5>
                                <br>
                                @foreach ($qsets["qa"] as $questions)

                                    @if($questions["valScoreImpactComment"]!=null && trim($questions["valScoreImpactComment"])!=""  )

                                        @if($questions["valuationEffect"] >=0)
                                            <table>
                                                <tr>
                                                    <td class="align-text-top"><i class="fas fa-check"></i></td>
                                                    <td><p>{{$questions["valScoreImpactComment"]}}</p></td>
                                                </tr>
                                            </table>

                                        @endif

                                    @endif


                                @endforeach

                            </div>
                            <div class="col-md-6 pl-5 border border-primary border-right-0  border-top-0 border-bottom-0">
                                <br>
                                <h5 >Things you can improve on</h5>
                                <br>
                                @foreach ($qsets["qa"] as $questions)

                                    @if($questions["valScoreImpactComment"]!=null && trim($questions["valScoreImpactComment"])!=""  )
                                        @if($questions["valuationEffect"] <0)
                                            <table>
                                                <tr>
                                                    <td class="align-text-top"><i class="fas fa-caret-up"></i></td>
                                                    <td class="pl-3"><p>{{$questions["valScoreImpactComment"]}}</p></td>
                                                </tr>
                                            </table>
                                        @endif


                                    @endif


                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
                @endforeach


                {{-- <center>
                <a href=""  id="breakdown-sellbusiness" class="btn btn-primary btn-block" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/dealflowteam/fba-business-valuation-meeting-call'});return false;" style="max-width:300px">
                    <h5>SELL BUSINESS FOR ${{ number_format($result['valuationDollar']) }}</h5>
                </a>
                </center> --}}
                <center>
                    <a href=""  id="breakdown-sellbusiness" class="p-3 btn btn-primary btn-block" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/dealflowteam/fba-business-valuation-meeting-call'});return false;" style="max-width:350px">
                        <h5 class="align-middle mb-0">SELL BUSINESS MY BUSINESS</h5>
                    </a>
                    {{-- <button type="button" class="btn btn-primary btn-lg my-5">SELL MY BUSINESS</button> --}}
                </center>
                <br><br>
            </div>

        @endif


    </div>

    <div  id="sellyourbusiness" class="container-fluid px-0 my-5 {{ isset($isContinue) ? 'd-none': ''  }}">
        @if(request()->get('part')==2)
            <div class="container-fluid text-white mb-5 pt-3" style="background:#00175c">
                <div class="row">
                    <div class="col-md-12 text-center py-3">
                        <h1 >
                            SELL
                            <span class="font-quicksand">YOUR</span>
                            BUSINESS
                        </h1>
                    </div>
                </div>

            </div>
            <div class="container my-5 pt-5">

                <div class="row my-5">
                    <div class="col-md12 ">
                        <h5>Let's  Plan Your EXIT!</h5><br>
                        <h5><span class="font-quicksand">We'll help you have $2,999,9999 in your bank account in 90 days!</span><h5><br>
                        <p>Our exit plans are agile and adaptable to the ever-changing landscape of the industries and markets your business operates in. We will hold you accountable to your goals and act as sounding board a your business as it hits key milestones, adjusting targets and action items as necessary.</p>
                        <p>Here's how it works:</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-step py-3 px-5">
                        <div class="media" style=" align-items: center;">
                            {{-- <img src="img_avatar3.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;"> --}}
                            <img class="whysell-thumbs"  src="/img/whysell_nostring.png" alt="...">
                            <div class="media-body pl-3">
                              <h4>Step 1<br>Get Some Advice</h4>
                            </div>
                          </div><br>
                          <p>We look to understand the bigger picture of what you are trying to achieve. An exit can represent different things depending on the individual and their personal goals. Some look to retire and others plan to reinvest in new projects. We help you set goals that align the exit of your current business with what you are trying to achieve long term</p>
                    </div>
                    <div class="col-md-6 col-step py-3 px-5">
                        <div class="media  ">
                            {{-- <img src="img_avatar3.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;"> --}}
                            <img class="whysell-thumbs"  src="/img/whysell_nostring.png" alt="...">
                            <div class="media-body pl-3 px-5">
                              <h4>Step 2<br>Set an Exit Plan</h4>
                            </div>
                          </div><br>
                          <p>We analyze every aspect of your business to help you identity the risks and opportunities that can be leveraged to increase the value of your business over time. Your exit plan will include a professional valuation, full business audit, recommended action items, performance tracking, and a visual roadmap to achieving an exit you can be proud of.</p>
                    </div>
                    <div class="col-md-6 col-step py-3 px-5">
                        <div class="media  ">
                            {{-- <img src="img_avatar3.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;"> --}}
                            <img class="whysell-thumbs"  src="/img/whysell_nostring.png" alt="...">
                            <div class="media-body pl-3">
                              <h4>Step 3<br>List Your Business</h4>
                            </div>
                          </div><br>
                          <p>Your exit Coach will build a virtual roadmap to help you visualize the path to a successful exit. The roadmap is a set of micro-targets, key milestones, and performance metrics used to track the progress of your exit plan. The original goals we created during your initial exit planning consultation will serve as the foundation.</p>
                    </div>
                    <div class="col-md-6 col-step py-3 px-5">
                        <div class="media  ">
                            {{-- <img src="img_avatar3.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;"> --}}
                            <img class="whysell-thumbs"  src="/img/whysell_nostring.png" alt="...">
                            <div class="media-body pl-3">
                              <h4>Step 4<br>Close a Deal</h4>
                            </div>
                          </div><br>
                          <p>Plans can change at the drop of a hat. You may need cash to fund your skyrocketing startup, or a competitor might tap you on shoulder and offer a deal you can't refuse. No matter the circumstances, your Exit Plan will ensure you are focusing on value-increasing initiatives that put your business in the strongest possible position when the time comes to sell. Wheter you exit early, on time, or a little later than expected, the Dealflow team is invested in exit on a high-note. </p>
                    </div>
                </div>



                <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
                <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>

                <br><br>
                <center>
                    <a href=""  id="breakdown-sellbusiness" class="p-3 btn btn-primary btn-block" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/dealflowteam/fba-business-valuation-meeting-call'});return false;" style="max-width:350px">
                        <h5 class="align-middle mb-0">SELL BUSINESS FOR ${{number_format($result['valuationDollar'])}}</h5>
                    </a>
                </center>
                <br><br>
            </div>

        @endif


    </div>

    {{-- cta --}}
    <span class="{{ isset($isContinue)  ? 'd-none': ''  }}{{ isset($isContinue)  ? 'd-none': ''  }}">
        @if(request()->get('part')==1)
            @include('includes.frontend_output_cta')
        @endif
    </span>

    <div class="container-fluid row-whysellbusiness p-5 df-bg-blue" id="row-whysellbusiness">
        <div class="container my-5">
            <div class="row section ">
                <div class="col-md-12">
                    <h1 class="text-center">Why sell your business with us?</h1>
                    <p class="text-center mb-5">
                        Dealflow advisors are unwaveringly honest, available around the clock and go the extra mile to find the best deal on the market.
                    </p>
                      <div class="row mt-5">
                            <div class="col-md-4 col-whysellbusiness pt-5  ">
                                <div class="media mb-3">
                                    <span class="media-left">
                                        <img class="whysell-thumbs" src="/img/whysell_nostring.png" alt="...">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">No Strings attached<br>whatsoever</h5>
                                    </div>
                                </div>
                                <p>
                                    one of our advisors. We’ll happily help you understand the information you should know about your business, from its broad valuation to its market readiness. You’ll hang up empowered with a better understanding of your business’ value and positioning. And you get to choose what to do next.
                                </p>
                            </div>
                            <div class="col-md-4 col-whysellbusiness pt-5  ">
                                <div class="media mb-3">
                                    <span class="media-left">
                                        <img class="whysell-thumbs" src="/img/whysell_radical.png" alt="...">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">Radical Honestly,<br>
                                            no matter what</h5>
                                    </div>
                                </div>
                                <p>
                                    Data, P&Ls, and projections matter. But so do the things that don’t show up on your financial statements. Like the systems you built through trial and error. Or the small but crucial ways you delight your customers. Or your thoughtful team onboarding process. We dig deep to create an accurate, all-inclusive understanding of your unique business.
                                </p>
                            </div>
                            <div class="col-md-4 col-whysellbusiness pt-5  ">
                                <div class="media mb-3">
                                    <span class="media-left">
                                        <img class="whysell-thumbs" src="/img/whysell_strategic.png" alt="...">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">Strategic Advice
                                            <br>now and in the future</h5>
                                    </div>
                                </div>
                                <p>
                                    Data, P&Ls, and projections matter. But so do the things that don’t show up on your financial statements. Like the systems you built through trial and error. Or the small but crucial ways you delight your customers. Or your thoughtful team onboarding process. We dig deep to create an accurate, all-inclusive understanding of your unique business.
                                </p>
                            </div>
                            <div class="col-md-4 col-whysellbusiness pt-5  ">
                                <div class="media mb-3">
                                    <span class="media-left">
                                        <img class="whysell-thumbs" src="/img/whysell_yourbusiness.png" alt="...">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">YOur business is like<br>
                                            no other, literally.</h5>
                                    </div>
                                </div>
                                <p>
                                    As one of the very first online business brokerages, we’ve got more experience under our belts than anyone else. Because we’ve all bought and sold our own online businesses, we’re the right folks to help you navigate this exciting, stressful (did we say exciting?) process.
                                </p>
                            </div>
                            <div class="col-md-4 col-whysellbusiness pt-5  ">
                                <div class="media mb-3">
                                    <span class="media-left">
                                        <img class="whysell-thumbs" src="/img/whysell_yourback.png" alt="...">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">We have your back, always</h5>
                                    </div>
                                </div>
                                <p>
                                    what you — or we — want to hear. Given the choice between sinking our teeth into you for a commission and being able to snooze soundly at night, we’ll take sleep every time. That means that if you shouldn’t sell yet, or you should sell with someone else, we’ll tell you.
                                </p>
                            </div>
                            <div class="col-md-4 col-whysellbusiness pt-5  ">
                                <div class="media mb-3">
                                    <span class="media-left">
                                        <img class="whysell-thumbs" src="/img/whysell_wefindbuyers.png" alt="...">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">We find the buyers others won't</h5>
                                    </div>
                                </div>
                                <p>
                                    Even if you know you’re not Your Quiet Light advisor has your back throughout the sales process. Got a question? Call us. Think you’ve found the perfect buyer? Let us talk to them on your behalf and advise you whether you should take the deal or not. Think of us as your business-selling concierge, minus the white gloves (they stain too easy).
                                </p>
                            </div>
                        </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid py-5" id="sec_advisors">
        <div class="container my-5">

            <div class="row p_businesstypes  " >
                <div class="col-md-12">
                    <div class="row ">
                        <div class="col-md-12 text-center">
                            <div class="display-4">MEET THE <strong><b>BROKERS</b></strong></div>

                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6"><img src="/uploads/img/advisor.jpg" width="100%" alt="placeholder 960"></div>
                        <div class="col-md-6">
                            <p class="advisor_position text-bold">Senior M&amp;A Advisor</p>
                            <h4>KEVIN FINK</h4>
                            <p>Kevin has a wealth of experience dealing with domains and websites dating back to 2010. Having worked for and consulted some of the world's largest brokerages and marketplaces he has traversed everything from closing deals to growth marketing.</p>

                            <p>"I love the investigative process of analyzing a client's business: putting myself in the shoes of a prospective buyer allows me to get to know both the buyer and their business in illuminating ways!"</p>

                            <p>Kevin has facilitated the sale and purchase of dozens of high value web assets through an increasingly large network of loyal clients. His success can be attributed to his deep understanding of 'the deal' and his dedication to achieving a result that is celebrated on boths sides.</p>
                                <button type="button" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/dealflowteam/fba-business-valuation-meeting-call'});return false;" class="btn btn-outline-primary">WORK WITH KEVIN</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    @if(request()->get('part')==2)


    <div class="container-fluid schedulecall-header p-5 text-light  text-center" id="">
        {{-- SCHEDULE A CALL --}}
        <div class="display-4">SCHEDULE A <strong><b>CALL</b></strong></div>
    </div>

    <!-- Calendly inline widget begin -->
<div class="calendly-inline-widget" data-url="https://calendly.com/dealflowteam/fba-business-valuation-meeting-call" style="min-width:320px;height:630px;"></div>
<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
<!-- Calendly inline widget end -->
    <div class="container my-5">
        <P>* A 90-day time frame for closing is an estimate based on our experience on the current market conditions. How long it takes to sell a business always depends on a number of factor that we simply don't know, so your mileage may vary</P>
    </div>


    {{-- <div class="container ">
        <div class="row section valResult">
            <div class="col-md-12">
                <div id="dfbPriceCard" class="d-flex my-4" style="height: 600px;">
                    <div class="p-4 dfbPriceCard-child-left bg-success h-80 flex-fill m-3">
                        <div class="h-100" style="position: relative;">
                            <center>
                                <h3><strong>SELL MY BUSINESS FOR $3,830.75</strong></h3>
                            </center>
                            <div class="text-info"><br>
                                <p><strong>STEP 1</strong><br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Minus excepturi veritatis nulla

                                </p>
                                <p><strong>STEP 2</strong><br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Minus excepturi veritatis nulla

                                </p>
                                <p><strong>STEP 3</strong><br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Minus excepturi veritatis nulla

                                </p>
                            </div>
                            <center class="w-100" style="position: absolute; bottom: 0px;"><a href="#"
                                    class="btn btn-outline-info dfbMediumBorder d-flex justify-content-center d-md-table mx-auto"><strong>SELL
                                        MY BUSINESS</strong></a></center>
                        </div>
                    </div>
                    <div class="p-4  bg-cyan border border-info dfbThickBorder flex-fill">
                        <div class="h-100" style="position: relative;">
                            <center>
                                <h3><strong>INCREASE VALUATION<br>ACCURACY</strong></h3>
                            </center>
                            <div class="text-primary"><br>
                                <ul>
                                    <li>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Minus excepturi veritatis nulla</p>
                                    </li>
                                    <li>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Minus excepturi veritatis nulla</p>
                                    </li>
                                    <li>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Minus excepturi veritatis nulla</p>
                                    </li>
                                </ul>
                            </div>
                            <center class="w-100" style="position: absolute; bottom: 0px;"><a href="#"
                                    class="btn btn-outline-info dfbMediumBorder  d-flex justify-content-center d-md-table mx-auto"><strong>UPGRADE
                                        TO PRO</strong></a></center>
                        </div>
                    </div>
                    <div class="p-4 dfbPriceCard-child-right bg-success h-80 flex-fill m-3">
                        <div class="h-100" style="position: relative;">
                            <center>
                                <h3><strong>TALK TO A BROKER</strong></h3>
                            </center>
                            <div class="text-primary"><br>
                                <p><strong>STEP 1</strong><br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Minus excepturi veritatis nulla

                                </p>
                                <p><strong>STEP 2</strong><br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Minus excepturi veritatis nulla

                                </p>
                                <p><strong>STEP 3</strong><br>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Minus excepturi veritatis nulla

                                </p>
                            </div>
                            <center class="w-100" style="position: absolute; bottom: 0px;"><a href="#"
                                    class="btn btn-outline-info dfbMediumBorder  d-flex justify-content-center d-md-table mx-auto"><strong>TALK
                                        TO A BROKER</strong></a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

     <div class="container-fluid p-5" id="ourresorces">
        <div class="container ">
            <h1 class="text-center">OUR RESOURCES</h1>
            <div class="card-deck">

                <div class="card">
                    <div class="card-header "><img src="/img/Layer 850.png" width="100%" alt="placeholder 960"></div>
                    <div class="card-body">
                        <h5>How to Sell Your Saas Product to More Customers</h5>
                        <p class="text-bold">By Jamie Toyne <span>dsdsd</span></p>
                        <p>affiliate marketing is a billion dollar industry and growing. In its simplest form, this passive online business model means placing a link to someone else's product on your website, and earning a commission from them every time you make a sale. With different affiliate programs to choose from and no limits on...</p>
                        <p class="text-bold">READ MORE</p>

                    </div>

                </div>
                <div class="card">
                    <div class="card-header "><img src="/img/Layer 850.png" width="100%" alt="placeholder 960"></div>
                    <div class="card-body">
                        <h5>How to Sell Your Saas Product to More Customers</h5>
                        <p class="text-bold">By Jamie Toyne <span>dsdsd</span></p>
                        <p>affiliate marketing is a billion dollar industry and growing. In its simplest form, this passive online business model means placing a link to someone else's product on your website, and earning a commission from them every time you make a sale. With different affiliate programs to choose from and no limits on...</p>
                        <p class="text-bold">READ MORE</p>

                    </div>

                </div>
                <div class="card">
                    <div class="card-header "><img src="/img/Layer 850.png" width="100%" alt="placeholder 960"></div>
                    <div class="card-body">
                        <h5>How to Sell Your Saas Product to More Customers</h5>
                        <p class="text-bold">By Jamie Toyne <span>dsdsd</span></p>
                        <p>affiliate marketing is a billion dollar industry and growing. In its simplest form, this passive online business model means placing a link to someone else's product on your website, and earning a commission from them every time you make a sale. With different affiliate programs to choose from and no limits on...</p>
                        <p class="text-bold">READ MORE</p>

                    </div>

                </div>
              </div>

            <center>
                <button type="button" class="btn btn-outline-primary">SHOW MORE</button>
            </center>
        </div>
    </div>

    {{-- <div class="container p-5" id="testimonials">
        <div class="row">
            <div class="col-md-12"><h5 class="text-center"><img src="/img/testimonial-icon.png" alt="John Doe" class="mr-3 mt-3 " style="width:60px;">Testimonials</h5></div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <hr>
                <p><em>Having worked closely together, I can say that Jamie approaches business with passion and integrity. He is fun to work with an someone who knows M&A better than most. Wheter you're looking to buy or sell an online business, or just after some advice he's definitely one to connect with.</em></p>
                <div class="media p-3">
                    <img src="/img/testimonial-1.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                    <div class="media-body">
                        <h5><small>JUSTIN GILCHRIST</small></h5>
                        <p class="display-8"><small>AUTHOR & SERIAL <br>ENTREPRENEUR</small></p>
                        <p></p>
                    </div>
                </div>
                <small style="color:red; font-size: .6rem"><b>CO-FOUNDED CENTURICA & OPTIMUM FEEDBACK</b></small>
            </div>
            <div class="col-md-6">
                <hr>
                <p>Having worked closely together, I can say that Jamie approaches business with passion and integrity. He is fun to work with an someone who knows M&A better than most. Wheter you're looking to buy or sell an online business, or just after some advice he's definitely one to connect with.</p>
                <div class="media p-3">
                    <img src="/img/testimonial-1.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                    <div class="media-body">
                        <h5><small>JUSTIN GILCHRIST</small></h5>
                        <p class="display-8"><small>AUTHOR & SERIAL <br>ENTREPRENEUR</small></p>
                        <p></p>
                    </div>
                </div>
                <small style="color:red; font-size: .6rem"><b>CO-FOUNDED CENTURICA & OPTIMUM FEEDBACK</b></small>
            </div>
        </div>
    </div> --}}

     <div class="container-fluid p-5 df-bg-blue" id="freeaudit">

        {{-- <div class="container">
            <h1 class="text-center my-5">GET YOUR<br>FREE AUDIT REPORT</h1>
            <p class="text-center">imply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            <center><button type="button" class="btn btn-primary btn-lg my-5">INCREASE VALUATION ACCURACY</button></center>
        </div> --}}
        <div class="container py-5">
            <h1 class="text-center mt-3">SELL BUSINESS FOR</h1>
            <h1 class="text-center  display-2">${{number_format($result['valuationDollar'])}}</h1>
            {{-- <p class="text-center">imply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> --}}


            <center>
                <a href=""  id="breakdown-sellbusiness" class="p-3 btn btn-primary btn-block" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/dealflowteam/fba-business-valuation-meeting-call'});return false;" style="max-width:350px">
                    <h5 class="align-middle mb-0">SELL BUSINESS MY BUSINESS</h5>
                </a>
                {{-- <button type="button" class="btn btn-primary btn-lg my-5">SELL MY BUSINESS</button> --}}
            </center>
        </div>


    </div>

    @endif


    @else
        Duplicate Entry
    @endif



    <script src="https://cdnjs.cloudflare.com/ajax/libs/gauge.js/1.3.7/gauge.min.js"></script>
    <script>
      var opts = {
          angle: -0.25,
              lineWidth: 0.2,
              radiusScale:0.9,
              pointer: {
                length: 0.6,
                strokeWidth: 0.05,
                color: '#000000'
              },
            //   staticLabels: {
            //   font: "10px sans-serif",
            //   labels: [0,20, 40, 60, 80,100],
            //   fractionDigits: 0
            //   },

              staticZones: [
              {strokeStyle: "#ff2c2b", min: 0, max: 20},
              {strokeStyle: "#ff9a16", min: 20, max: 40},
              {strokeStyle: "#ffd217", min: 40, max: 60},
              {strokeStyle: "#1e3db2", min: 60, max: 80},
              {strokeStyle: "#1fb901", min: 80, max: 100}
              ],
              limitMax: false,
              limitMin: false,
              highDpiSupport: true
      };
      var target = document.getElementById('valGuage'); // your canvas element
      var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
      document.getElementById("confidenceScoreGauge").className = "confidenceScoreGauge";
      gauge.setTextField(document.getElementById("confidenceScoreGauge"));
      gauge.maxValue = 100; // set max gauge value
      gauge.setMinValue(0);  // set min value
      gauge.set({{$result['confidenceScore']*100}}); // set actual value
    </script>


@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">CMS</a></li>
    <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
@endsection
