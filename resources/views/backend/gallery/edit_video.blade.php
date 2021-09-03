@extends('admin.admin_master')

@section('admin_content')
<div class="content-wrapper">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('dashboard')}}">Home</a>
        <span class="breadcrumb-item">Video</span>
        <!-- <span class="breadcrumb-item active">Category List</span>  -->
    </nav>
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Video Gallery Edit
                    </h4>
                    <br>
                    <form action="{{url('update/video/'.$video->id)}}" method="post">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="title">Video Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    value="{{$video->title}}">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="embed_code">Embed Code</label>
                                <input type="text" name="embed_code" class="form-control" id="embed_code"
                                    value="{{$video->embed_code}}">
                                @error('embed_code')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group pd-12">
                                <label for="type">Photo Type</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="1" <?php if($video->type == 1) echo"selected"; ?>>Big Video</option>
                                    <option value="0" <?php if($video->type == 0) echo"selected"; ?>>Small Video</option>
                                </select>

                            </div>
                        </div><!-- modal-body -->
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a href="{{route('video.gallery')}}" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection