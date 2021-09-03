@extends('admin.admin_master')

@section('admin_content')
<div class="content-wrapper">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('dashboard')}}">Home</a>
        <span class="breadcrumb-item">Seo</span>
        <!-- <span class="breadcrumb-item active">Category List</span>  -->
    </nav>
    
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Seo Setting
                    </h4>
                    <br>
                    <form action="{{url('update/seo/'.$seo->id)}}" method="post">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="cate_en">Meta Author</label>
                                <input type="text" name="meta_author" class="form-control" id="cate_en"
                                    value="{{$seo->meta_author}}">
                            </div>
                            <div class="form-group">
                                <label for="cate_en">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" id="cate_en"
                                    value="{{$seo->meta_title}}">
                            </div>
                            <div class="form-group">
                                <label for="cate_en">Meta Keyword</label>
                                <input type="text" name="meta_keyword" class="form-control" id="cate_en"
                                    value="{{$seo->meta_keyword}}">
                            </div>
                            <div class="form-group">
                                <label for="cate_en">Meta Description</label>
                                <textarea class="form-control" id="summernote" rows="4" name="meta_description" >{{$seo->meta_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="cate_en">Google Analysis</label>
                                <textarea class="form-control" id="summernote1" rows="4" name="google_analytics" >{{$seo->google_analytics }}</textarea>
                            </div>
              
                            <div class="form-group">
                                <label for="cate_en">Google Verification</label>
                                <input type="text" name="google_verification" class="form-control" id="cate_en"
                                    value="{{$seo->google_verification}}">
                            </div>
                            <div class="form-group">
                                <label for="cate_en">Alexa Analysis</label>
                                <textarea class="form-control" id="summernote2" rows="4" name="alexa_analytics" >{{$seo->alexa_analytics }}</textarea>
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