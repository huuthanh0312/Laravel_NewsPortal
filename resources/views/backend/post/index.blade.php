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
                    <h4 class="card-title">Post Page
                        <a href="{{route('create.post')}}" class="btn btn-primary btn-fw" style="float:right;" >Add Post</a>
                    </h4>
                    <br>
                    <div class="table-responsive ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Post Title </th>
                                    <th>Category </th>
                                    <th>District</th>
                                    <th>Image </th>
                                    <th>Post Date</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($post as $row)
                                <tr>
                                    <td>{{Str::limit($row->title_en,30)}} </td>
                                    <td>{{$row->category_en}}</td>
                                    <td>{{$row->district_en}}</td>
                                    <td><img src="{{asset($row->image)}}" style="width: 50px; height: 50px;"></td>
                                    <td>{{Carbon\Carbon::parse($row->post_date)->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{url('edit/post/'.$row->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{url('delete/post/'.$row->id)}}" class="btn btn-danger" id="delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                    <br>
                    {{$post->links('pagination-links')}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection