@extends('admin.admin_master')

@section('admin_content')
<div class="content-wrapper">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('dashboard')}}">Home</a>
        <span class="breadcrumb-item">Social Setting</span>
        <!-- <span class="breadcrumb-item active">Category List</span>  -->
    </nav>
    
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Social Setting
                    </h4>
                    <br>
                    <form action="{{url('update/social/'.$social->id)}}" method="post">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="cate_en">Facebook</label>
                                <input type="text" name="facebook" class="form-control" id="cate_en"
                                    value="{{$social->facebook}}">
                            </div>
                            <div class="form-group">
                                <label for="cate_en">Youtube</label>
                                <input type="text" name="youtube" class="form-control" id="cate_en"
                                    value="{{$social->youtube}}">
                            </div>
                            <div class="form-group">
                                <label for="cate_en">Twitter</label>
                                <input type="text" name="twitter" class="form-control" id="cate_en"
                                    value="{{$social->twitter}}">
                            </div>
                            <div class="form-group">
                                <label for="cate_en">LinkedIn</label>
                                <input type="text" name="linkedin" class="form-control" id="cate_en"
                                    value="{{$social->linkedin}}">
                            </div>
                            <div class="form-group">
                                <label for="cate_en">Instagram</label>
                                <input type="text" name="instagram" class="form-control" id="cate_en"
                                    value="{{$social->instagram}}">
                            </div>
                        </div><!-- modal-body -->
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection