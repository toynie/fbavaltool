@extends('layouts.masterAdmin')

@section('page-custom-css')
<style>
    .btn-toggle{  background: #b9b9b9; border-color:dimgray}
</style>

@endsection

@section('page-title')

Manage Answers

@endsection

@section('content')

{{-- {{dd($data)}} --}}
<b>Question : &nbsp</b> {{$data['question']->name}}<br>
<b>Question Type  &nbsp:</b> &nbsp {{ $data['set']['0']->name.' ('.$data['set']['0']->id.')'}}<br>
<b>Question Code :  &nbsp</b> {{'S.'.$data['set']['0']->id}}.{{$data['question']->qid}}
@if(!isset($data['businessQuestion_pivot']))
<br>
<b>Business Types :</b> &nbsp
    <div class="btn-group" role="group" aria-label="...">
        @foreach($data['Question_BussinessTypes'] as $bussType)
        <a type="button" target="_blank" href="/cms/question?bussType={{$bussType->id}}" class="btn btn-primary btn-sm">{{  $bussType->name}}</a>
            <!-- <a href="/cms/question?bussType={{$bussType->id}}">{{  $bussType->name}}</a>, -->
        @endforeach
    </div>
@endif
<br>

<b>Max Positive Multiplier : &nbsp</b>  &nbsp {{$data['question']->m_p_mult}}<br>
<b>Max Negative Multiplier : &nbsp</b>  &nbsp {{$data['question']->m_n_mult}}<br>
@if(isset($data['businessQuestion_pivot']))
<b>Custom Answer : </b>  &nbsp
    <button
        type="button"
        class="btn btn-toggle @if ($data['useCustomAnswer']==True)active @else @endif"
        onclick="updateCustomAnswer()"
        data-toggle="button"
        aria-pressed="false"
        autocomplete="off">
        <div class="handle"></div>
    </button>&nbsp &nbsp |  &nbsp &nbsp
        <form action="{{route('cms.customAnswer.index')}}" style="display: inline;">
            <input type="hidden" name="businessQuestion_pivot" value="{{$data['businessQuestion_pivot']->tojson()}}">
            <input type="hidden" name="setId" value="{{$data['set']['0']->id}}">
            <input type="hidden" name="setName" value="{{$data['set']['0']->name}}">
            <button type="submit" onclick="manageCustomAnswer" class="btn btn-primary btn-sm">Manage</button>
        </form>
    @endif

<br><br>

{{-- {{dd($data)}} --}}
{{-- {{dd($data['question']->type)}} --}}
<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#add_answer"> <i class="fas fa-list "></i>&nbsp Add </button>

<div id="add_answer" class="collapse">
  <br><br>
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add an answer</h3>
    </h3>
  </div>

    {!! Form::open(['route' => 'cms.answer.store', 'method' => 'POST', 'files' => true]) !!}
    <div class="card-body">

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            {!! Form::label('name', 'User Input', ['class' => 'control-label', 'for'=>'qName']) !!}
            {!! Form::text('userInput','', ['type'=>'text', 'placeholder'=>'Enter Question', 'required' => 'required','class' => 'form-control', 'id'=>'qName']) !!}
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            {!! Form::label('name', 'Tool Input', ['class' => 'control-label', 'for'=>'qName']) !!}
            {!! Form::text('toolInput','', ['type'=>'text', 'placeholder'=>'Enter Question', 'required' => 'required','class' => 'form-control', 'id'=>'qName']) !!}
          </div>
        </div>



        {!! Form::hidden('question_id', $data['question']->id) !!}
        {!! Form::hidden('qSetId', $data['set']['0']->id) !!}

        {{--<div class="col-md-2">
          <div class="form-group">
            {!! Form::label('position', 'Position', ['class' => 'control-label', 'for'=>'qsetPostion']) !!}
            {!! Form::number('position',$highestPosition, ['placeholder'=>'Enter its position on the list','min'=>'1', 'required' => 'required', 'class' => 'form-control', 'id'=>'qsetPostion']) !!}
          </div>
        </div>


          {!! Form::hidden('qsetId', $qset->id) !!}

          --}}

      </div>

      <div class="row">
          <div class="col-md-3">
              <div class="form-group">
                {!! Form::label('grade', 'Grade (1-5)', ['class' => 'control-label', 'for'=>'grade']) !!}
                {!! Form::number('grade',1, ['placeholder'=>'Enter Grade',  'min'=>'1', 'max'=> '5', 'required' => 'required',  'class' => 'form-control', 'id'=>'grade']) !!}
              </div>
            </div>

          <div class="col-md-3">
              <div class="form-group">
                {!! Form::label('impact', 'Impact (1-5)', ['class' => 'control-label', 'for'=>'impact']) !!}
                {!! Form::number('impact',1, ['placeholder'=>'Enter Impact', 'min'=>'1', 'max'=> '5','required' => 'required', 'class' => 'form-control', 'id'=>'impact']) !!}
              </div>
            </div>

          <div class="col-md-3">
              <div class="form-group">
                {!! Form::label('sellability', 'Sellability (1-5)', ['class' => 'control-label', 'for'=>'sellability']) !!}
                {!! Form::number('sellability',1, ['placeholder'=>'Enter Sellability','min'=>'1', 'max'=> '5', 'required' => 'required', 'class' => 'form-control', 'id'=>'sellability']) !!}
              </div>
          </div>
      </div>

      <div class="row" hidden>
          <div class="col-md-1">
              <div class="form-group">
              <i class="fa fa-flag" style="color:red" aria-hidden="true"></i>
              {!! Form::label('redFlag', 'Red Flag', ['class' => 'control-label', 'for'=>'redFlag']) !!}
              {!! Form::select('redFlag', array('0' => 'False','1' => 'True',),null, array('class'=>'form-control','style'=>'', 'id'=>'redFlag' )) !!}
              </div>
          </div>
          <div class="col-md-1">
              <div class="form-group">
              <i class="fa fa-flag" style="color:yellow" aria-hidden="true"></i>
              {!! Form::label('yellowFlag', 'Yellow Flag', ['class' => 'control-label', 'for'=>'yellowFlag']) !!}
              {!! Form::select('yellowFlag', array('0' => 'False','1' => 'True',),null, array('class'=>'form-control','style'=>'', 'id'=>'yellowFlag' )) !!}
              </div>
          </div>
          <div class="col-md-1">
              <div class="form-group">
              <i class="fa fa-flag" style="color:green" aria-hidden="true"></i>
              {!! Form::label('greenFlag', 'Green Flag', ['class' => 'control-label', 'for'=>'greenFlag']) !!}
              {!! Form::select('greenFlag', array('0' => 'False','1' => 'True',),null, array('class'=>'form-control','style'=>'', 'id'=>'greenFlag' )) !!}
              </div>
          </div>
          <div class="col-md-1">
              <div class="form-group">
              <i class="fa fa-flag" style="color:purple" aria-hidden="true"></i>
              {!! Form::label('purpleFlag', 'Purple Flag', ['class' => 'control-label', 'for'=>'purpleFlag']) !!}
              {!! Form::select('purpleFlag', array('0' => 'False','1' => 'True',),null, array('class'=>'form-control','style'=>'', 'id'=>'purpleFlag' )) !!}
              </div>
          </div>
          <div class="col-md-1">
              <div class="form-group">
              <i class="fa fa-flag" style="color:black" aria-hidden="true"></i>
              {!! Form::label('blackFlag', 'Black Flag', ['class' => 'control-label', 'for'=>'blackFlag']) !!}
              {!! Form::select('blackFlag', array('0' => 'False','1' => 'True',),null, array('class'=>'form-control','style'=>'', 'id'=>'blackFlag' )) !!}
              </div>
          </div>

      </div>

      <div class="row">
        <div class="col-md-4 ">
            {!! Form::label('valScoreImpactComment', 'Valuation Score Impact Comments', ['class' => 'control-label', 'for'=>'isFree']) !!}
                <div class="">
                    <div class="form-group">

                    {{-- {!! Form::label('Title', 'Title', ['class' => 'control-label', 'for'=>'isFree']) !!} --}}
                    {!!    Form::text('valCommentTitle', null, [
                        'class'      => 'form-control ',
                        'rows'       => 4,
                        'name'       => 'valCommentTitle',
                        'id'         => 'valCommentTitle',
                        'onkeypress' => "return nameFunction(event);",
                        'placeholder'=>'Enter title here',
                    ]) !!}
                    {{-- {!! Form::label('Body', 'Body', ['class' => 'control-label', 'for'=>'isFree']) !!} --}}
                        <br>
                    {!!    Form::textarea('valCommentBody', null, [
                        'class'      => 'form-control ',
                        'rows'       => 4,
                        'name'       => 'valCommentBody',
                        'id'         => 'valCommentBody',
                        'onkeypress' => "return nameFunction(event);",
                        'placeholder'=>'Enter body here',
                    ]) !!}
                    </div>

                </div>
            </div>
          <div class="col-md-4">
              <div class="form-group">
              {!! Form::label('popUnderComment', 'Pop-under Comments', ['class' => 'control-label', 'for'=>'isFree' ]) !!}
              {!!    Form::textarea('My text', null, [
                  'class'      => 'form-control ',
                  'rows'       => 4,
                  'name'       => 'popUnderComment',
                  'id'         => 'popUnderComment',
                  'onkeypress' => "return nameFunction(event);"
              ]) !!}
              </div>
          </div>

          <div class="col-md-4">
              <div class="form-group">
              {!! Form::label('Info (Question Explanation)', 'Info (Question Explanation)', ['class' => 'control-label', 'for'=>'isFree']) !!}
              {!!    Form::textarea('My text', null, [
                  'class'      => 'form-control ',
                  'rows'       => 4,
                  'name'       => 'info',
                  'id'         => 'txt',
                  'onkeypress' => "return nameFunction(event);"
              ]) !!}
              </div>
          </div>
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
        <div class="row"  id="row-datVal"  @if ($data['question']->type!=11) style="display:none"@endif  >
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('dat1', 'Data 1 (Value From %)', ['class' => 'control-label',
                    'for' => 'dat1']) !!}
                    {!! Form::number('dat1', '', ['placeholder' => 'Enter a value',  'min' => '0',  'class' => 'form-control', 'id' => 'dat1']) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('dat2', 'Data 2 (Value To %)', ['class' => 'control-label',
                    'for' => 'dat2']) !!}
                    {!! Form::number('dat2', '', ['placeholder' => 'Enter a value',  'min' => '0',  'class' => 'form-control', 'id' => 'dat2']) !!}
                </div>
            </div>

        </div>

      @if ($data['question']->id === 1)
      {{-- <div class="form-group">
          <label for="featured">Title</label>
          <input type="file" name="featured" class="form-control">
      </div> --}}
      {{ Form::file('featured') }}
      @endif

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
      {!! Form::submit('Submit',['class' => 'btn btn-primary float-right']) !!}
    </div>
    {!!Form::close()!!}
  </div>
