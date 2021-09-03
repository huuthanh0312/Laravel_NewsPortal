@extends('admin.admin_master')

@section('admin_content')
@php 
$subcategory = DB::table('subcategories')->where('category_id', $post->category_id)->get();
$subdistrict = DB::table('subdistricts')->where('district_id', $post->district_id)->get();
@endphp
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
                    <h4 class="card-title">Post Edit

                    </h4>
                    <br>
                    <form action="{{url('update/post/'.$post->id)}}" method="post" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body pd-20 row">
                            <div class="form-group col-lg-6">
                                <label for="cate_en">Title English</label>
                                <input type="text" name="title_en" class="form-control" id="cate_en"
                                    placeholder="Title English" required value="{{$post->title_en}}" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="title_vi">Title VietNam</label>
                                <input type="text" name="title_vi" class="form-control" id="title_vi"
                                    placeholder="Title VietNam" required value="{{$post->title_vi}}"/>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="cate_en">Category</label>
                                <select name="category_id" id="category_id" class="form-control">                                  
                                    @foreach($category as $cate)   
                                        <option value="{{$cate->id}}" <?php if($cate->id == $post->category_id) echo"selected";?>>
                                            {{$cate->category_en}} | {{$cate->category_vi}}
                                        </option>                                   
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="title_vi">Sub Category</label>
                                <select name="subcategory_id" id="subcategory" class="form-control">
                                    @foreach($subcategory as $subcate)   
                                        <option value="{{$subcate->id}}" <?php if($subcate->id == $post->category_id) echo"selected";?>>
                                            {{$subcate->subcategory_en}} | {{$subcate->subcategory_vi}}
                                        </option>                                   
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group col-lg-6">
                                <label for="cate_id">District</label>
                                <select name="district_id" id="district_id" class="form-control">
                                    
                                    @foreach($district as $dis)
                                    <option value="{{$dis->id}}" <?php if($dis->id == $post->district_id) echo"selected";?>>
                                        {{$dis->district_en}} | {{$dis->district_vi}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="title_vi">Sub District</label>
                                <select name="subdistrict_id" id="subdistrict" class="form-control">
                                    @foreach($subdistrict as $subdis)
                                    <option value="{{$subdis->id}}" <?php if($subdis->id == $post->district_id) echo"selected";?>>
                                        {{$subdis->subdistrict_en}} | {{$subdis->subdistrict_vi}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>New Image upload</label>
                                <input type="file" name="image" class="form-control-file" >

                            </div>
                            <div class="form-group col-lg-6">
                                <label>Old Image</label>
                                <input type="hidden" name="old_image" class="form-control-file" value="{{$post->image}}" >
                                <img src="{{URL::to($post->image)}}" alt="" style = "width:80px; height:80px;">
                            </div>
                            <div class="form-group  col-lg-12">
                                <label for="exampleTextarea1">Details English</label>
                                <textarea class="form-control" id="summernote" rows="4" name="details_en" >{{$post->details_en }}</textarea>
                            </div>
                            <div class="form-group  col-lg-12">
                                <label for="exampleTextarea1">Details VietNam</label>
                                <textarea class="form-control" id="summernote1" rows="4" name="details_vi">{{$post->details_vi }}</textarea>
                            </div>
                            <hr>
                            <br>
                            <div class="form-group col-lg-12">
                                <h3 class="text-center">Extra Options</h3>
                            </div>
                            
                            <div class="form-group col-lg-3">
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="headline" class="form-check-input" value="1" <?php if($post->headline == 1) echo"checked";?>>Headline </label>
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="bigthumbnail" class="form-check-input" value="1" <?php if($post->bigthumbnail == 1) echo"checked";?>>General Big Thumbnails</label>
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="first_section" class="form-check-input" value="1" <?php if($post->first_section == 1) echo"checked";?>>First Section </label>
                                </div>
                            </div>
                            <div class="form-group col-lg-3">
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="first_section_thumbnail" class="form-check-input" value="1" <?php if($post->first_section_thumbnail == 1) echo"checked";?>>First Section Thumbnails </label>
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