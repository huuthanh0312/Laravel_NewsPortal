@extends('admin.admin_master')

@section('admin_content')
<div class="content-wrapper">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('dashboard')}}">Home</a>
        <span class="breadcrumb-item">Sub Category</span>
        <!-- <span class="breadcrumb-item active">Category List</span>  -->
    </nav>
    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sub Category Edit

                    </h4>
                    <br>
                    <form action="{{url('update/subcategory/'.$subcategory->id)}}" method="post">
                        @csrf
                        <div class="modal-body pd-20">
                            <div class="form-group">
                                <label for="cate_en">Sub Category English</label>
                                <input type="text" name="subcategory_en" class="form-control" id="cate_en"
                                    value="{{$subcategory->subcategory_en}}">
                                @error('subcategory_en')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cate_vi">Sub Category VietNam</label>
                                <input type="text" name="subcategory_vi" class="form-control" id="cate_vi"
                                    value="{{$subcategory->subcategory_vi}}">
                                @error('subcategory_vi')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cate_id">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach($category as $cate)
                                    <option value="{{$cate->id}}" <?php if($cate->id == $subcategory->category_id){echo "selected";} ?>>
                                        {{$cate->category_en}} | {{$cate->category_vi}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- modal-body -->
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a href="{{route('admin.subcategories')}}" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection