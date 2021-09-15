Skip to content
Search or jump to…

Pull requests
Issues
Marketplace
Explore
 
@ialexies 
ialexies
/
fbavaltool
Private
1
0
0
Code
Issues
Pull requests
2
Actions
Projects
Security
4
Insights
Settings
fbavaltool/resources/views/frontend/free_questions.blade.php
@ialexies
ialexies working multistep without validation
Latest commit 03f01a2 9 hours ago
 History
 1 contributor
570 lines (483 sloc)  17.8 KB
  


@extends('layouts.masterFrontend')

@section('page-title')

Paid Output
@endsection

@section('custom-style')

/*custom font*/
@import url(https://fonts.googleapis.com/css?family=Montserrat);

/*basic reset*/
* {
    margin: 0;
    padding: 0;
}

html {
    {{-- height: 100%; --}}
    {{-- background: #6441A5; /* fallback for old browsers */ --}}
    {{-- background0: -webkit-linear-gradient(to left, #6441A5, #2a0845); /* Chrome 10-25, Safari 5.1-6 */ --}}
}

body {
    font-family: montserrat, arial, verdana;
    background: transparent;
}

/*form styles*/
#msform {
    {{-- text-align: center; --}}
    position: relative;
    margin-top: 30px;

}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0px;
    box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
    padding: 20px 30px;
    box-sizing: border-box;
    width: 100%;
    {{-- margin: 0 10%; --}}

    /*stacking fieldsets above each other*/
    position: relative;
    border: 5px solid #182b62;
}

/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
    display: none;
}

/*inputs*/
#msform input, #msform textarea {
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 10px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    font-size: 13px;
}

#msform input:focus, #msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #ee0979;
    outline-width: 0;
    transition: All 0.5s ease-in;
    -webkit-transition: All 0.5s ease-in;
    -moz-transition: All 0.5s ease-in;
    -o-transition: All 0.5s ease-in;
}

/*buttons*/
#msform .action-button {
    width: 100px;
    background: #182b62;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
    float:right;
}

#msform .action-button:hover, #msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #182b62;
    border-radius: 15px;
}

#msform .action-button-previous {
    width: 100px;
    background: #C5C5F1;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 25px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}

#msform .action-button-previous:hover, #msform .action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #C5C5F1;
}

/*headings*/
.fs-title {
    font-size: 18px;
    text-transform: uppercase;
    color: #2C3E50;
    margin-bottom: 10px;
    letter-spacing: 2px;
    font-weight: bold;
}

.fs-subtitle {
    font-weight: normal;
    font-size: 13px;
    color: #666;
    margin-bottom: 20px;
}

/*progressbar*/
#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    /*CSS counters to number the steps*/
    counter-reset: step;

}

#progressbar li {
    list-style-type: none;
    color: white;
    text-transform: uppercase;
    font-size: 9px;
    width: 3.33%;
    float: left;
    position: relative;
    letter-spacing: 1px;
}

#progressbar li:before {
    content: counter(step);
    counter-increment: step;
    width: 24px;
    height: 24px;
    line-height: 26px;
    display: block;
    font-size: 12px;
    color: white;
    background: #182b62;
    border-radius: 25px;
    margin: 0 auto 10px auto;
}

/*progressbar connectors*/
#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: #182b62;
    position: absolute;
    left: -50%;
    top: 9px;
    z-index: -1; /*put it behind the numbers*/
}

#progressbar li:first-child:after {
    /*connector not needed before the first step*/
    content: none;
}

/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before, #progressbar li.active:after {
    background: #ee0979;
    color: white;
}


/* Not relevant to this form */
.dme_link {
    margin-top: 30px;
    text-align: center;
}
.dme_link a {
    background: #FFF;
    font-weight: bold;
    color: #ee0979;
    border: 0 none;
    border-radius: 25px;
    cursor: pointer;
    padding: 5px 25px;
    font-size: 12px;
}

.dme_link a:hover, .dme_link a:focus {
    background: #C5C5F1;
    text-decoration: none;
}

@endsection

@section('content')



