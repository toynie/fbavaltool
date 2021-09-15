@extends('layouts.masterFrontend')

@section('page-title')

Paid Output
@endsection

@section('custom-style')
    html {
        scroll-behavior: smooth;

    }

    * {
    box-sizing: border-box;
    }

    body {
    background-color: #f1f1f1;

    }

    #regForm {
    background-color: #f2f2f2;
    {{-- margin: 100px auto; --}}
    {{-- font-family: Raleway; --}}
    font-family: 'Poppins';
    padding: 40px;
    {{-- width: 70%; --}}
    min-width: 300px;
    <!-- border: 5px solid #182b62 -->
    }

    {{-- h1 {
    text-align: center;
    } --}}

    input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    {{-- font-family: Raleway; --}}
    border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
    background-color: #ffdddd;
    }

    <!-- {{-- div .row .dfbSelectAnser .invalidSel {
    background-color: #ffdddd;
    } --}} -->

    <!-- .tab .dfbSelectAnser  .invalidSelect{
        background-color: #ffdddd;
    } -->

    /* Hide all steps by default: */
    .tab {

    //tomodify
    //display: none;
    }
    .tab-hidden{
        display: none;
    }
    .tab-block{
        display: block;
    }

    .question-block{
        display: block;
    }
    .question-hidden{
        display: none;
    }

    {{--
    .tab .question_item {
        display: none;
    } --}}

    body *{
    font-weight: 300 !important;
    }

    button {
    background-color: #4CAF50;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    {{-- font-family: Raleway; --}}
    cursor: pointer;
    }

    button:hover {
    opacity: 0.8;
    }

    #prevBtn {
    background-color: #bbbbbb;
    }
    #nextBtn {
    background-color: #5bd0a1;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
    }

    .step.active {
    opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
    background-color: #4CAF50;
    }

    .form-group{
    margin-left: 0 !important;
    }
    .question_item .row .answer. ml-sm-3 .pt-2{
    margin-left: 0!important;
    }

    .multiple-answer-select{
    border-radius:0px;

    }


    select.multiple-answer-select {
    max-width: 300px;

    /* styling */
    background-color: white;
    border: 2px solid #182b62;
    border-radius: 0px;
    display: inline-block;
    font: inherit;
    line-height: 1.5em;
    padding: 0.5em 3.5em 0.5em 1em;

    /* reset */

    margin: 0;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-appearance: none;
    -moz-appearance: none;


    background-image:
        linear-gradient(45deg, transparent 50%,  #182b62  50%),
        linear-gradient(135deg,  #182b62 50%, transparent 50%),
        linear-gradient(to right, #182b6200,#182b6200);
    background-position:
        calc(100% - 20px) calc(1em + 2px),
        calc(100% - 15px) calc(1em + 2px),
        100% 0;
    background-size:
        5px 5px,
        5px 5px,
        2.5em 2.5em;
    background-repeat: no-repeat;
    }


    /* The container-selectabc */
    .container-selectabc {
    display: block;
    position: relative;
    padding-left: 3.5rem;
    margin-bottom: 12px;
    cursor: pointer;
    <!-- font-size: 22px; -->
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }

    /* Hide the browser's default radio button */
    .container-selectabc input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    }

    /* Create a custom radio button */
    .checkmark-abc {
    position: absolute;
    top: 0;
    left: 0;
    height: 50px;
    width: 30px;
    background-color: #5bd0a1;
    border-radius: 0%;
    border-right: 2px solid #182b62;
    color:white;
    }

    /* On mouse-over, add a grey background color */
    .container-selectabc:hover input ~ .checkmark-abc {
    background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .container-selectabc input:checked ~ .checkmark-abc {
    background-color: #182b62;
    border-right: 4px solid #5bd0a1 !important;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark-abc:after {
    content: "";
    position: absolute;
    display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .container-selectabc input:checked ~ .checkmark-abc:after {
    display: block;
    }


    select.form-control:not([size]):not([multiple]) {
        height: unset;
    }

    input.btnyesno{
        background-color: white;
        color: black;
        border: 2px solid #182b62;
    }

    div.btngrp-yesno > label{
            background-color: unset;
            color: 182b62;
            border: 2px solid #182b62;
            border-radius: 4px !important;
            white-space: normal;
    }

    .btngrp-yesno>.btn:first-child,.btngrp-yesno>.btn:last-child {
        margin-right: 8px !important;
        {{-- padding-left: 30px; --}}
        padding-right: 30px;

    }

    .btngrp-yesno.btn-primary:not(:disabled):not(.disabled).active{
        background-color: #587213;
    }

    .btngrp-yesno.btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active {
        background-color: #182b62;
        box-shadow: 1px 2px 2px 2px #888888a1;
    }
    .btngrp-yesno .btn.active.focus, .btngrp-yesno .btn.focus{
        outline:unset !important;
        outline-offset:unset !important;
    }

    label.btn{
        text-align: left;
    }



    input[type=number]{
    max-width: 300px;
    border: 2px solid #182b62;
        border-radius: 5px;
    }


    .row answer{
    background-color: unset;
    }
    div .question_item .dfbSelectAnser{
    background-color: unset;
    }

    .btngrp-selectAnswer2{
    wid
    }
    .btngrp-selectAnswer2>.btn:first-child{
        margin-right: 2px !important;

    }
    .container-answers, .row .answer{
        {{-- margin-left:25px !important; --}}
    }


    #getInfo .modal-content{
        background-color: #182b62;
        border-radius: 6px;
        border-top-left-radius: 30px;
        border-top-right-radius: 6px;
        border-bottom-right-radius: 30px;
        border-bottom-left-radius: 6px;
    }


    #getInfo .modal-header {
        padding: 15px;
        border-bottom: unset;
    }

    #getInfo .modal-header .close{
        background-color: white;
        border-radius: 2px;
        margin-top:1px;
        margin-right:1px;
    }


    #footer-email .footer-email-input{
        width:60%;
    }


    .tooltip-inner {

        text-align: left !important;
        background-color: #182b62 !important;
        border-radius: 0px !important;
    }
    .tooltip.top .tooltip-arrow {
        border-top-color: #182b62 !important;
    }


    #question-clientReason .whyValuate{
        width:unset !important;
    }

    #free-questions-sidebar{
        z-index:1000 ;
    }
    #free-questions-sidebar button{

    }

    .sidebar-btn {
        margin:10px;
        height: 82px;
        width: 100%;
        padding: 15px;
        border-radius: 10px 10px 10px 10px;
        position: relative;
        border: 2px solid #1c2c5f;
        font-size: 2.2rem;
        font-weight: 600!important;
        color: #1c2c5f;
        font-family: "Nunito", sans-serif;
    }
    .sidebar-btn div {
        margin: inherit;
    }
    .sidebar-current{
        background: #8f8adc;
        border:unset;
        color: white;
    }
    .sidebar-finished{
        color: white;
        background: #b5afdf;
        border:unset;
    }
    .sidebar-current:before {
        content: "";
        position: absolute;
        left: calc(100% - 20%);
        height: 80px;
        width: 10px;
        border-radius: 44% 10px;
        top: 1px;
        border: 38px solid #8f8adc;
        transform: rotate(
    45deg
     );
    }


