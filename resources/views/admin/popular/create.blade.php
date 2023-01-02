@extends('layouts.backend.app',[

	'title' => 'List Popular',

	// 'pageTitle' => 'List popular',

])

@section('popular', 'active')

@section('add-hight-light', 'active')

@section('popular-show', 'show',)

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

            Information Popular

        </h6>

    </div>

    <div class="card-body">

        <form action="/popular/store" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row col-md-12">

            <div class="col-md-6">

                <div class="form-group">

                    <label for="date" class="label-text">Date</label>

                    <input type="text" class="form-control datetime" id="date" name="date">

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

            <div class="col-md-12">

                 <div class="form-group">

                    <label for="title" class="label-text">Title</label>

                    <textarea type="text" class="form-control" id="title" name="title"></textarea>

                    @error('title')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="detail" class="label-text">Detail</label>
                    <textarea class="form-control" id="detail" rows="12"style="
                    height: 125px;" name="detail">{{old('detail')}}</textarea>
                    @error('detail')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <span class="add-btn"> 

            <button type="submit" class="btn btn-sila btn-sm">Add Popular</button>

            </span>

            <span> 

            <a href="/popular" class="btn btn-secondary btn-sm">Cancel</a>

            </span>

        </div>

        </form>

    </div>

</div>

@stop