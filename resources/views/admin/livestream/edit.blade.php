@extends('layouts.backend.app',[

	'title' => 'List Livestream',

	// 'pageTitle' => 'List Livestream',

])

@section('livestream', 'active')

@section('livestream-show', 'show',)

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

            Information Livestream

        </h6>

    </div>

    <div class="card-body">

        <form action="/livestream/{{$Livestream->id}}/update" method="POST" enctype="multipart/form-data">

        @csrf

        @method('PATCH')

        <div class="row col-md-12">

            <div class="col-md-6">

                <div class="form-group">

                    <label for="title" class="label-text">Title</label>

                    <input type="text" class="form-control" id="title" name="title" value="{{old('title') ? old('title') : $Livestream->title}}">

                    @error('title')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <div class="col-md-6">

                <div class="form-group">

                    <label for="date" class="label-text">Date</label>

                    @if (strlen($Livestream->date) > 0)

                    <input type="text" class="form-control" id="date" name="date" value="{{$Livestream->date}}">

                    @else

                    sila

                    <input type="text" class="form-control datetime" id="date" name="date">

                    @endif

                </div>

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

                    <label for="live_id" class="label-text">Live Id</label>

                    <input type="text" class="form-control" id="live_id" name="live_id" value="{{old('live_id') ? old('live_id') : $Livestream->live_id}}">

                    @error('live_id')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>
            <div class="col-md-6">

                <div class="form-group">

                    <label for="server_id" class="label-text">Server Id</label>

                    <input type="text" class="form-control" id="server_id" name="server_id" value="{{old('server_id') ? old('server_id') : $Livestream->server_id}}">

                    @error('server_id')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>
            <div class="col-md-12">

                <div class="form-group">

                    <label for="editor" class="label-text">Detail</label>

                    <textarea class="form-control" id="editor" rows="12"style="

                    height: 125px;" name="detail"> {{old('detail') ? old('detail') : $Livestream->detail}}</textarea>

                    @error('detail')

                        <small class="text-danger">{{ $message }}</small>

                    @enderror

                </div>

            </div>

            <span class="add-btn"> 

            <button type="submit" class="btn btn-sila btn-sm">Edit Livestream</button>

            </span>

            <span> 

            <a href="/livestream" class="btn btn-secondary btn-sm">Cancel</a>

            </span>

        </div>

        </form>

    </div>

</div>

@stop