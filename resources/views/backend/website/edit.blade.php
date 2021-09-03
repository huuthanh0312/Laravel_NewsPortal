@extends('admin.admin_master')

@section('admin_content')
<div class="content-wrapper">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('dashboard')}}">Home</a>
        <span class="breadcrumb-item">Category</span>
        <!-- <span class="breadcrumb-item active">Category List</span>  -->
    </nav>

    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Website Link Edit

                    </h4>
                    <br>
                    <form action="{{url('update/website/'.$website->id)}}" method="post">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="website_name">Website Name</label>
                                <input type="text" name="website_name" class="form-control" id="website_name"
                                    value="{{$website->website_name}}">
                                @error('website_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="website_link">Website Link</label>
                                <input type="text" name="website_link" class="form-control" id="website_link"
                                    value="{{$website->website_link}}">
                                @error('website_link')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- modal-body -->
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a href="{{route('admin.categories')}}" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection