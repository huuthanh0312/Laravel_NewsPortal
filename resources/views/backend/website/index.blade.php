@extends('admin.admin_master')

@section('admin_content')
<div class="content-wrapper">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('dashboard')}}">Home</a>
        <span class="breadcrumb-item">Website Links</span>
        <!-- <span class="breadcrumb-item active">Category List</span>  -->
    </nav>
    @error('website_name')
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>{{$message}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    @error('website_link')
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
                    <h4 class="card-title">Category Page
                        <button class="btn btn-primary btn-fw" style="float:right;" data-toggle="modal"
                            data-target="#modal_add_cate">Add Category</button>
                    </h4>
                    <br>
                    <div class="table-responsive ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Website Name </th>
                                    <th> Website Link </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($website as $key=>$row)
                                <tr>

                                    <td>{{$key +1}}</td>
                                    <td>{{$row->website_name}} </td>
                                    <td>{{$row->website_link}}</td>
                                    <td>
                                        <a href="{{url('edit/website/'.$row->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{url('delete/website/'.$row->id)}}" class="btn btn-danger" id="delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                    <br>
                    {{$website->links('pagination-links')}}
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Website Link Add New</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('store.website')}}" method="post">
                @csrf
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="website_name">Website Name</label>
                        <input type="text" name="website_name" class="form-control" id="website_name"
                            placeholder=" Enter Website Name">
                        @error('website_name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cate_vi">Website Link</label>
                        <input type="text" name="website_link" class="form-control" id="cate_vi"
                            placeholder="Enter Website Link">
                        @error('website_link')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
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