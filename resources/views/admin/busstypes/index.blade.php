@extends('layouts.masterAdmin')

@section('page-title')
Business Types
@endsection

@section('content')

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Create New Business Type</h3>
  </h3>

</div>
<!-- /.card-header -->
<!-- form start -->
{{-- <form role="form"> --}}
  {!! Form::open(['route' => 'cms.bussTypes.store', 'method' => 'POST']) !!}
  <div class="card-body">
    {{-- <div class="row">
      @if(Session::has('status'))
      <div class="alert alert-success">
        <strong>Success!</strong> {{Session::get('success')}}
      </div>
      @endif()
    </div> --}}

    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          {{-- <label for="exampleInputEmail1">Email address</label> --}}
          {!! Form::label('name', 'Name', ['class' => 'control-label', 'for'=>'bussTypeName']) !!}
          {!! Form::text('name','', ['type'=>'text', 'placeholder'=>'Enter Business Type Name Name', 'required' => 'required','class' => 'form-control', 'id'=>'bussTypeName']) !!}
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('name', 'Base Multiplier', ['class' => 'control-label', 'for'=>'qName']) !!}
            {!! Form::number('toolInput','', ['type'=>'number', 'step'=>'any', 'placeholder'=>'Enter Base Multiplier', 'required' => 'required','class' => 'form-control', 'id'=>'qName']) !!}
          </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          {{-- <label for="exampleInputEmail1">Email address</label> --}}
          {!! Form::label('name', 'Initial', ['class' => 'control-label', 'for'=>'bussTypeName']) !!}
          {!! Form::text('initial','', ['type'=>'text', 'placeholder'=>'Enter Initial', 'required' => 'required','class' => 'form-control', 'id'=>'bussTypeName']) !!}
        </div>
      </div>
      {{-- <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('bmodel', 'Buss. Model', ['class' => 'control-label', 'for'=>'bmodel']) !!}
            {!! Form::text('model','', ['type'=>'text', 'placeholder'=>'Enter Question', 'required' => 'required','class' => 'form-control', 'id'=>'bmodel']) !!}
          </div>
      </div>
      --}}

      {{--
      <div class="col-md-2">
        <div class="form-group">
          {!! Form::label('Is Paid', 'Is Paid', ['class' => 'control-label', 'for'=>'isFree']) !!}
          {!! Form::select('isFree', array('1' => 'True','0' => 'False',),null, array('class'=>'form-control','style'=>'', 'id'=>'isFree' )) !!}
        </div>
      </div>
      --}}


    </div>


  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
    {!! Form::submit('Submit',['class' => 'btn btn-primary float-right']) !!}
  </div>
  {!!Form::close()!!}
</div>

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Business Types</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table table-hover table-bordered table-striped">
      <thead>
        <tr>

          <th style="width: 100px">ID</th>
          <th style="width: 100px">Initial</th>
          <th>Business Type</th>
          <th style="width: 100px">Base Multiplier</th>
          {{-- <th>Slug</th> --}}
          <th style="width: 120px">Actions</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($data["bussTypes"] as $key=>$bussType)
        <tr>
          <td>{{$bussType->id}}</td>
          <td class="w-auto">{{$bussType->initial}}</td>
          <!-- <td onclick="window.location='{{route('cms.sets.index',['bussTypeId'=>$bussType->id])}}';" class="link-hover" > -->
          <td onclick="window.location='{{route('cms.question.index',['bussType'=> $bussType->id ])}}'" class="link-hover" >
            <i class="fas fa-align-justify">&nbsp &nbsp
            </i>{{ucfirst($bussType->name)}}
          </td>
          <td class="w-auto">{{$bussType->toolInput}}</td>
          {{-- <td>{{$bussType->slug}}</td> --}}
          {{$bussType->position}}</td>
          <td>
            <div class="row">
              <div class="col-md-6">
                <form action="{{route('cms.bussTypes.edit',$bussType->id)}}" method="get">
                  {{csrf_field()}}
                  <button class="btn btn-primary btn-sm"><span>
                    <i class="fas fa-pen-square" style="font-size:18px" ></i>
                  </span></button>
                </form>
              </div>
              <div class="col-md-6">
                <form action="{{ route('cms.bussTypes.destroy',$bussType->id ) }}" method="POST" >
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

<div class="row">



</div>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('cms.')}}">CMS</a></li>
<li class="breadcrumb-item active"><a href="{{route('cms.bussTypes.index')}}">Business Types</a></li>
@endsection



@section('page-custom-css')
<style>.link-hover { cursor: pointer; }
</style>
@endsection


@section('page-custom-js')
<script>

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
        // url: "{{route('cms.sets.destroy',['bussTypeSlug'=>'$bussType->slug'])}}",
        data: {id:id},
        success: function (data) {
          //
        }
      });
    });
  });
</script>
@endsection