@endsection



{{-- 1 = select
2 = list  //blank
3 =  yes no// button group
4 = val int    //yes no   radio
5 = val text     //val num
6 = check list //blank
7 = multiple val array
 --}}




@section('content')

<div class="container py-5" >
    <div id="prgress-container" class="my-5">
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="20"
            aria-valuemin="0" aria-valuemax="100" style="width:20%">
              <span class="sr-only">70% Complete</span>
            </div>
        </div>
        <center><h5>20% Progress</h5></center>
    </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <div class="col-md-3 " id="free-questions-sidebar" >

            {{-- <div class="sidebar-btn sidebar-finished"> <div>GENERAL</div></div>
            <div class="sidebar-btn sidebar-current"><div>PERFORMANCE</div></div> --}}

            @foreach ($sets as $item)
                <div
                class="sidebar-btn @if($loop->first)   sidebar-finished @endif @if($loop->index == 1) sidebar-current @endif "
                onclick="alert('ds')"
                >
                    <div>{{ $item->id}}-{{ $item->name}}</div>
                </div>
            @endforeach

            {{-- <div class="sidebar-btn "><div>TRANSFERABILITY</div></div>
            <div class="sidebar-btn "><div>AUDITABILITY</div></div>
            <div class="sidebar-btn "><div>SUSTAINABILITY</div></div>
            <div class="sidebar-btn "><div>DEFENSABILITY</div></div>
            <div class="sidebar-btn "><div>SCALABILITY</div></div> --}}

        </div>
        <div class="col-md-9">
            <form role="form" id="regForm" action="/addQA" method="post"  enctype="multipart/form-data">
                @csrf

                <input type="number" id="busstypeId" name="busstype_id" value="{{$userDetails['busstype']}}" hidden>
                <input type="text" id="clientName" name="name" value="{{$userDetails['name']}}" hidden>
                <input type="email" id="email" name="email" value="{{$userDetails['email']}}" hidden>
                <input type="text" id="website" name="website" value="{{$userDetails['website']}}" hidden>

                <input type="text" type="number" id="input-continueLater" name="ifContuneLater" value="0" hidden >

                <!-- One "tab" for each step in the form: -->
                <?php $setChecker = null; ?>

                <!-- start of question foreach -->
                @foreach ($freeQuestions as $parentKey=>$question)
                <div class="question"></div>
                @if ($setChecker == $question->qset_id)

                @else

                @if ($parentKey !=0 )
                </div> {{--end of the tab--}}
                @endif

                <div class="tab tab-hidden"> {{--start of the tab--}}
                @endif
                <div id="{{$question->id}}" class="{{$parentKey == 0 ? 'question-block': 'question-hidden'}}  question_item qkey-{{$parentKey}} my-5 py-1" >

                        {{--------- Set array of answer if global answer or custom answer --------------}}
                        {{-- {{dd($question->pivot->useCustomAnswer)}} --}}
                        @if (count( $question->customAnswers) > 0   && $question->pivot->useCustomAnswer ==True )
                        {{-- ----with custom answer & custom answer is enabled --}}

                            <?php $finalAnswers = $question->customAnswers?>
                            {{  count($finalAnswers) }}

                        @else
                        {{-- -----no  custom answer --}}

                            <?php $finalAnswers = $question->answers ?>

                        @endif
                        {{--------- End Set array of answer if global answer or custom answer --------------}}

                        {{-- $question->type == 5 --}}

                    <div class="row">
                        <div class="{{$question->type == 5 ? "col-md-6": "col-md-12"}} padding-right:0">

                            <table >
                                <tr>
                                <td><i class="fa fa-info-circle"  style='font-size:1.5em; color:#182b62;' data-toggle="tooltip" data-placement="top" title="{{$question->q_info}}"></i></td>
                                <td style="padding-left:10px">{{ $question->name}}?</td>

                                </tr>
                            </table>



                            {{-- <span>{{$question->id}}-{{$question->type}}</span> --}}

                        </div>
                        <div class="{{$question->type == 5 ? "col-md-6 padding-right:0": "col-md-12 pt-4"}} padding-right:0">
                            <div class="pl-4 ml-4">
                                <!-- start of if and checking question types -->
                                @if ($question["type"] == 1)
                                {{---------- Question is select ----------- --}}


                                <div class="btn-group colors btngrp-yesno btngrp-selectAnswer2" data-toggle="buttons">

                                    @foreach ($finalAnswers as $key=> $answer)
                                        @if ($loop->first)
                                            {{-- This is the first iteration. --}}
                                        @endif

                                    <label onclick="showNextQuestion({{$parentKey}})"  class="btn btn-primary  {{-- $key==0?'active':'' --}}" style="width: 48%; min-height: 60px;margin:.5%; border-radius:5px!important;" >
                                        <input oninput="this.className = ''"  type="radio" name="{{$question->id}}-{{$question->type}}" value="{{$answer->id}}" autocomplete="off"  > {{$answer->userInput}}
                                    </label>
                                    @endforeach
                                </div>

                                    @elseIf($question->type == 2)
                                        <div class="form-group ml-md-3">

                                            <select  onchange="showNextQuestion({{$parentKey}})" class="form-control multiple-answer-select" name="{{$question->id}}-{{$question->type}}" required>
                                            <option value selected disabled>
                                                Please select
                                            </option>


                                            @foreach ($question->answers as $answer)
                                            <option  id="{{$question->id}}-{{$answer->id}}" value="{{$answer->id}}" >
                                                {{-- {{ $answer->id }} --}}
                                                {{ $answer->userInput }}
                                            </option>
                                            @endforeach

                                            </select>
                                        </div>

                                    @elseIf($question->type == 3)

                                        <p> button group s</p>
                                        <div class="row answer ml-md-3 pt-2">
                                            <div class="btn-group colors btngrp-yesno" data-toggle="buttons">
                                                @foreach ($question->answers as $key=> $answer)
                                                <label onclick="showNextQuestion({{$parentKey}})" class="btn btn-primary btn-lg  " style="heigt:unset">
                                                    <input oninput="this.className = ''"   type="radio" name="{{$question->id}}-{{$question->type}}" value="{{$answer->id}}" autocomplete="off"  > {{$answer->userInput}}
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    @elseIf($question->type == 4) {{-- radio --}}


                                    <div class="row answer container-answers  pt-2" >
                                        <div class="col" style="padding-left:0; padding-right:0">
                                            <input onchange="showNextQuestion({{$parentKey}})"  id="input-{{$question->id}}"  class="form-control answer-val" type="text" oninput="this.className = ''" placeholder="Enter Value"  name="{{$question->id}}-{{$question->type}}" required />
                                        </div>
                                    </div>

                                    @elseIf($question->type == 5)
                                    {{-- input number --}}

                                        <div class="col" style="padding-left:0; padding-right:0">
                                            <input value="0"  onchange="showNextQuestion({{$parentKey}})"  id="input-{{$question->id}}"  class="form-control answer-val" type="number" oninput="this.className = ''" placeholder="Enter Value"  name="{{$question->id}}-{{$question->type}}" required />
                                        </div>




                                    @elseIf($question->type == 7)

                                    <div class="row answer ml-3 py-3">

                                    @foreach ($question->answers as $key=>$answer)
                                    <div class="col-md-6 required">
                                        <div class="form-group">

                                            <label for="email">{{$answer->userInput}}</label>
                                            <input  value="0" onchange="showNextQuestion({{$parentKey}})"  type="number" placeholder="{{$answer->userInput}}" id="{{$question->id}}-{{$answer->id}}" oninput="this.className = ''" name="{{$question->id}}-{{$question->type}}[]" }}>
                                        </div>
                                    </div>
                                    @endforeach
                                    </div>


                                    @else

                                    @endif
                                    </div> {{-- end of  container-answers --}}
                            </div>

                        </div>
                    </div>




                <!-- end of if and checking question types -->

                @if ($setChecker == $question->qset_id)
                @else
                    <?php $setChecker =  $question->qset_id ?>
                @endif

                {{-- Check if last question then add this input below   --}}
                @if ($loop->last)
                    {{-- <p>fdfd</p> --}}



                    <div  class=" question-block question_item qkey-15 my-5 py-1 " id="question-clientReason">

                        <div class="row">
                            <div class="col-md-12  padding-right:0">

                                <span> <i class="fa fa-info-circle" style="font-size:1.5em; color:#182b62;" data-toggle="tooltip" data-placement="top" title="test q_info for question"></i> &nbsp; Why are you looking for a valuation</span>


                            </div>

                            <div class="col-md-12 pt-4 padding-right:0">
                                <div class="pl-4 ml-4">
                                    <div class="whyvaluate">
                                        <div class="form-check pl-0">
                                            <label class="form-check-label" for="radio2">
                                                <input type="radio" class="form-check-input whyValuate"  name="whyValuate" value=1>
                                                <span class="pl-5"> I want to sell now</span>
                                            </label>
                                        </div>
                                        <div class="form-check pl-0">
                                            <label class="form-check-label" for="radio2">
                                                <input type="radio" class="form-check-input whyValuate"  name="whyValuate" value=2>
                                                <span class="pl-5"> I want to sell in 6 months</span>
                                            </label>
                                        </div>
                                        <div class="form-check pl-0">
                                            <label class="form-check-label" for="radio2">
                                                <input type="radio" class="form-check-input whyValuate"  name="whyValuate" value=3>
                                                <span class="pl-5"> I want to sell eventually</span>
                                            </label>
                                        </div>
                                        <div class="form-check pl-0">
                                            <label class="form-check-label" for="radio2">
                                                <input type="radio" class="form-check-input whyValuate"  name="whyValuate" value=4>
                                                <span class="pl-5"> Just Curious</span>
                                            </label>
                                        </div>
                                        <div class="form-check pl-0">
                                            <label class="form-check-label" for="radio2">
                                                <input type="radio" class="form-check-input whyValuate"  name="whyValuate" value=5>
                                                <span class="pl-5"> I'm buying a business</span>
                                            </label>
                                        </div>

                                        {{-- <div class="form-group  form-check ">
                                            <input type="checkbox" class="form-check-input text-left" style="width:15px; height:15px; margin-left: -20px;" name="whyValuate[1]" >
                                            <label class="form-check-label" for="exampleCheck1">
                                                I want to sell now
                                            </label>
                                        </div>
                                        <div class="form-group  form-check ">
                                            <input type="checkbox" class="form-check-input text-left" style="width:15px; height:15px; margin-left: -20px;" name="whyValuate[2]" >
                                            <label class="form-check-label" for="exampleCheck1">
                                                I want to sell in 6 months
                                            </label>
                                        </div>
                                        <div class="form-group  form-check ">
                                            <input type="checkbox" class="form-check-input text-left" style="width:15px; height:15px; margin-left: -20px;" name="whyValuate[3]" >
                                            <label class="form-check-label" for="exampleCheck1">
                                                I want to sell eventually
                                            </label>
                                        </div>
                                        <div class="form-group  form-check ">
                                            <input type="checkbox" class="form-check-input text-left" style="width:15px; height:15px; margin-left: -20px;" name="whyValuate[4]" >
                                            <label class="form-check-label" for="exampleCheck1">
                                                Just Curious
                                            </label>
                                        </div>
                                        <div class="form-group  form-check ">
                                            <input type="checkbox" class="form-check-input text-left" style="width:15px; height:15px; margin-left: -20px;" name="whyValuate[5]" >
                                            <label class="form-check-label" for="exampleCheck1">
                                                I'm buying a business
                                            </label>
                                        </div> --}}
                                    </div>
                                    <div class="pl-4 ">
                                        <div class="row pt-4  pt-4" >
                                            <div class="col-md-6" style="padding-left:0">
                                                <input onchange=""  id="input-name"  class="form-control answer-val" type="text" oninput="" placeholder="Name"  name="name" required />
                                            </div>
                                            <div class="col-md-6" style="padding-left:0">
                                                <input onchange=""  id="input-email"  class="form-control answer-val" type="email" oninput="" placeholder="Email Address"  name="email" required />
                                            </div>
                                        </div>
                                        <div class="row     pt-2" >
                                            <div class="col-md-6" style="padding-left:0">
                                                <input onchange=""  id="input-website"  class="form-control answer-val" type="text" oninput="" placeholder="Website (Optional)"  name="website"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                @else

                @endif


                @endforeach
                </div> {{--end of the tab--}}
                <br><br>
                <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" class="" id="nextBtn" onclick="nextPrev(1)" style="display:none">Next</button>
                </div>
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">

                <?php $setChecker = null; ?>

                @foreach ($freeQuestions as $key=>$question)

                @if ($setChecker== $question->qset_id)

                @else

                @if ($key !=0 )

                </span>{{--end of the tab--}}
                @endif
                <span class="step">{{--start of the tab--}}
                    @endif

                    @if ($setChecker== $question->qset_id)

                    @else
                    <?php $setChecker =  $question->qset_id ?>
                    @endif

                    @endforeach
                </span> {{--end of the tab--}}

                </div>

                {{-- <input
                    type="text"
                    name="selectedBussTypeId"
                    v-model="selectedBussTypeId"
                    value="1"
                    class="form-control"
                    hidden
                /> --}}

            </form>
        </div>
    </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</div>


