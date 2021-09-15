@extends('layouts.masterAdmin')

{{-- @section('page-title')
Free Questions
@endsection --}}

@section('content')

{{-- {{dd($freeQuestions)}}  --}}
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Free Questions</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table table-hover table-bordered table-striped">
      <thead>
        <tr>

          <th style="width: 50px">#</th>
          {{-- <th style="width: 40px">Set</th> --}}
          {{-- <th style="width: 40px">Code</th> --}}
          <th>Question</th>
          {{-- <th>Slug</th> --}}

          <th style="width: 120px">Is Free?</th>
          {{-- <th style="width: 10px">Position</th> --}}

        </tr>
      </thead>
      <tbody>
        @foreach ($freeQuestions->sortBy('free_index') as $key=>$freeQuestion)
        <tr>
          <td>{{$key+1 }}</td>
          {{-- <td>{{$qsets[$freeQuestion->qset_id-1]->name}}</td>
          <td>S{{($qsets[$freeQuestion->qset_id]->id) - 1}}.{{ $freeQuestion->qid}}</td> --}}


          <td onclick="window.location='{{route('cms.question.index',['freeQuestionId'=>$freeQuestion->id])}}';" class="link-hover" >
            <i class="fas fa-link">&nbsp &nbsp
            </i>{{ucfirst($freeQuestion->name)}}
          </td>

          <td>{{$freeQuestion->isFree == 1 ? 'Free':'Not Free' }}</td>


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