</div>


<br><br>

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">List of answers</h3>


  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table table-hover table-bordered table-striped">
      <thead>
        <tr>
          <!-- <th style="width: 10px">Position</th> -->
          <th style="text-align: center; vertical-align: middle;">Index</th>
          <th style="text-align: center; vertical-align: middle;">Code</th>
          <th style="text-align: center; vertical-align: middle;">User Input</th>
          <th style="text-align: center; vertical-align: middle;">Tool Input</th>
          {{-- <th style="width: 120px; text-align: center; vertical-align: middle;">Grade</th>
          <th style="width: 120px; text-align: center; vertical-align: middle;">Impact</th>
          <th style="width: 120px; text-align: center; vertical-align: middle;">Sellability</th>
          <th style="width: 120px; text-align: center; vertical-align: middle;">Max negative<br>Val. Effect</th>
          <th style="width: 120px; text-align: center; vertical-align: middle;">Flags</th> --}}

          <!-- <th>Slug</th> -->

          <th>More Info</th>
          @if ($data['useCustomAnswer']!=True)
          <th style="width: 120px">Actions</th>
          @endif
        </tr>
      </thead>
      <tbody>


        {{-- {{dd($data )}} --}}

        @foreach ($data['answers'] as $key=>$answer)
        <tr>
          {{-- <td>{{$key+1 }}</td> --}}

          <!-- <td style="text-align: center; vertical-align: middle;">{{$answer->position}}</td> -->
          <td style="text-align: center; vertical-align: middle;">{{$answer->id}}</td>
          <td style="text-align: center; vertical-align: middle;">{{'S.'.$data['question']->qset_id}}.{{$data['question']->qid}}.{{$answer->userInput}}</td>
          <td style="text-align: center; vertical-align: middle;">{{$answer->userInput}}</td>
          <td style="text-align: center; vertical-align: middle;">{{$answer->toolInput}}</td>
          <td class="px-3 ">


            <a href="#moreInfo{{$answer->id}}" class="btn btn-primary btn-sm" data-toggle="collapse">More Info</a><br><br>
                <div id="moreInfo{{$answer->id}}" class="collapse">



                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Grade</th>
                      <th>Impact</th>
                      <th>ellability</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{$answer->grade}}</td>
                      <td>{{$answer->impact}}</td>
                      <td>{{$answer->sellability}}</td>
                    </tr>
                  </tbody>
                </table>

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Red Flag</th>
                      <th>Yellow Flag</th>
                      <th>Green Flag</th>
                      <th>Purple Flag</th>
                      <th>Black Flag</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{$answer->redFlag}}</td>
                      <td>{{$answer->yellowFlag}}</td>
                      <td>{{$answer->greenFlag}}</td>
                      <td>{{$answer->purpleFlag}}</td>
                      <td>{{$answer->blackFlag}}</td>
                    </tr>
                  </tbody>
                </table>

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Value From</th>
                      <th>Value</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{$answer->dat1}}</td>
                      <td>{{$answer->dat2}}</td>
                    </tr>
                  </tbody>
                </table>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Conf. Imp. Score</th>
                      <th>Conf. Imp. Comment</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{$answer->confidenceImpactScore}}</td>
                      <td>{{$answer->confidenceImpactScoreComment}}</td>
                    </tr>
                  </tbody>
                </table>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Valuation Impact Comment</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        {{-- {{dd(  )}} --}}
                        {{-- {{$answer->valScoreImpactComment}} --}}
                        @isset($answer->valScoreImpactComment)
                        <td>{{ json_decode( $answer->valScoreImpactComment, true)['title'] }} <br>
                            {{ json_decode( $answer->valScoreImpactComment, true)['body'] }}
                        </td>
                        @endisset



                    </tr>
                    </tbody>
                </table>
                </div>

          </td>
          {{-- <td style="text-align: center; vertical-align: middle;">{{$answer->grade}}</td>
          <td style="text-align: center; vertical-align: middle;">{{$answer->impact}}</td>
          <td style="text-align: center; vertical-align: middle;">{{$answer->sellability}}</td>

          <td style="text-align: center; vertical-align: middle;">{{  FbaHelpers::getAnswerValuation($data['question']->m_p_mult,$data['question']->m_n_mult,$answer->grade,$answer->impact) }}</td>

          <td  class="link-hover">
              @if($answer->redFlag)
              <i class="fa fa-flag" style="color:red" aria-hidden="true"></i>
              @endif
              @if($answer->yellowFlag)
              <i class="fa fa-flag" style="color:yellow" aria-hidden="true"></i>
              @endif
              @if($answer->greenFlag)
              <i class="fa fa-flag" style="color:green" aria-hidden="true"></i>
              @endif
              @if($answer->purpleFlag)
              <i class="fa fa-flag" style="color:purple" aria-hidden="true"></i>
              @endif
              @if($answer->blackFlag)
              <i class="fa fa-flag" style="color:black" aria-hidden="true"></i>
              @endif
          </td> --}}

          @if ($data['useCustomAnswer']!=True)
          <td>
            <div class="row">
              <div class="col-md-6">
                <form action="{{route('cms.answer.edit',$answer->id)}}" method="get">
                  {{csrf_field()}}
                  {{-- <input type="text" class="form-control" name="todo" value=" {{$todo->todo}}" > <br> --}}
                  <input type="hidden" name="businessQuestion_pivot" value="{{$data['businessQuestion_pivot']->tojson()}}">
                  <input type="hidden" name="question" value="{{$data['question']}}">
                  {{-- <input type="hidden" name="setId" value="{{$data['set']['0']->id}}">
                  <input type="hidden" name="setName" value="{{$data['set']['0']->name}}"> --}}
                  <button class="btn btn-primary btn-sm"><span>
                    <i class="fas fa-pen-square" style="font-size:18px" ></i>
                  </span></button>
                </form>
              </div>
              <div class="col-md-6">

                <form action="{{ route('cms.answer.destroy', ['answerId'=>$answer->id]) }}" method="POST" >
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
                      <span>
                        <i class="fas fa-trash" style="font-size:18px"></i>
                      </span>
                    </button>
                  </form>
              </div>
            </div>
          </td>
          @endif

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
  <div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
      <li class="page-item"><a class="page-link" href="#">«</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">»</a></li>
    </ul>
  </div>
</div>

{{-- {{dd($data)}} --}}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('cms.')}}">CMS</a></li>
    <li class="breadcrumb-item active"><a href="{{route('cms.bussTypes.index')}}">Business Types</a></li>
    <li class="breadcrumb-item active"><a href="{{route('cms.question.index',['bussType'=>$data['businessQuestion_pivot']->busstype_id,
    'question_id'=>$data['businessQuestion_pivot']->question_id
    ])}}">Questions</a></li>
@endsection


@section('page-custom-css')
<style>.link-hover { cursor: pointer; }
</style>
@endsection


@section('page-custom-js')
<script>

@if(isset($data['businessQuestion_pivot']))
    function updateCustomAnswer(){

        window.location.href = "/cms/customAnswer/toggle?select={{$data['useCustomAnswer']}}&bussQuestion={{$data['question']->pivot->id}}";
    }
@endif

  $(document).on('click', '.button', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal({
      title: "Are you sure!",
      type: "error",
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes!",
      showCancelButton: true,
    },
    function() {
      $.ajax({
        type: "POST",
        url: "{{route('cms.sets.destroy',['qsetSlug'=>'$answer->slug'])}}",
        data: {id:id},
        success: function (data) {
          //
        }
      });
    });
  });
</script>
@endsection
