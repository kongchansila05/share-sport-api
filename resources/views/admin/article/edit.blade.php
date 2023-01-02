@extends('layouts.backend.app',[

	'title' => 'List Article',

	// 'pageTitle' => 'List article',

])

@section('article', 'active')

@section('article-show', 'show',)

@push('js')

<link rel="stylesheet" href="/bootstrap/css/bootstrap-datetimepicker.css" />



<script src="/bootstrap/js/bootstrap-datetimepicker.js"></script>

<script src="/bootstrap/js/locales/bootstrap-datetimepicker.fr.js"></script>

<script type="text/javascript">

$("#date").datetimepicker({

    format: 'dd-mm-yyyy HH:mm:ss',

    fontAwesome: true,

    language: 'sma',

    weekStart: 1,

    todayBtn: 1,

    autoclose: 1,

    todayHighlight: 1,

    startView: 2,

    forceParse: 0

}).datetimepicker('update', new Date());



</script>

@endpush

@section('content')

<div class="card shadow mb-4">

    <div class="card-header py-3 bg-gradient-best">

        <h6 class="m-0 font-weight-bold text-write">

            Information Article

        </h6>

    </div>

    <div class="card-body">

        <form action="/article/{{$Article->id}}/update" method="POST" enctype="multipart/form-data">

        @csrf

        @method('PATCH')

        <div class="row col-md-12">

            <div class="col-md-6">

                <div class="form-group">

                    <label for="date" class="label-text">Date</label>

                    @if (strlen($Article->date) > 0)

                    <input type="text" class="form-control" id="date" name="date" value="{{$Article->date}}">

                    @else

                    sila

                    <input type="text" class="form-control datetime" id="date" name="date">

                    @endif

                </div>

            </div>
            <div class="col-md-6">

                

                <div class="form-group">

                    <label for="photo" class="label-text">Banner 500x333</label>

                    <input type="file" class="form-control" id="photo" name="photo">

                    @error('photo')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-6">

                

                <div class="form-group">

                    <label for="photo1" class="label-text">Banner 500x333 1</label>

                    <input type="file" class="form-control" id="photo1" name="photo1">

                    @error('photo1')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-12">

                <div class="form-group">

                    <label for="title" class="label-text">Title</label>

                    <input type="text" class="form-control" id="title" name="title" value="{{old('title') ? old('title') : $Article->title}}">

                    @error('title')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-12">

                <div class="form-group">

                    <label for="editor" class="label-text">Detail</label>

                    <textarea class="form-control" id="editor" rows="12"style="

                    height: 125px;" name="detail"> {{old('detail') ? old('detail') : $Article->detail}}</textarea>

                    @error('detail')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <span class="add-btn"> 

            <button type="submit" class="btn btn-sila btn-sm">Edit Article</button>

            </span>

            <span> 

            <a href="/article" class="btn btn-secondary btn-sm">Cancel</a>

            </span>

        </div>

        </form>

    </div>

</div>

@stop