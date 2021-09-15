@extends('layouts.masterAdmin')

@section('page-title')
<p>
{{--dd($data['bussType'])--}}
{{$data['bussType']->name}}
</p>
@endsection

@section('content')

<!-- <div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Create New Set of Questions</h3>
  </h3>

</div>
{{-- <form role="form"> --}}
  {!! Form::open(['route' => 'cms.sets.store', 'method' => 'POST']) !!}
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
          {!! Form::label('name', 'Set Name', ['class' => 'control-label', 'for'=>'qsetName']) !!}
          {!! Form::text('name','', ['type'=>'text', 'placeholder'=>'Enter Question Set Name', 'required' => 'required','class' => 'form-control', 'id'=>'qsetName']) !!}
        </div>
      </div>
      {{-- <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('bmodel', 'Buss. Model', ['class' => 'control-label', 'for'=>'bmodel']) !!}
            {!! Form::text('model','', ['type'=>'text', 'placeholder'=>'Enter Question', 'required' => 'required','class' => 'form-control', 'id'=>'bmodel']) !!}
          </div>
      </div>
      --}}
      <div class="col-md-2">
        <div class="form-group">
          {!! Form::label('position', 'ID', ['class' => 'control-label', 'for'=>'qsetPostion']) !!}
          {!! Form::number('id',null, ['placeholder'=>'Enter its position on the list', 'required' => 'required', 'class' => 'form-control', 'id'=>'qsetId']) !!}
        </div>
      </div>
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

  <div class="card-footer">
    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
    {!! Form::submit('Submit',['class' => 'btn btn-primary float-right']) !!}
  </div>
  {!!Form::close()!!}
</div> -->

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Question Categories</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">

    <table class="table table-hover table-bordered table-striped">
      <thead>
        <tr>  

          <th style="width: 100px">Set Code</th>
          <th>Set Name</th>
          {{-- <th>Slug</th> --}}
          <th style="width: 120px">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data["qset"] as $key=>$qset)
        @if ($key < 1)
            <?php continue;?>
        @endif
        <tr>
          <td>{{$data['bussType']->initial.'.'.$qset->id}}</td>
          <td onclick="window.location='{{route('cms.question.index',['qsetId'=>$qset->id, 'bussType'=> $data['bussType']->id ])}}'" class="link-hover" >
            <i class="fas fa-align-justify">&nbsp &nbsp
            </i>{{ucfirst($qset->name)}}
          </td>
          {{-- <td>{{$qset->slug}}</td> --}}
          {{$qset->position}}</td>
          <td>

            <div class="row">
              <div class="col-md-6">
                <form action="{{route('cms.sets.edit',['qsetSlug'=>$qset->id, $data['bussType']->name])}}" method="get">
                  {{csrf_field()}}
                  {{ Form::hidden('bussTypeId', $data['bussType']->id) }}
                  <button class="btn btn-primary btn-sm"><span>
                    <i class="fas fa-pen-square" style="font-size:18px" ></i>
                  </span></button>

                </form>
              </div>

              <!-- <div class="col-md-6">
                <form action="{{ route('cms.sets.destroy', ['qsetSlug'=>$qset->id]) }}" method="POST" >
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
                    <span>
                      <i class="fas fa-trash" style="font-size:18px"></i>
                    </span>
                  </button>
                </form>
              </div> -->
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
<li class="breadcrumb-item"><a href="#">CMS</a></li>
<li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
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
        url: "{{route('cms.sets.destroy',['qsetSlug'=>'$qset->slug'])}}",
        data: {id:id},
        success: function (data) {
          //
        }
      });
    });
  });
</script>
@endsection
