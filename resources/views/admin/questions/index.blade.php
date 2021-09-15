@extends('layouts.masterAdmin')

@section('page-title')

    {{--dd($data["bussType"])--}}
    {{--dd($data['set']->id)--}}

    Manage Questions of <strong>{{ strtoupper($data['bussType']->name) }}</strong>
@endsection

@section('content')
{{-- <a href="/cms/free/{{$data['bussType']->id}}" class="nav-link">Free Questions</a> --}}
<a href="/cms/free/{{$data['bussType']->id}}" class="btn btn-outline-primary" role="button">Free Questions</a><br><br>

    <div class="row">

        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add a Question in {{$data['bussType']->name}}</h3>
                    </h3>

                </div>

                {!! Form::open(['route' => 'cms.question.store', 'method' => 'POST']) !!}
                <div class="card-body">
                    {{-- Question --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('name', 'Set Question', ['class' => 'control-label', 'for' => 'qName']) !!}
                                {!! Form::text('name', '', ['type' => 'text', 'placeholder' => 'Enter Question', 'required' =>
                                'required', 'class' => 'form-control', 'id' => 'qName']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Max Possitive Multiplier --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('Max Positive Multiplier', 'Max Positive Multiplier', ['class' => 'control-label',
                                'for' => 'bmodel']) !!}
                                {!! Form::number('m_p_mult', '', ['placeholder' => 'Enter Positive Number', 'min' => '0', 'max' => '5','required'
                                => 'required', 'class' => 'form-control', 'id' => 'm_p_mult']) !!}
                            </div>
                        </div>
                        {{-- Max Negative Multiplier --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('Max Negative Multiplier', 'Max negative Multiplier', ['class' => 'control-label',
                                'for' => 'm_n_mult']) !!}
                                {!! Form::number('m_n_mult', '', ['placeholder' => 'Enter Negative Number', 'max' => -1, 'min' => '-5', 'required'
                                => 'required', 'class' => 'form-control', 'id' => 'm_n_mult']) !!}
                            </div>
                        </div>
                        {{-- Question Type (1. Select, 2. Val, 3. Multi Select) --}}
                        {{-- <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('type', 'Question Type', ['class' => 'control-label', 'for' => 'isFree']) !!}
                                {!! Form::select(
                                'type',
                                [
                                '1' => 'Select',
                                // '2' => 'Multi Select',
                                // '3' => 'Value',
                                '2' => 'Value',
                                '3' => 'Multi Select',

                                '4' => 'Multiple Values'
                                ],
                                null,
                                [
                                    'placeholder' => 'Please Select',
                                    'required' => ' required',
                                    'class' => 'form-control',
                                    'style' =>'',
                                    'id' => 'Type'
                                ]
                                ) !!}
                            </div>
                        </div> --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('type', 'Question Type', ['class' => 'control-label', 'for' => 'isFree']) !!}
                                {!! Form::select(
                                'type',
                                [
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
                                ],
                                null,
                                [
                                    'placeholder' => 'Please Select',
                                    'required' => ' required',
                                    'class' => 'form-control',
                                    'style' =>'',
                                    'id' => 'Type',
                                    'onchange'=>'q_add_datval_visibility(this.value)'
                                ]

                                ) !!}
                            </div>
                        </div>
                        {{-- <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('Input Type', 'Input Type', ['class' => 'control-label', ]) !!}
                                {!! Form::select(
                                'typeStyle',
                                [
                                '1radio' => 'Radio',
                                'number' => 'Number'
                                ],
                                null,
                                [
                                    'placeholder' => 'Please Select',
                                    'required' => ' required',
                                    'class' => 'form-control',
                                    'style' =>'',
                                    'id' => 'Type'
                                ]
                                ) !!}
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('Input Type', 'Input Type', ['class' => 'control-label', ]) !!}
                                {!! Form::select(
                                'inputType',
                                [
                                'text' => 'Text',
                                'number' => 'Number'
                                ],
                                null,
                                [
                                    'placeholder' => 'Please Select',
                                    'required' => ' required',
                                    'class' => 'form-control',
                                    'style' =>'',
                                    'id' => 'Type'
                                ]
                                ) !!}
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('Input Types', 'Input Type', ['class' => 'control-label', ]) !!}
                                {!! Form::select(
                                'inputType',
                                [
                                'text' => 'Select',
                                'number' => 'List',
                                'text' => 'Yes / No',
                                'number' => 'Radio Button',
                                'number' => 'Number',
                                // 'number' => 'Check Box',
                                'number' => 'Multiple Answers',
                                'number' => 'Number Range',
                                'number' => 'Conditional Input',
                                // 'number' => 'Hidden Question',
                                'number' => 'Percentage Range',
                                ],
                                null,
                                [
                                    'placeholder' => 'Please Select',
                                    'required' => ' required',
                                    'class' => 'form-control',
                                    'style' =>'',
                                    'id' => 'Type'
                                ]
                                ) !!}
                            </div>
                        </div> --}}


                        {{-- {!! Form::hidden('qset_id', $data['set']->id) !!} --}}

                    </div>
                    <div class="row" id="row-datVal" style="display:none" >
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('q_dat_1', 'Data 1 (Greater than)', ['class' => 'control-label',
                                'for' => 'q_dat_1']) !!}
                                {!! Form::number('q_dat_1', '', ['placeholder' => 'Enter a value',  'min' => '0',  'class' => 'form-control', 'id' => 'q_dat_1']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('q_dat_2', 'Data 2 (Return)', ['class' => 'control-label',
                                'for' => 'q_dat_2']) !!}
                                {!! Form::number('q_dat_2', '', ['placeholder' => 'Enter a value',  'min' => '0', 'class' => 'form-control', 'id' => 'q_dat_2']) !!}
                            </div>
                        </div>
                        {{-- <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('q_dat_3', 'Data 3', ['class' => 'control-label',
                                'for' => 'q_dat_3']) !!}
                                {!! Form::number('q_dat_3', '', ['placeholder' => 'Enter a value',  'min' => '0', 'required'
                                => 'required', 'class' => 'form-control', 'id' => 'q_dat_3']) !!}
                            </div>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-md-3">
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
                        <div class="col-md-3">
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
                                    'id' => 'isFree'
                                ]
                                ) !!}
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('set', 'Question Set', ['class' => 'control-label', 'for' => 'qset_id']) !!}
                                {!! Form::select(
                                    'qset_id',
                                    $data['sets'],
                                    // [
                                        // True => 'Yes',
                                        // False => 'No',
                                    // ],
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
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('position', 'ID', ['class' => 'control-label',  'for' => 'qsetPostion']) !!}
                                {!! Form::number('qid', null, ['placeholder' => 'Enter its position on the list', 'required' =>
                                'required', 'class' => 'form-control', 'id' => 'qsetId']) !!}
                            </div>
                        </div>
                    </div>


                    {!! Form::hidden('busstype_id', $data['bussType']->id) !!}
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    {!! Form::submit('Add new question', ['class' => 'btn btn-primary float-right']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-6">
            <form method="get" action="{{route('cms.addFromQuestionList')}}">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add a Question in {{$data['bussType']->name}} from existing questions</h3>
                        </h3>
                    </div>
                    <div class="card-body"  >

                        <button type="button" class="btn btn-primary btn-lg "  data-toggle="modal" data-target="#modalAddQuestion">
                            <i class="fas fa-list"></i> &nbsp
                            Add from List</button>
                        <br><br>
                        <!-- <form method="get" action="cms/question/add-from-list"> -->

                        <div class="form-group">
                            <label for="add-question-select-text">Question Name</label>
                            <input required  id="add-question-select-text" name="question-name" class="form-control" type="text"   readonly>
                        </div>
                        <div class="form-group" hidden>
                            <label for="add-question-select-text">ID</label>
                            <input required  id="add-question-select-id" name="id"  class="form-control" type="text"  readonly>
                        </div>
                        <div class="form-group">
                            <label for="add-question-select-text">Question ID</label>
                            <input required type="number" min="1"  id="add-question-select-id" name="qid" class="form-control" type="text"  >
                        </div>

                        <input type="hidden" id="custId" name="busstype_id" value="{{$data['bussType']->id}}">

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn btn-primary float-right">Submit</button>
                            <!-- {!! Form::submit('Add new question', ['class' => 'btn btn-primary float-right']) !!} -->
                    </div>
                </div>
            </form>
        </div>
    </div>



    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">List of Questions</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div >
            <table id="tbl-question" class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="sorting_asc" style="width: 10px" hidden>ID</th>
                        <th style="width: 10px">Code</th>
                        <th style="width: 10px">Set</th>
                        <th>Question</th>
                        <th style="width: 120px">Max positive<br>Multiplier</th>
                        <th style="width: 120px">Max negative<br>Multiplier</th>
                        <th style="width: 120px">Is Free?</th>
                        <th style="width: 120px">Is Global?</th>
                        <th style="width: 120px">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data['questions']->sortBy('qset_id') as $key => $question)
                        <tr>
                            <td style="text-align: center; vertical-align: middle;" hidden>
                                {{ $question->id }}</td>
                            <td style="text-align: center; vertical-align: middle;">
                                {{$data['bussType']->initial .'.'. $question->qset_id . '.' . $question->pivot->questionQid  }}</td>
                            <td style="text-align: center; vertical-align: middle;">
                                {{  FbaHelpers::getSetNameById($question->qset_id ) }}</td>

                            <td onclick="window.location='{{ route('cms.answer.index', ['question_id' => $question->id,'businessType_id' =>$data['bussType']->id]) }}';"
                                class="link-hover"><i class="fas fa-align-justify">&nbsp </i> {{ $question->name }}</td>
                            <!-- <td>{{ $question->slug }}</td> -->
                            <td style="text-align: center; vertical-align: middle;">{{ $question->m_p_mult }}</td>
                            <td style="text-align: center; vertical-align: middle;">{{ $question->m_n_mult }}</td>
                            <td style="text-align: center; vertical-align: middle;">{{ $question->isFree==1?"Yes":"No" }}</td>
                            <td style="text-align: center; vertical-align: middle;">{{ $question->isGlobal==1?"Yes":"No" }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="{{ route('cms.question.edit', ['question' => $question->id,]) }}"
                                            method="get">
                                            {{ csrf_field() }}
                                            <input type="text" name="bussType" value="{{$data['bussType']}}" hidden>
                                            <button class="btn btn-primary btn-sm"><span>
                                                    <i class="fas fa-pen-square" style="font-size:18px"></i>
                                                </span></button>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="{{ route('cms.question.destroy', ['id' => $question->id]) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input type="text" name="bussType" value="{{$data['bussType']}}" hidden>
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this item?');">
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
        </div>
        <!-- /.card-body -->
        {{-- <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
        </div> --}}
    </div>

 <!-- Modal -->
 <div id="modalAddQuestion" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
            <h4 class="modal-title">Select Question</h4>
        </div>
        <div class="modal-body">
            <div class="table-responsive" style="overflow: scroll;">
                <table class="table table-striped table-bordered  table-hover  ">
                        <thead>
                            <tr>
                                <th>Set</th>
                                <th>Question</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['questionsAll'] as $question )
                            <tr>
                                <th> {{  FbaHelpers::getSetNameById($question->qset_id ) }}</th>
                                <th>{{$question->name}}</th>
                                <th><button class="btn btn-info btn-lg" onclick="selectQuestionAdd('{{$question->id}}','{{$question->name}}')" >Select</button></th>
                            </tr>
                            @endforeach()
                        </tbody>
                </table>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
</div>

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('cms.')}}">CMS</a></li>
    <li class="breadcrumb-item active"><a href="{{route('cms.bussTypes.index')}}">Business Types</a></li>
    <li class="breadcrumb-item active"><a href="{{route('cms.question.index',['bussType'=>$data['bussType']->id])}}">Questions</a></li>
@endsection



@section('page-custom-css')
    <style>
        .link-hover {
            cursor: pointer;
        }
    </style>
@endsection


@section('page-custom-js')

<script>

        function selectQuestionAdd($id,$name){
            // alert( $name);
            // alert( $id);

            document.getElementById("add-question-select-text").value=$name;
            document.getElementById("add-question-select-id").value=$id;
            // $(".myModal.close").click();
            // $(".modal-dialog").modal(toggle);
            $("#modalAddQuestion").modal('hide');




        }

 $(function () {
$("#tbl-question").DataTable({
    "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "pageLength": 50,
}
);
});
</script>
    <script>
        $(document).on('click', '.button', function(e) {
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
                        url: "{{ route('cms.sets.destroy', ['qsetSlug' => '$question->slug']) }}",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            //
                        }
                    });
                });
        });

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
