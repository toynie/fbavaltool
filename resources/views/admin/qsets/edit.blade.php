
{{-- {{dd($qset)}} --}}

@extends('layouts.masterAdmin')

@section('page-title')
Edit Question Set
<p>
  Business Type: {{$bussType->name}}
</p>
@endsection

@section('content')

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Update Question Set</h3>
  </h3>

  </div>
  <!-- /.card-header -->

  {!! Form::model($qset, ['method'=>'PATCH','action'=>['QsetController@update',$qset->id],'autocomplete'=>'off','files' => true]) !!}
  <div class="card-body">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          {{-- <label for="exampleInputEmail1">Email address</label> --}}
          {!! Form::label('name', 'Set Name', ['class' => 'control-label', 'for'=>'qsetName']) !!}
          {!! Form::text('name',$qset->name, ['type'=>'text', 'placeholder'=>'Enter Question Set Name', 'required' => 'required','class' => 'form-control', 'id'=>'qsetName']) !!}
        </div>
      </div>
      {{--<div class="col-md-4">
        <div class="form-group">
            {!! Form::label('model', 'model', ['class' => 'control-label', 'for'=>'qsetPostion']) !!}
            {!! Form::text('model',$qset->model, ['type'=>'text', 'placeholder'=>'Enter Business Model', 'required' => 'required','class' => 'form-control', 'id'=>'model']) !!}
          </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          {!! Form::label('position', 'Position', ['class' => 'control-label', 'for'=>'qsetPostion']) !!}
          {!! Form::number('position',$qset->position, ['placeholder'=>'Enter its position on the list', 'required' => 'required', 'class' => 'form-control', 'id'=>'qsetPostion']) !!}
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          {!! Form::label('Is Paid', 'Is Paid', ['class' => 'control-label', 'for'=>'isFree']) !!}
          {!! Form::select('isFree', array('1' => 'True','0' => 'False',),$qset->isFree, array('class'=>'form-control','style'=>'', 'id'=>'isFree' )) !!}
        </div>
      </div>--}}
      <div class="col-md-2">
        <div class="form-group">
          {!! Form::label('position', 'ID', ['class' => 'control-label', 'for'=>'qsetPostion']) !!}
          {!! Form::number('id',$qset->id, ['placeholder'=>'Enter its position on the list', 'required' => 'required', 'class' => 'form-control', 'id'=>'qsetId']) !!}
        </div> 
      </div>
      {{ Form::hidden('bussType', $bussType->id) }}
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
    {!! Form::submit('Submit',['class' => 'btn btn-primary float-right']) !!}
  </div>
  {!!Form::close()!!}
</div>




@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">CMS</a></li>
<li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
@endsection
