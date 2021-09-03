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
                    <h4 class="card-title">District Page
                        <button class="btn btn-primary btn-fw" style="float:right;" data-toggle="modal"
                            data-target="#modal_add_cate">Add District</button>
                    </h4>
                    <br>
                    <div class="table-responsive ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> District English </th>
                                    <th> District VietNam </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($district as $key=>$row)
                                <tr>

                                    <td>{{$key +1}}</td>
                                    <td>{{$row->district_en}} </td>
                                    <td>{{$row->district_vi}}</td>
                                    <td>
                                        <a href="{{url('edit/district/'.$row->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{url('delete/district/'.$row->id)}}" class="btn btn-danger" id="delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                    <br>
                    {{$district->links('pagination-links')}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Category MODAL -->
<div id="modal_add_cate" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">District Add New</h6>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('store.district')}}" method="post">
                @csrf
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="cate_en">District English</label>
                        <input type="text" name="district_en" class="form-control" id="cate_en"
                            placeholder=" Enter District English">
                        @error('district_en')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cate_vi">District VietNam</label>
                        <input type="text" name="district_vi" class="form-control" id="cate_vi"
                            placeholder="Enter District VietNam">
                        @error('district_vi')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pd-x-20">Submit</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
@endsection