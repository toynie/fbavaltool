
{{-- {{dd($answer)}} --}}

@extends('layouts.masterAdmin')

@section('page-title')
    Update New Question Set
@endsection

@section('content')

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Update</h3>
  </h3>

  </div>
  <!-- /.card-header -->

  {{-- {{dd($businessTypeQuestionPivot)}} --}}
  {!! Form::model($answer, ['method'=>'PATCH','action'=>['CustomAnwerController@update',$answer->id],'autocomplete'=>'off','files' => true]) !!}
  <div class="card-body">

    <div class="row">
      <div class="col-md-5 ">
        <div class="form-group">
          {!! Form::label('name', 'User Input', ['class' => 'control-label', 'for'=>'qName']) !!}
          {!! Form::text('userInput',$answer->userInput, ['type'=>'text', 'placeholder'=>'Enter Question', 'required' => 'required','class' => 'form-control', 'id'=>'qName']) !!}

        </div>
      </div>
      <div class="col-md-5 ">
        <div class="form-group">
          {!! Form::label('name', 'Tool Input', ['class' => 'control-label', 'for'=>'qName']) !!}
          {!! Form::text('toolInput',$answer->toolInput, ['type'=>'text', 'placeholder'=>'Enter Question', 'required' => 'required','class' => 'form-control', 'id'=>'qName']) !!}

        </div>
      </div>
      {{-- <div class="col-md-2">
        <div class="form-group">
          {!! Form::label('position', 'Position', ['class' => 'control-label', 'for'=>'qsetPostion']) !!}
          {!! Form::number('position',$answer->position, ['placeholder'=>'Enter its position on the list','min'=>'1', 'required' => 'required', 'class' => 'form-control', 'id'=>'qsetPostion']) !!}
        </div>
      </div> --}}


      {{-- {{dd($answer->business_question_id)}} --}}



        {!! Form::hidden('qsetId', $answer->qSetId) !!}
        {{-- {!! Form::hidden('question_id', $answer->question_id) !!} --}}
        {!! Form::hidden('business_question_id', $answer->business_question_id) !!}
        {!! Form::hidden('answerId', $answer->id) !!}

    </div>

    <div class="row">
        <div class="col-md-1">
            <div class="form-group">
              {!! Form::label('grade', 'Grade (1-5)', ['class' => 'control-label', 'for'=>'grade']) !!}
              {!! Form::number('grade',$answer->grade, ['placeholder'=>'Enter Grade', 'step'=>'any', 'min'=>'0', 'max'=> '5', 'required' => 'required',  'class' => 'form-control', 'id'=>'grade']) !!}
            </div>
          </div>

        <div class="col-md-1">
            <div class="form-group">
              {!! Form::label('impact', 'Impact (1-5)', ['class' => 'control-label', 'for'=>'impact']) !!}
              {!! Form::number('impact',$answer->impact, ['placeholder'=>'Enter Impact', 'min'=>'1', 'max'=> '5','required' => 'required', 'class' => 'form-control', 'id'=>'impact']) !!}
            </div>
          </div>

        <div class="col-md-1">
            <div class="form-group">
              {!! Form::label('sellability', 'Sellability (1-5)', ['class' => 'control-label', 'for'=>'sellability']) !!}
              {!! Form::number('sellability',$answer->sellability, ['placeholder'=>'Enter Sellability','min'=>'1', 'max'=> '5', 'class' => 'form-control', 'id'=>'sellability']) !!}
            </div>
        </div>
    </div>
    {{-- {{dd($question)}} --}}
    {{-- {{dd(json_decode($question)[0]->type)}} --}}
    {{-- {{dd($answer->dat1)}} --}}
    <div class="row"  id="row-datVal"  @if ((json_decode($question)[0]->type) !=11 ) style="display:none"@endif  >
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('dat1', 'Data 1 (Value From %)', ['class' => 'control-label',
                'for' => 'dat1']) !!}
                {!! Form::number('dat1',$answer->dat1, ['placeholder' => 'Enter a value',  'min' => '0',  'class' => 'form-control', 'id' => 'dat1']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('dat2', 'Data 2 (Value To %)', ['class' => 'control-label',
                'for' => 'dat2']) !!}
                {!! Form::number('dat2',$answer->dat2, ['placeholder' => 'Enter a value',  'min' => '0', 'class' => 'form-control', 'id' => 'dat2']) !!}
            </div>
        </div>

    </div>
    {{-- <div class="row">
        <div class="col-md-1">
            <div class="form-group">
            <i class="fa fa-flag" style="color:red" aria-hidden="true"></i>
            {!! Form::label('redFlag', 'Red Flag', ['class' => 'control-label', 'for'=>'redFlag']) !!}
            {!! Form::select('redFlag', array('0' => 'False','1' => 'True',),$answer->redFlag, array('class'=>'form-control','style'=>'', 'id'=>'redFlag' )) !!}
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
            <i class="fa fa-flag" style="color:yellow" aria-hidden="true"></i>
            {!! Form::label('yellowFlag', 'Yellow Flag', ['class' => 'control-label', 'for'=>'yellowFlag']) !!}
            {!! Form::select('yellowFlag', array('0' => 'False','1' => 'True',),$answer->yellowFlag, array('class'=>'form-control','style'=>'', 'id'=>'yellowFlag' )) !!}
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
            <i class="fa fa-flag" style="color:green" aria-hidden="true"></i>
            {!! Form::label('greenFlag', 'Green Flag', ['class' => 'control-label', 'for'=>'greenFlag']) !!}
            {!! Form::select('greenFlag', array('0' => 'False','1' => 'True',),$answer->greenFlag, array('class'=>'form-control','style'=>'', 'id'=>'greenFlag' )) !!}
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
            <i class="fa fa-flag" style="color:purple" aria-hidden="true"></i>
            {!! Form::label('purpleFlag', 'Purple Flag', ['class' => 'control-label', 'for'=>'purpleFlag']) !!}
            {!! Form::select('purpleFlag', array('0' => 'False','1' => 'True',),$answer->purpleFlag, array('class'=>'form-control','style'=>'', 'id'=>'purpleFlag' )) !!}
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
            <i class="fa fa-flag" style="color:black" aria-hidden="true"></i>
            {!! Form::label('blackFlag', 'Black Flag', ['class' => 'control-label', 'for'=>'blackFlag']) !!}
            {!! Form::select('blackFlag', array('0' => 'False','1' => 'True',),$answer->blackFlag, array('class'=>'form-control','style'=>'', 'id'=>'blackFlag' )) !!}
            </div>
        </div>

    </div> --}}

    {{-- {{dd($data)}} --}}

    <div class="row">
        <div class="col-md-4 ">
            {!! Form::label('valScoreImpactComment', 'Valuation Score Impact Comments', ['class' => 'control-label', 'for'=>'isFree']) !!}
                <div class="">
                    <div class="form-group">

                    {{-- {!! Form::label('Title', 'Title', ['class' => 'control-label', 'for'=>'isFree']) !!} --}}
                    {!!    Form::text('valCommentTitle',
                        // json_decode( $answer->valScoreImpactComment, true)['title'] ,

                        json_decode($answer->valScoreImpactComment)->title,
                        [
                        'class'      => 'form-control ',
                        'rows'       => 4,
                        'name'       => 'valCommentTitle',
                        'id'         => 'valCommentTitle',
                        'onkeypress' => "return nameFunction(event);",
                        'placeholder'=>'Enter title here',
                    ]) !!}
                    {{-- {!! Form::label('Body', 'Body', ['class' => 'control-label', 'for'=>'isFree']) !!} --}}
                        <br>
                    {!!    Form::textarea(
                        'valCommentBody',
                        json_decode($answer->valScoreImpactComment)->body,
                        [
                            'class'      => 'form-control ',
                            'rows'       => 4,
                            'name'       => 'valCommentBody',
                            'id'         => 'valCommentBody',
                            'onkeypress' => "return nameFunction(event);",
                            'placeholder'=>'Enter body here',
                        ])
                    !!}
                    </div>

                </div>
        <div class="col-md-4">
            <div class="form-group">
            {!! Form::label('popUnderComment', 'Pop-under Comments', ['class' => 'control-label', 'for'=>'isFree']) !!}
            {!!    Form::textarea('My text',$answer->popUnderComment, [
                'class'      => 'form-control ',

                'rows'       => 4,
                'name'       => 'popUnderComment',
                'id'         => 'popUnderComment',
                'onkeypress' => "return nameFunction(event);"
            ]) !!}
            </div>
        </div>

        {{-- <div class="col-md-4">
            <div class="form-group">
            {!! Form::label('Info (Question Explanation)', 'Info (Question Explanation)', ['class' => 'control-label', 'for'=>'isFree']) !!}
            {!!    Form::textarea('My text', $answer->valScoreImpactComment, [
                'class'      => 'form-control ',
                'rows'       => 4,
                'name'       => 'info',
                'id'         => 'txt',
                'onkeypress' => "return nameFunction(event);"
            ]) !!}
            </div>
        </div> --}}
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
            {!! Form::label('Confidence Score Impact', 'Confidence Score Impact', ['class' => 'control-label' ]) !!}
            {!!    Form::number('My text', null, [
                'class'      => 'form-control ',
                'rows'       => 4,
                'name'       => 'confidenceImpactScore',
                'id'         => 'confidenceImpactScore',
                'onkeypress' => "return nameFunction(event);"
            ]) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
            {!! Form::label('Confidence Score Impact Comment', 'Confidence Score Impact Comment', ['class' => 'control-label']) !!}
            {!!    Form::textarea('My text', null, [
                'class'      => 'form-control ',
                'rows'       => 4,
                'name'       => 'confidenceImpactScoreComment',
                'id'         => 'confidenceImpactScoreComment',
                'onkeypress' => "return nameFunction(event);"
            ]) !!}
            </div>
        </div>
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
    {!! Form::hidden('businessTypeQuestionPivot', $businessTypeQuestionPivot) !!}
    {!! Form::submit('Submit',['class' => 'btn btn-primary float-right']) !!}
  </div>
  {!!Form::close()!!}
</div>



@endsection

@section('breadcrumb')

          {{-- {{dd($answer->business_question_id)}} --}}
          {{-- {{dd(json_decode($businessTypeQuestionPivot)->question_id)}} --}}
    <li class="breadcrumb-item"><a href="{{route('cms.')}}">CMS</a></li>
    <li class="breadcrumb-item active"><a href="{{route('cms.bussTypes.index')}}">Business Types</a></li>
    <li class="breadcrumb-item active"><a href="{{route('cms.question.index',
    ['bussType'=>json_decode($businessTypeQuestionPivot)->busstype_id,
    'question_id'=>json_decode($businessTypeQuestionPivot)->question_id
    ])}}">Questions</a></li>
@endsection
