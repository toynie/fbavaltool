@extends('layouts.masterAdmin')

@section('page-title')

@endsection

@section('content')

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
                        <th class="sorting_asc" style="width: 10px">ID</th>
                        <th style="width: 120px">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data['questions'] as $key => $question)
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                {{ $question->id }}
                            </td>
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
    </div>

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">CMS</a></li>
    <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
@endsection


@section('page-custom-css')
    <style>

    </style>
@endsection


@section('page-custom-js')

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
    </script>
@endsection
