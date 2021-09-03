@extends('admin.admin_master')

@section('admin_content')
<div class="content-wrapper">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('dashboard')}}">Home</a>
        <span class="breadcrumb-item">Photo</span>
        <!-- <span class="breadcrumb-item active">Category List</span>  -->
    </nav>
    @error('title')
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>{{$message}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    @error('photo')
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>{{$message}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Photo Gallery
                        <button class="btn btn-primary btn-fw" style="float:right;" data-toggle="modal"
                            data-target="#modal_add_cate">Add Photo</button>
                    </h4>
                    <br>
                    <div class="table-responsive ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Photo Title </th>
                                    <th> Photo Image </th>
                                    <th> Type </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($photo as $key=>$row)
                                <tr>

                                    <td>{{$key +1}}</td>
                                    <td>{{$row->title}} </td>
                                    <td>
                                        <img src="{{asset($row->photo)}}" alt="" style="width:50px; height:50px;">
                                    </td>
                                    <td>
                                        @if($row->type == 1)
                                        <span class="badge badge-success">Big Photo</span>
                                        @else
                                        <span class="badge badge-info">Small Photo</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('edit/photo/'.$row->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{url('delete/photo/'.$row->id)}}" class="btn btn-danger"
                                            id="delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <br>
                    {{$photo->links('pagination-links')}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Category MODAL -->
<div id="modal_add_cate" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Photo Gallery Add New</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('add.photo')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="title">Photo Title</label>
                        <input type="text" name="title" class="form-control" id="title"
                            placeholder=" Enter Photo Title">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group pd-12">
                        <label>New Photo Upload</label>
                        <input type="file" name="photo" class="form-control-file">
                        @error('photo')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group pd-12">
                        <label for="type">Photo Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="1">Big Photo</option>
                            <option value="0">Small Photo</option>
                        </select>
                        
                    </div>
                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pd-x-20">Submit</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
@endsection