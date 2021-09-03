@extends('admin.admin_master')

@section('admin_content')
<div class="content-wrapper">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('dashboard')}}">Home</a>
        <span class="breadcrumb-item">Live TV</span>
        <!-- <span class="breadcrumb-item active">Category List</span>  -->
    </nav>
    
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Live TV Setting
                    </h4>
                    <br>
                    <div class="pd-20 ml-3">
                    @if($livetv->status == 1)
                    <a href="{{url('inactive/livetv/'.$livetv->id)}}" class="btn btn-danger btn-fw">DeActive</a>
                    <br>
                    <small class="text-danger">Now Live TV are DeActive</small>
                    @else
                    <a href="{{url('active/livetv/'.$livetv->id)}}" class="btn btn-primary btn-fw">Active</a>
                    <br>
                    <small class="text-success">Now Live TV are Active</small>
                    @endif
                    </div>
                    <form action="{{url('update/livetv/'.$livetv->id)}}" method="post">
                        @csrf
                        <div class="modal-body pd-20">
                            
                            <div class="form-group">
                                <label for="cate_en">Embed Code For Live</label>
                                <textarea class="form-control" id="summernote" rows="4" name="embed_code" >{{$livetv->embed_code }}</textarea>
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