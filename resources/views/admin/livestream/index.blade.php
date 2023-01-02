@extends('layouts.backend.app',[
	'title' => 'List Livestream',
	// 'pageTitle' => 'List livestream',
])
@section('livestream', 'active')
@section('list-hight-light', 'active')
@section('livestream-show', 'show',)
@push('css')
<link href="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
    .text-detail{
        display: -webkit-box;
        -webkit-line-clamp: 3;
        line-clamp: 2;
        max-height: 70px;
        overflow: hidden;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis;
    }
</style>
@endpush
@section('content')
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-gradient-best">
                <h6 class="m-0 font-weight-bold text-primary">
                    <a href="/livestream/create" class="btn btn-sila"><i class="fas fa-plus"></i> Add Livestream</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered " id="dataTable" cellspacing="0">
                        <thead class="text-write bg-gradient-sila">
                            <tr>
                                <th>No</th>
                                <th>Banner</th>
                                <th>Date</th>
                                <th>Title</th>  
                                <th>Detail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Livestream as $row)
                            <tr>
                                <th scope="row"  width="1%">{{$loop->iteration}}</th>
                                <td id="img-limit">
                                    @if ($row->photo)
                                            <img src="/upload/{{$row->photo}}" width="100%" height="80px" class="img-rounded">
                                            @else 
                                            <img src="/upload/no_image.jpg" alt="" width="100%" height="80px">
                                            @endif
                                </td>
                                <td>{{date('d-M-Y', strtotime($row->date));}}</td>
                                <td style="width: 150px" >
                                    <span class="text-detail">
                                        {{$row->title}}
                                        </span>  
                                </td>
                                <td  style="width: 200px">
                                  <span class="text-detail">
                                    {{$row->detail}}
                                    </span>  
                                </td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="/livestream/{{$row->id}}/edit" class="btn btn-sila btn-sm mr-1"><i class="fas fa-edit"></i></a>
                                        <a href="/livestream/{{$row->id}}/question" class="btn btn-danger btn-sm mr-1"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        
            </div>
        </div>
@stop
@push('js')
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/js/demo/datatables-demo.js"></script>
@endpush