<!-- MultiStep Form -->
<div class="row">
    <div class="col-md-12 ">
        <form id="msform" action="/api/addQA" method="post">
            <!-- progressbar -->
            <ul id="progressbar" class="text-center">

                @foreach ($freeQuestions as $question)
                {{-- <li class="active"></li> --}}
                <li></li>
                @endforeach


               {{-- <li>Account Setup</li> --}}
            </ul>
            <!-- fieldsets -->

            @foreach ($freeQuestions as $question)
           <fieldset class="p-5">
                <h2>{{ $question->name}}</h2>
                <br>

                @if ($question["type"] == 1)
                    {{-- Question is select  --}}
                    <br>
                    {{ $question->typeStyle}}
                    <div>

                        @if ($question->typeStyle == '1radio')
                        This is a Radio
                        <div class="row ml-2 mt-3" >
                            @foreach ($question["answers"] as $key=> $answer["id"] )
                                <label>
                                    <input
                                    type="radio"
                                    checked
                                    name="{{question['id']}} - {{[question.type]}}"
                                    v-bind:value="{{answer['id']}}"
                                    {{-- v-on:change="
                                        addQA(question.id, answer.id, question.type)
                                    " --}}
                                    required
                                    />
                                </label>
                                {{$answer[userInput]}}
                            @endforeach

                        </div>
                        @elseIf ($question->typeStyle == '1listBox')
                            <div class="form-group ml-md-3">
                                <!-- <label for="sel1">Select list (select one):</label> -->
                                <select
                                    class="form-control multiple-answer-select"

                                    name="{{$question->id}}-{{$question->type}}"
                                    required
                                >
                                    <option value selected disabled>
                                    Please select
                                    </option>


                                    @foreach ($question->answers as  $answer)
                                    <option

                                    id="{{$question->id}}-{{$answer->id}}"
                                    value="{{$answer->id}}"

                                    >
                                    {{ $answer->id }}-{{ $answer->userInput }}
                                    </option>
                                    @endforeach




                                </select>
                                </div>
                        @else
                            <div class="row dfbSelectAnser">
                                @foreach ($question->answers as $key=>$answer)
                                <div class="col-md-6 custom-control custom-radio my-3">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div
                                        class="bg-success border border-primary border-left-0 border-top-0 border-bottom-0 dfbThickBorder dfbSelectAnser-left justify-content-center align-self-center py-3 px-3"
                                        >
                                        {{ chr(65 + $key) }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <input  type="radio" id="answer.id" name="{{$question->id}}-{{$question->type}}"
                                        value="{{$answer->id}}"
                                        class="custom-control-input"
                                        {{-- @click="
                                            activeBtn = question.id-answer.id
                                        " --}}
                                        />
                                        <label
                                        class="custom-control-label"
                                        style="width: 100%"
                                        for="{{$answer->id}}"
                                        >
                                        <div
                                            class="btn btn-default text-left btn-block pl-0"
                                            style="
                                            margin-bottom: 4px;
                                            white-space: normal;
                                            "
                                        >
                                            {{ $answer->userInput }}
                                        </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                @elseIf($question->type == 2)
                    {{-- Type 2 --}}
                    <div class="row answer ml-sm-3 pt-2">
                        <div class="col">

                          <input
                            class="form-control answer-val"
                            type="number"
                            placeholder="Enter Value"
                            {{-- @input="
                              addQA(
                                question.id,
                                $event.target.value,
                                question.type
                              )
                            " --}}
                            name="{{$question->id}}-{{$question->type}}"
                            required
                          />

                          <!-- <input
                          class="form-control answer-val"
                          type="text"
                          placeholder="Default input"
                          />-->
                        </div>
                    </div>
                @elseIf($question->type == 3)
                    Type 3

                    <div class="row answer ml-md-3 pt-2">
                            @foreach ($question->answers as $key=> $answer)
                            <div
                            class="col-md-6"
                            role="group"
                            aria-label="Basic example"
                            {{-- v-for="answer in question.answers"
                            :key="answer.id" --}}
                            {{-- v-on:click="
                            addQA(question.id, answer.id, question.type)
                            " --}}
                            id="{{$question->id}}'-'{{$answer->id}}"
                            >

                            <div
                                class="h-5 d-md-none d-md-none d-lg-none d-xl-block"
                            >
                                &nbsp
                            </div>
                            <input
                                class="btn pull-right btn-outline-success btn-lg btn-block btnyesno"
                                type="button"
                                name="{{$question->id}}-{{$question->type}}"
                                value="{{$answer->userInput}}"
                                required
                            />

                            </div>
                        @endforeach



                      </div>
                @elseIf($question->type == 4)

                <div class="row answer ml-3 py-3">

                    @foreach ($question->answers as $key=>$answer)
                        <div class="col-md-6 required" >
                            <div class="form-group">
                                <label class="control-label col-sm-6" for="email">{{$answer->userInput}}</label>
                                <div class="col-sm-6">
                                <input type="number" placeholder="Enter Value" id="{{$question->id}}-{{$answer->id}}" name="{{$question->id}}-{{$question->type}}[]" }}
                                >
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                @else

                @endif
                {{-- <div class="m-100 text-center pt-5"> --}}
                    <input type="button" name="next" class="next  action-button" value="Next"/>
                {{-- </div> --}}
                <input
                class="col-md-7 btn btn-primary"
                type="submit"
                value="Submit"
              />
            </fieldset>
           {{-- <fieldset>
                <h2 class="fs-title">Personal Details</h2>
                <h3 class="fs-subtitle">Tell us something more about you</h3>
                <input type="text" name="fname" placeholder="First Name"/>
                <input type="text" name="lname" placeholder="Last Name"/>
                <input type="text" name="phone" placeholder="Phone"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset> --}}


            @endforeach


            {{-- <fieldset>
                <h2 class="fs-title">Social Profiles</h2>
                <h3 class="fs-subtitle">Your presence on the social network</h3>
                <input type="text" name="twitter" placeholder="Twitter"/>
                <input type="text" name="facebook" placeholder="Facebook"/>
                <input type="text" name="gplus" placeholder="Google Plus"/>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Create your account</h2>
                <h3 class="fs-subtitle">Fill in your credentials</h3>
                <input type="text" name="email" placeholder="Email"/>
                <input type="password" name="pass" placeholder="Password"/>
                <input type="password" name="cpass" placeholder="Confirm Password"/>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="submit" name="submit" class="submit action-button" value="Submit"/>
            </fieldset> --}}
        </form>
        <!-- link to designify.me code snippets -->

        <!-- /.link to designify.me code snippets -->
    </div>
</div>
<!-- /.MultiStep Form -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>

<script>
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
$(".next").click(function(){
	if(animating) return false;
	animating = true;
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	//show the next fieldset
	next_fs.show();
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		},
		duration: 800,
		complete: function(){
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});
$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	//show the previous fieldset
	previous_fs.show();
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		},
		duration: 800,
		complete: function(){
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});
$(".submit").click(function(){
	return false;
})
</script>

@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">CMS</a></li>
<li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
@endsection
