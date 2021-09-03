@extends('admin.admin_master')

@section('admin_content')
<div class="content-wrapper">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('dashboard')}}">Home</a>
        <span class="breadcrumb-item">Photo</span>
        <!-- <span class="breadcrumb-item active">Category List</span>  -->
    </nav>
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Photo Gallery Edit
                    </h4>
                    <br>
                    <form action="{{url('update/photo/'.$photo->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="title">Photo Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    value="{{$photo->title}}">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group pd-12 row">
                                <div class="col-lg-6">
                                    <label>New Photo Upload</label>
                                    <input type="file" name="photo" class="form-control-file">
                                    @error('photo')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>Old Photo</label>
                                    <img src="{{URL::to($photo->photo)}}" alt="" style="width:100px; height:80px;">
                                    <input type="hidden" value="{{$photo->photo}}" name="old_photo">
                                </div>
                            </div>
                            <div class="form-group pd-12">
                                <label for="type">Photo Type</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="1" <?php if($photo->type == 1) echo"selected"; ?>>Big Photo</option>
                                    <option value="0" <?php if($photo->type == 0) echo"selected"; ?>>Small Photo</option>
                                </select>

                            </div>
                        </div><!-- modal-body -->
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a href="{{route('photo.gallery')}}" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection