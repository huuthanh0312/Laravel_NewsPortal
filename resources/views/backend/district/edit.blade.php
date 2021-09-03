@extends('admin.admin_master')

@section('admin_content')
<div class="content-wrapper">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('dashboard')}}">Home</a>
        <span class="breadcrumb-item">District</span>
        <!-- <span class="breadcrumb-item active">Category List</span>  -->
    </nav>
    @error('district_en')
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>{{$message}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @enderror

    @error('district_vi')
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
                    <h4 class="card-title">District Edit

                    </h4>
                    <br>
                    <form action="{{url('update/district/'.$district->id)}}" method="post">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="cate_en">District English</label>
                                <input type="text" name="district_en" class="form-control" id="cate_en"
                                    value="{{$district->district_en}}">
                                @error('district_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cate_vi">District VietNam</label>
                                <input type="text" name="district_vi" class="form-control" id="cate_vi"
                                    value="{{$district->district_vi}}">
                                @error('district_vi')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><!-- modal-body -->
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a href="{{route('admin.districts')}}" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection