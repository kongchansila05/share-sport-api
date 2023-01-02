@section('Setting-active', 'active')
@section('list_Category', 'active')
@section('Setting', 'show')
@extends('layouts.backend.app',[
    'title' => 'List Category',
])
@push('css')
<link href="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 bg-gradient-best">
        <h6 class="m-0 font-weight-bold text-primary">
            <button id="add_category" type="submit" class="btn btn-sila" data-bs-toggle="modal" data-bs-target="#meme">
                Add Category
              </button>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead  class="text-write bg-gradient-sila">
                    <tr>
                        <th hidden>id</th>
                        <th>No</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Action</th>
                        <th hidden>photo</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($Category as $row)
                        <tr>
                        <th hidden>{{$row->id}}</th>
                        <th scope="row"  width="1%">{{$loop->iteration}}</th>
                        <td>{{$row->name}}</td>
                        <td>{{$row->code}}</td>
                        <td width="80px" style="text-align: center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a id="edit_category" class="btn btn-sila btn-sm mr-1 edit_category">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="/category/{{$row->id}}/question" class="btn btn-danger btn-sm mr-1">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                        <td hidden>{{$row->photo}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Form add category --}}
    <div class="modal fade" id="modal_add_category" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title label-text" id="staticBackdropLabel">Information</h5>
                <i class="fas fa-times close_category" aria-hidden="true"></i>
            </div>
            <div class="modal-body">
                <form action="/category/store" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <label for="name" class="label-text">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <script>
                        function generateCardNo(x) {
                            if (!x) {
                                x = 16;
                            }
                            chars = '1234567890';
                            no = '';
                            for (var i = 0; i < x; i++) {
                                var rnum = Math.floor(Math.random() * chars.length);
                                no += chars.substring(rnum, rnum + 1);
                            }
                            return no;
                        }
                        function add_myFunction() {
                        document.getElementById("code").onclick = function(){
                        document.getElementById("code").value =  generateCardNo(8);
                        };
                        }
                        </script>
                    <div class="form-group ">
                        <label for="code" class="label-text">Category Code</label>
                        <i class="fa fa-random"></i>
                        <input type="text" class="form-control" id="code" onclick="add_myFunction()" name="code" value="">
                        @error('code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary   close_category" data-bs-dismiss="modal">Close</button>
                
                <button type="submit" class="btn btn-sila ">Add Category</button>
                </div>
            </form>
        </div>
        </div>
    </div>
{{-- end --}}

{{-- Form edit category --}}

<div class="modal fade" id="modal_edit_category" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title label-text" id="staticBackdropLabel">Information</h5>
          <i class="fas fa-times close_category" aria-hidden="true"></i>

        </div>
        <div class="modal-body">
            <form action="/category/update" method="POST" enctype="multipart/form-data">
                        @csrf
                <div class="form-group">
                    <input hidden type="text" class="form-control" id="edit_id" name="id" value="">
                


                        <label for="name" class="label-text">Category Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name" value="">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <script>
                        function generateCardNo(x) {
                            if (!x) {
                                x = 16;
                            }
                            chars = '1234567890';
                            no = '';
                            for (var i = 0; i < x; i++) {
                                var rnum = Math.floor(Math.random() * chars.length);
                                no += chars.substring(rnum, rnum + 1);
                            }
                            return no;
                        }
                        function edit_myFunction() {
                        document.getElementById("edit_code").onclick = function(){
                        document.getElementById("edit_code").value =  generateCardNo(8);
                        };
                        }
                        </script>
                    <div class="form-group ">
                        <label for="code" class="label-text">Category Code</label>
                        <i class="fa fa-random"></i>
                        <input type="text" class="form-control" id="edit_code" onclick="edit_myFunction()" name="code" value="">
                        @error('code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary  close_category" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sila ">Edit Category</button>
              </div>
            </form>
      </div>
    </div>
</div>
@stop

@push('js')
<script type="text/javascript">
    $("#add_category").click(function(){
        $('#modal_add_category').modal('show')
    });
    $(".close_category").click(function(){
        $('#modal_add_category').modal('hide')
        $('#modal_edit_category').modal('hide')
    });
    $(document).ready(function(){
    var table = $('#dataTable').DataTable();
    table.on('click','.edit_category',function(){
        $tr = $(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent') ;
        }
        var data = table.row($tr).data();
        console.log(data);
        $('#edit_id').val(data[0]);
        $('#edit_name').val(data[2]);
        $('#edit_code').val(data[3]);
        $('#modal_edit_category').modal('show');
    })
    });
</script>
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template/backend/sb-admin-2') }}/js/demo/datatables-demo.js"></script>
@endpush