<div class="container mb-5" id="footer-continue">
    @if(Route::current()->getName() == 'freeQuestions')
    <div class="row">
        <div class="col-md-12">
            <center>
                <button type="button" id="continueLater" class="btn btn-outline-primary btn-lg rounded-0" data-toggle="modal" data-target="#getInfo">CONTINUE LATER</button>
                <span width="20px">&nbsp &nbsp</span>
                {{-- <button type="button"  id="calculateValue" onclick="document.getElementById('nextBtn').click()" class="btn btn-secondary btn-lg rounded-0 disabled">CALCULATE VALUE</button> --}}
                <button type="button"  id="calculateValue" onclick="" class="btn btn-secondary btn-lg rounded-0 disabled">CALCULATE VALUE</button>
                {{-- <button type="button"  id="calculateValue" onclick="findTotalTrafficSource()" class="btn btn-secondary btn-lg rounded-0 disabled">CALCULATE VALUE</button> --}}
                <br>
                <br>
            </center>

        </div>
    </div>
    @endif
</div>


{{-- modal for getting client info --}}
<div class="modal fade freeQuestion" id="getInfo" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body ">

            <form role="form" class="px-5" action="/freequestions" method="get"  enctype="multipart/form-data">

                <div class="form-group ">

                        <input id="continue_website" type="text" class="form-control  " placeholder="Website">

                </div>
                <div class="form-group ">

                        <input id="continue_name" type="text" class="form-control"  placeholder="Name" required>


                </div>
                <div class="form-group ">


                        <input id="continue_email" type="email" class="form-control"  placeholder="Email"  required>

                </div>
                <div class="form-group  form-check text-center">
                    <input type="checkbox" class="form-check-input text-left" style="width:15px; height:15px; margin-left: -20px;" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">
                        <span style="color:white">I have read and accept the</span>
                        <span style="color:#5cd0a1">Terms & Conditions</span>
                    </label>
                </div>

                <div class="form-group ">
                    <center>
                        <button type="button" onclick="continueLater_update()" class="btn btn-primary .mx-auto " style="background-color:#5cd0a1">
                            CONTINUE LATER
                        </button>
                    </center>
                </div>
                </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> --}}
      </div>
    </div>
