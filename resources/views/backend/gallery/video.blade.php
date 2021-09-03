@extends('admin.admin_master')

@section('admin_content')
<div class="content-wrapper">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('dashboard')}}">Home</a>
        <span class="breadcrumb-item">Video</span>
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

    @error('embed_code')
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
                    <h4 class="card-title">Video Gallery
                        <button class="btn btn-primary btn-fw" style="float:right;" data-toggle="modal"
                            data-target="#modal_add_cate">Add Video</button>
                    </h4>
                    <br>
                    <div class="table-responsive ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Video Title </th>
                                    
                                    <th> Type </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($video as $key=>$row)
                                <tr>

                                    <td>{{$key +1}}</td>
                                    <td>{{$row->title}} </td>
                                    
                                    <td>
                                        @if($row->type == 1)
                                        <span class="badge badge-success">Big Video</span>
                                        @else
                                        <span class="badge badge-info">Small Video</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('edit/video/'.$row->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{url('delete/video/'.$row->id)}}" class="btn btn-danger"
                                            id="delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <br>
                    {{$video->links('pagination-links')}}
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Video Gallery Add New</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('add.video')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="title">Video Title</label>
                        <input type="text" name="title" class="form-control" id="title"
                            placeholder=" Enter Video Title">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="embed_code">Embed Code</label>
                        <input type="text" name="embed_code" class="form-control" id="embed_code"
                            placeholder=" Enter Embed Code">
                        @error('embed_code')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group pd-12">
                        <label for="type">Video Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="1">Big Video</option>
                            <option value="0">Small Video</option>
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