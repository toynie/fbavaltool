@extends('layouts.masterFrontend')

@section('page-title')

Paid Output
@endsection




@push('stack-styles')
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <style type="text/css">
    html {
        scroll-behavior: smooth;
    }

    * {
    box-sizing: border-box;
    }

    body {
        background: #f1f1f1;
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

    div.btngrp-question-answer > label{
            background-color: unset;
            color: 182b62;
            border: 2px solid #182b62;
            border-radius: 4px !important;
            white-space: normal;
    }

    .btngrp-question-answer>.btn:first-child,.btngrp-question-answer>.btn:last-child {
        margin-right: 8px !important;
        {{-- padding-left: 30px; --}}
        padding-right: 30px;

    }

    .btngrp-question-answer.btn-primary:not(:disabled):not(.disabled).active{
        background-color: #587213;
    }

    .btngrp-question-answer.btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active {
        background-color: #182b62;
        box-shadow: 1px 2px 2px 2px #888888a1;
    }
    .btngrp-question-answer .btn.active.focus, .btngrp-question-answer .btn.focus{
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
    width:100%;
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

    .dfb-answer-number{

    }
    $calculateValue{
        background-color: #5bd0a1;
    }
    #calculateValue{
        background-color: #5bd0a1;
    }

    .questions-container {
        background: #f3f3f3;
    }

    </style>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
@endpush



{{--
    1 = select
    2 = list  //blank
    3 =  yes no// button group
    4 = val int    //yes no   radio
    5 = val text     //val num
    6 = check list //blank
    7 = multiple val array
    8 = Integer Range Question
    9 = Conditional value with customize valuation effect
    10 = Hidden Question
    */
 --}}







@section('content')

<div class="questions-container">
    <div class="container questions-container py-5" >
        <div id="react_app"></div>
    </div>
</div>

    {{-- {{dd($transaction)}} --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="/react/index.js" type="text/javascript"></script>
  <!-- Modal -->
</div>

@endsection
