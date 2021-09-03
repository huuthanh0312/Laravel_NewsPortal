@extends('admin.admin_master')

@section('admin_content')
<div class="content-wrapper">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{route('dashboard')}}">Home</a>
        <span class="breadcrumb-item">Post</span>
        <!-- <span class="breadcrumb-item active">Category List</span>  -->
    </nav>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Post Create

                    </h4>
                    <br>
                    <form action="{{route('store.post')}}" method="post" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body pd-20 row">
                            <div class="form-group col-lg-6">
                                <label for="cate_en">Title English</label>
                                <input type="text" name="title_en" class="form-control" id="cate_en"
                                    placeholder="Title English" required />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="title_vi">Title VietNam</label>
                                <input type="text" name="title_vi" class="form-control" id="title_vi"
                                    placeholder="Title VietNam" required />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="cate_en">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option disabled selected> --Select Category--</option>
                                    @foreach($category as $cate)
                                    <option value="{{$cate->id}}">
                                        {{$cate->category_en}} | {{$cate->category_vi}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="title_vi">Sub Category</label>
                                <select name="subcategory_id" id="subcategory" class="form-control">
                                    
                                </select>

                            </div>
                            <div class="form-group col-lg-6">
                                <label for="cate_id">District</label>
                                <select name="district_id" id="district_id" class="form-control">
                                    <option disabled selected> --Select District--</option>
                                    @foreach($district as $dis)
                                    <option value="{{$dis->id}}">
                                        {{$dis->district_en}} | {{$dis->district_vi}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="title_vi">Sub District</label>
                                <select name="subdistrict_id" id="subdistrict" class="form-control">
                                    
                                </select>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>New Image upload</label>
                                <input type="file" name="image" class="form-control-file" >
                                
                            </div>
                            <div class="form-group  col-lg-12">
                                <label for="exampleTextarea1">Details English</label>
                                <textarea class="form-control" id="summernote" rows="4" name="details_en"></textarea>
                            </div>
                            <div class="form-group  col-lg-12">
                                <label for="exampleTextarea1">Details VietNam</label>
                                <textarea class="form-control" id="summernote1" rows="4" name="details_vi"></textarea>
                            </div>
                            <hr>
                            <br>
                            <div class="form-group col-lg-12">
                                <h3 class="text-center">Extra Options</h3>
                            </div>
                            
                            <div class="form-group col-lg-3">
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="headline" class="form-check-input" value="1">Headline </label>
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="bigthumbnail" class="form-check-input" value="1">General Big Thumbnails</label>
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="first_section" class="form-check-input" value="1">First Section </label>
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="first_section_thumbnail" class="form-check-input" value="1">First Section Thumbnails </label>
                                </div>
                            </div>
                        </div><!-- modal-body -->
                        <hr>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('select[name = "category_id"]').on('change', function(){
            var cat_id = $(this).val();
            if(cat_id ){
                $.ajax({
                    url: "{{url('get/subcategory/')}}/"+cat_id,
                    type: 'get',
                    dataType: 'json',
                    success: function(data){
                        $('#subcategory').empty();
                        $.each(data , function(key,value){
                            $('#subcategory').append('<option value="'+value.id+'">'+value.subcategory_en+' | '+value.subcategory_vi+'</option>');
                        });
                    }
                });
            }

        });
        $('select[name = "district_id"]').on('change', function(){
            var dis_id = $(this).val();
            if(dis_id ){
                $.ajax({
                    url: "{{url('get/subdistrict/')}}/"+dis_id,
                    type: 'get',
                    dataType: 'json',
                    success: function(data){
                        $('#subdistrict').empty();
                        $.each(data , function(key,value){
                            $('#subdistrict').append('<option value="'+value.id+'">'+value.subdistrict_en+' | '+value.subdistrict_vi+'</option>');
                        });
                    }
                });
            }

        });
    })
</script>
@endsection