</div>
<script type="text/javascript">
    $(window).on('load', function() {

        // $('#getInfo').modal('show');
    });
</script>

<script>


function continueLater_update(){

    //Set the Form's action button to method continue
    // document.getElementById("regForm").setAttribute( "action", "continue" );

    //Update the values of email and continue later
    document.getElementById("input-email").value = document.getElementById("continue_email").value;
    document.getElementById("input-name").value = document.getElementById("continue_name").value;
    document.getElementById("input-website").value = document.getElementById("continue_website").value;
    document.getElementById("input-continueLater").value = 1;

    // Submit Form
    document.getElementById('regForm').submit()

}


function submitFreeQuestion(){

 var tot = findTotalTrafficSource()
    if (tot>100){
        // swal_info
        swal_info('Error','Traffic Source Should not exceed 100%');
        document.getElementById("52").scrollIntoView({
            behavior: 'auto',
            block: 'center',
            inline: 'center'
        });
    }
    else if (tot>100) {
        // swal_info('Error','Traffic Source Should not exceed 100%');
    } else {
        // document.getElementById('nextBtn').click();
        document.getElementById("regForm").submit();
    }
                //
}






function findTotalTrafficSource(){
    var arr = document.getElementsByName('52-7[]')
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    return  tot;
    // alert(tot);
}






	//get settings values
	<?php
	$settings= $settings;
	$data_settings = json_encode($settings);
	echo " var settings = ". $data_settings . ";\n";
	?>


  var currentTab = 0; // Current tab is set to be the first tab (0)
  var nextRef = 0;
  showTab(currentTab); // Display the current tab

  function itemOptions(n){
    //   return 'fdf';
    // N Options => 1 = Length, 2 = first Item, 3 = Last Item

    // var item_count = document.querySelectorAll('.tab-block .question_item');
    var items = document.querySelectorAll('.tab-block .question_item');

    if(n==1){
        return items.length;
    }
    if (n==2) {
        return items [0] ;
    }
    if (n==3) {
        return items [items.length -1];
    }else {
        return null;
    }
  }

  function showNextQuestion(n){
    // alert(n);
    console.log(n);
    // console.log(itemOptions(1));
    // questionCount = {{count($freeQuestions) }};


    //show the last question for client  why are you looking for a valuation
    if(n>=15 ){
        // alert( n.lengt);
      document.getElementById("question-clientReason").classList.remove("hidden");
      document.getElementById("question-clientReason").classList.add("question-block");


    //   document.getElementById("calculateValue").classList.add("btn-success");
    //   document.getElementById("calculateValue").classList.remove("btn-secondary");

    }
    else{
        // document.getElementById("calculateValue").classList.remove("bg-success");
        // document.getElementById("calculateValue").classList.add("btn-secondary");
    }
    // else if(n<16){
    //     document.getElementById("question-clientReason").classList.remove("hidden");
    //   document.getElementById("question-clientReason").classList.add(" question-block");
    // }



    nextItemKey = n + 1;
    nextItemClass = '.qkey-'+nextItemKey;
    var question = document.querySelectorAll( nextItemClass);


    // console.log(question);

    if(question.length!=0){
        question[0].classList.remove("question-hidden");
        question[0].classList.add("question-block");

        // question[0].scrollIntoView(false);
        // question[0].scrollIntoView();
        question[0].scrollIntoView({
            behavior: 'auto',
            block: 'center',
            inline: 'center'
        });

        // console.log(question[0]);

        console.log(nextItemKey  +' - '+ (itemOptions(1)+ nextRef));


        if (nextItemKey==(itemOptions(1)+ nextRef)) {
            // alert("already next tab");
            document.getElementById("nextBtn").style.display = "inline-block";

            // alert(nextRef);
        } else {

        }
    }

  }


  function showTab(n) {
    // This function will display the specified tab of the form...
    // document.getElementById("nextBtn").style.display = "none";

    var x = document.getElementsByClassName("tab");
    var item_count = document.querySelectorAll('.tab-block .question_item').length;

    //updated change of display for each block using class
    x[n].classList.remove("tab-hidden");
    x[n].classList.add("tab-block");

    // Get first and last item
    first_item = document.querySelectorAll('.tab-block .question_item')[0];
    last_item = document.querySelectorAll('.tab-block .question_item')[item_count -1];

    //Show first question of each tab
    itemOptions(2).classList.remove("question-hidden");
    itemOptions(2).classList.add("question-block");



    if (n==0) {
        // nextRef =  document.querySelectorAll('.tab-block .question_item').length;
        // alert(nextRef);
        nextRef=0;
        // alert(nextRef);
    } else {
        // nextRef = document.querySelectorAll('.tab-block .question_item').length;
    // alert(nextRef);


    }

    // alert(n + "---" + (x.length-1));
    //... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";

    } else {
      document.getElementById("prevBtn").style.display = "inline";
      document.getElementById("nextBtn").style.display = "inline-block";

    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").style.display = "inline-block";
    //   document.getElementById("nextBtn").innerHTML = "Submit";
    document.getElementById("nextBtn").style.display = "none";


    //   document.getElementById("calculateValue").classList.remove("disabled");
    //   document.getElementById("calculateValue").classList.remove("btn-secondary");
    //   document.getElementById("calculateValue").classList.add("btn-succes");
    } else {
      document.getElementById("nextBtn").innerHTML = "Next";

    //   document.getElementById("calculateValue").classList.add("disabled");
    //   document.getElementById("calculateValue").classList.remove("btn-succes");

    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
  }

  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    // x[currentTab].style.display = "none";

    var testn = 1+n;


    if (testn==0) {

    } else {

        document.getElementById("nextBtn").style.display = "none";
        // alert('');
    }


    nextRef = nextRef +  document.querySelectorAll('.tab-block .question_item').length;


    x[currentTab].classList.remove("tab-block");
    x[currentTab].classList.add("tab-hidden");
    // x[n].classList.add("tab-hidden");


    // x[n].classList.remove("tab-hidden");

    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;



    // if you click the next button from 1 tab before the last tab
    if (currentTab >= (x.length -1)) {

            // alert('last tab');
    document.getElementById("calculateValue").classList.add("btn-success");
      document.getElementById("calculateValue").classList.remove("btn-secondary");
      document.getElementById("calculateValue").classList.remove("disabled");
    //   document.getElementById("calculateValue").onclick=submitFreeQuestion();

      document.getElementById("calculateValue").setAttribute( "onClick", "submitFreeQuestion()" );
    }
    else{
      document.getElementById("calculateValue").classList.remove("btn-succes");
      document.getElementById("calculateValue").classList.add("disabled");
      document.getElementById("calculateValue").classList.add("btn-secondary");
      document.getElementById("calculateValue").setAttribute( "onClick", "" );

    }


    // if you have reached the end of the form...
    if (currentTab >= (x.length)) {

      // ... the form gets submitted:
    //   document.getElementById("regForm").submit();

    // alert('last tab');
    // $('#myModal').modal('show');
    // // alert('fdf');
    //   return false;

    }



    // Otherwise, display the correct tab:
    showTab(currentTab);
  }

  function validateForm() {

    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false
        valid = false;
      }


      var currName = y[i].name

      //If radio validation
      if(y[i].type=="radio"){
        if ($('input[name='+currName+']:checked').length > 0) {
            // do something here
            // document.getElementsByName(y[i].name)[0].parentElement.parentElement.parentElement.style.backgroundColor= 'white';
        }
        else{
            valid = false;
            document.getElementsByName(y[i].name)[0].focus();
            // document.getElementsByName('2-1')[0].parentElement.parentElement.parentElement.className += " invalidSelect ";
            // document.getElementsByName(y[i].name)[0].parentElement.parentElement.parentElement;
            console.log(document.getElementsByName(y[i].name)[0].parentElement.parentElement.parentElement.id);
            // document.getElementsByName('2-1')[0].parentElement.parentElement.parentElement.className += " invalidSelect ";
            document.getElementsByName(y[i].name)[0].parentElement.parentElement.parentElement.style.backgroundColor= '#ffdddd';
            console.log(y[i].name);
        }

      }

    }


	if(currentTab==0){

var total_revenue_12_months_id =  settings.filter( function(settings){return (settings.name=='total_revenue_12_months');} );
var total_cost_goods_sold_12_months_id =  settings.filter( function(settings){return (settings.name=='total_cost_goods_sold_12_months');} );
var total_operating_expense_12_months_id =  settings.filter( function(settings){return (settings.name=='total_operating_expense_12_months');} );


 var total_revenue_12_months_value =   document.getElementById('input-'+total_revenue_12_months_id[0]['value']).value;
 var total_cost_goods_sold_12_months_value =   document.getElementById('input-'+total_cost_goods_sold_12_months_id[0]['value']).value;
 var total_operating_expense_12_months_value =   document.getElementById('input-'+total_operating_expense_12_months_id[0]['value']).value;

    // console.log(total_operating_expense_12_months_value);

   var netprofit  = (total_revenue_12_months_value  - total_cost_goods_sold_12_months_value - total_operating_expense_12_months_value  );

// var netprofit = parseFloat(total_revenue_12_months_value) - parseFloat(total_cost_goods_sold_12_months_id) - parseFloat(total_operating_expense_12_months_id);


// alert('revenue 12 months-'+ total_operating_expense_12_months_value);
// alert(netprofit );
// console.log(netprofit);

if (netprofit<0){
    // alert('Net Profit is Invalid and less than 0');
    swal_info('Error','Net Income is negative');

    document.getElementById('input-'+total_revenue_12_months_id[0]['value']).scrollIntoView({
            behavior: 'auto',
            block: 'center',
            inline: 'center'
        });

    valid = false;
}

}


    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
  }

  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
  }

  $(document).ready(function(){

        // var highestBox = 0;
        // $('.btn-group .btn ').each(function(){
        //             if($(this).height() > highestBox){
        //             highestBox = $(this).height();
        //     }
        // });
        // $('.btn-group .btn ').height(highestBox);

   });

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

</script>

@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">CMS</a></li>
<li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
@endsection
