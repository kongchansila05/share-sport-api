@section('Setting-active', 'active')

@section('list_Banner', 'active')

@section('Setting', 'show')

@extends('layouts.backend.app',[

    'title' => 'List Banner',
])

@push('css')

<link href="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@endpush
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 bg-gradient-best">
        <h6 class="m-0 font-weight-bold text-primary">
            <a href="/banner/create" class="btn btn-sila"><i class="fas fa-plus"></i> Add Banner</a>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                <thead class="text-write bg-gradient-sila">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Video</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banner as $row)
                    <tr>
                        <th scope="row"  width="1%">{{$loop->iteration}}</th>
                        <td class="limit-height">{{$row->name}}</td>
                        <td class="limit-height">{{$row->photo}}</td>
                        <td style="text-align: center; width="80px"">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/banner/{{$row->id}}/edit" class="btn btn-sila btn-sm mr-1"><i class="fas fa-edit"></i></a>
                                <a href="/banner/{{$row->id}}/question" class="btn btn-danger btn-sm mr-1"><i class="fas fa-trash"></i></a>
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



