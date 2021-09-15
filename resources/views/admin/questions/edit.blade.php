
{{-- {{dd($question)}} --}}

@extends('layouts.masterAdmin')

@section('page-title')
    Update Question
@endsection

@section('content')

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Update</h3>
  </h3>

  </div>
  <!-- /.card-header -->

  {!! Form::model($data["question"], ['method'=>'PATCH','action'=>['QuestionController@update',$data["question"]->id],'autocomplete'=>'off','files' => true]) !!}
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          {{-- <label for="exampleInputEmail1">Email address</label> --}}
          {!! Form::label('name', 'Set Name', ['class' => 'control-label', 'for'=>'qsetName']) !!}
          {!! Form::text('name',$data["question"]->name, ['type'=>'text', 'placeholder'=>'Enter Question Set Name', 'required' => 'required','class' => 'form-control', 'id'=>'qsetName']) !!}
        </div>
      </div>


    </div>
    <div class="row">
        {{-- <div class="col-md-3">
            <div class="form-group">
              {!! Form::label('model', 'model', ['class' => 'control-label', 'for'=>'qsetPostion']) !!}
              {!! Form::text('model',$data["question"]->model, ['type'=>'text', 'placeholder'=>'Enter Business Model', 'required' => 'required','class' => 'form-control', 'id'=>'model']) !!}
            </div>
          </div> --}}
          <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('Max Positive Multiplier', 'Max Positive Multiplier', ['class' => 'control-label', 'for'=>'bmodel']) !!}
                {!! Form::number('m_p_mult',$data["question"]->m_p_mult, ['placeholder'=>'','min'=>'1', 'max'=>'5', 'required' => 'required', 'class' => 'form-control', 'id'=>'m_p_mult']) !!}
              </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('Max Negative Multiplier', 'Max Negative Multiplier', ['class' => 'control-label', 'for'=>'m_n_mult']) !!}
                {!! Form::number('m_n_mult',$data["question"]->m_n_mult, ['placeholder'=>'','max'=>'0', 'required' => 'required', 'class' => 'form-control', 'id'=>'m_n_mult']) !!}
              </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
            {!! Form::label('type', 'Question Type', ['class' => 'control-label', 'for'=>'isFree']) !!}
            {!! Form::select('type',
                array(
                    '1' => 'Select',
                                '2' => 'List',
                                '3' => 'Yes / No',
                                // '4' => 'Radio Button',
                                '5' => 'Number',
                                // '6' => 'Check Box',
                                '7' => 'Multiple Answers',
                                '8' => 'Number Range',
                                '9' => 'Conditional Input',
                                // '10' => 'Hidden Question',
                                '11' => 'Percentage Range',
                // '1' => 'Select',
                // '2' => 'Value',
                // '3' => 'Multi Select',
                )
                ,$data["question"]->type
                ,array(
                    'placeholder'=>'Please Select',
                    'required'=>' required',
                    'class'=>'form-control',
                    'style'=>'',
                    'id'=>'isFree',
                    'onchange'=>'q_add_datval_visibility(this.value)'
                    )
            )!!}
            </div>
        </div>

        @if (isset($data["bussType"]) )
        <div class="col-md-2">
            <div class="form-group">
              {!! Form::label('position', 'ID', ['class' => 'control-label', 'for'=>'qsetPostion']) !!}

              {{-- {!! Form::number('qid',number_format( $data["question"]->pivot->questionQid), ['placeholder'=>'Enter its position on the list', 'required' => 'required', 'class' => 'form-control', 'id'=>'qsetId']) !!} --}}
              {!! Form::number('qid',$data["question"]->pivot->questionQid, ['placeholder'=>'Enter its position on the list', 'required' => 'required', 'class' => 'form-control', 'id'=>'qsetId']) !!}


            </div>
          </div>
        @else

        @endif
{{-- {{dd($data["question"]->pivot->questionQid)}} --}}

    </div>
    <div class="row"  id="row-datVal" style="display:none" >
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('q_dat_1', 'Data 1 (Greater than)', ['class' => 'control-label',
                'for' => 'q_dat_1']) !!}
                {!! Form::number('q_dat_1', $data["question"]->q_dat_1, ['placeholder' => 'Enter a value',  'min' => '0',  'class' => 'form-control', 'id' => 'q_dat_1']) !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('q_dat_2', 'Data 2 (Return)', ['class' => 'control-label',
                'for' => 'q_dat_2']) !!}
                {!! Form::number('q_dat_2', $data["question"]->q_dat_2, ['placeholder' => 'Enter a value',  'min' => '0',  'class' => 'form-control', 'novalidate','id' => 'q_dat_2']) !!}
            </div>
        </div>
        {{-- <div class="col-md-3">
            <div class="form-group">
                {!! Form::label('q_dat_3', 'Data 3', ['class' => 'control-label',
                'for' => 'q_dat_3']) !!}
                {!! Form::number('q_dat_3', $data["question"]->q_dat_3, ['placeholder' => 'Enter a value',  'min' => '0', 'required'
                => 'required', 'class' => 'form-control', 'id' => 'q_dat_3']) !!}
            </div>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('isFree', 'Is Free?', ['class' => 'control-label', 'for' => 'isFree']) !!}
                {!! Form::select(
                'isFree',
                [
                True => 'Yes',
                False => 'No',
                ],
                null,
                [
                    'placeholder' => 'Please Select',
                    'required' => ' required',
                    'class' => 'form-control',
                    'style' =>'',
                    'id' => 'isFree'
                ]
                ) !!}
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('isGlobal', 'Is Global?', ['class' => 'control-label', 'for' => 'isGlobal']) !!}
                {!! Form::select(
                'isGlobal',
                [
                True => 'Yes',
                False => 'No',
                ],
                null,
                [
                    'placeholder' => 'Please Select',
                    'required' => ' required',
                    'class' => 'form-control',
                    'style' =>'',
                    'id' => 'isFree',
                    'onchange'=>'q_add_datval_visibility(this.value)'
                ]
                ) !!}
            </div>
        </div>

    </div>
    @if (isset($data["bussType"]) )
        {!! Form::hidden('old_quetionQid', $data["question"]->pivot->questionQid) !!}
        {!! Form::hidden('bussType', $data['bussType']) !!}
    @else

    @endif


  </div>
  <!-- /.card-body -->

  <div class="card-footer">

    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
    {!! Form::submit('Update',['class' => 'btn btn-primary float-right']) !!}
  </div>
  {!!Form::close()!!}
</div>


<script>
       function q_add_datval_visibility($val){
            var x = document.getElementById("row-datVal");
            if ($val == 9 ) {
                x.style.display = "";
            } else {
                x.style.display = "none";
            }
        }
</script>

@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">CMS</a></li>
<li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
@endsection
