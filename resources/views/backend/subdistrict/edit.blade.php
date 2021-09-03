@extends('admin.admin_master')

@section('admin_content')
<div class="content-wrapper">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('dashboard')}}">Home</a>
        <span class="breadcrumb-item">Sub District</span>
        <!-- <span class="breadcrumb-item active">Category List</span>  -->
    </nav>
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sub District Edit

                    </h4>
                    <br>
                    <form action="{{url('update/subdistrict/'.$subdistrict->id)}}" method="post">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="cate_en">Sub District English</label>
                                <input type="text" name="subdistrict_en" class="form-control" id="cate_en"
                                    value="{{$subdistrict->subdistrict_en}}">
                                @error('subdistrict_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cate_vi">Sub District VietNam</label>
                                <input type="text" name="subdistrict_vi" class="form-control" id="cate_vi"
                                    value="{{$subdistrict->subdistrict_vi}}">
                                @error('subdistrict_vi')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cate_id">District</label>
                                <select name="district_id" id="" class="form-control">
                                    @foreach($district as $dis)
                                    <option value="{{$dis->id}}" <?php if($dis->id == $subdistrict->district_id){echo "selected";} ?>>
                                        {{$dis->district_en}} | {{$dis->district_vi}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- modal-body -->
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a href="{{route('admin.subdistricts')}}" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection