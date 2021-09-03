@extends('main.home_master')
@section('content')

@php
$websites_link = DB::table('websites')->get();
$first_section_thumbnail = DB::table('posts')->where('first_section_thumbnail', 1)->orderBy('id', 'desc')->first();

$first_section = DB::table('posts')->where('first_section', 1)->orderBy('id', 'desc')->limit(8)->get();
@endphp
<!-- 1st-news-section-start -->
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-md-1 col-sm-1 col-lg-1"></div>
                    <div class="col-md-10 col-sm-10">
                        <div class="lead-news">
                            <div class="service-img"><a href="#"><img src="{{asset($first_section_thumbnail->image)}}"
                                        width="800px" alt="Notebook"></a></div>
                            <div class="content">
                                <h4 class="lead-heading-01"><a href="#">
                                        @if(session()->get('lang') == 'en')
                                        {{$first_section_thumbnail->title_en}}
                                        @else
                                        {{$first_section_thumbnail->title_vi}}
                                        @endif
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    @foreach($first_section as $row)
                    <div class="col-lg-3 col-sm-3">
                        <div class="top-news">
                            <a href="#"><img src="{{asset($row->image)}}" alt="Notebook"></a>
                            <h4 class="heading-02"><a href="#">
                                    @if(session()->get('lang') == 'en')
                                    {{$row->title_en}}
                                    @else
                                    {{$row->title_vi}}
                                    @endif
                                </a> </h4>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="add"><img src="assets/img/top-ad.jpg" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->

                @php
                $firstcategory = DB::table('categories')->first();
                $firstcatbigthum = DB::table('posts')->where('category_id', $firstcategory->id)
                ->where('bigthumbnail', '1')->first();
                $firstcatbigthumall = DB::table('posts')->where('category_id', $firstcategory->id)
                ->where('bigthumbnail', NULL)->limit(3)->get();
                @endphp
                <!-- news-start -->
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            <div class="cetagory-title">
                                <a href="#">
                                    @if(session()->get('lang') == 'en')
                                    {{$firstcategory->category_en}}
                                    @else
                                    {{$firstcategory->category_vi}}
                                    @endif
                                    <span>
                                        @if(session()->get('lang') == 'en')
                                        More
                                        @else
                                        Đọc Thêm
                                        @endif
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    </span></a>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="top-news">
                                        <a href="#"><img src="{{asset($firstcatbigthum->image)}}" alt="Notebook"></a>
                                        <h4 class="heading-02"><a href="#">
                                                @if(session()->get('lang') == 'en')
                                                {{$firstcatbigthum->title_en}}
                                                @else
                                                {{$firstcatbigthum->title_vi}}
                                                @endif
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    @foreach($firstcatbigthumall as $row)
                                    <div class="image-title">
                                        <a href="#"><img src="{{asset($row->image)}}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">
                                                @if(session()->get('lang') == 'en')
                                                {{$row->title_en}}
                                                @else
                                                {{$row->title_vi}}
                                                @endif
                                            </a>
                                        </h4>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                    $twocategory = DB::table('categories')->skip(1)->first();
                    $twocatbigthum = DB::table('posts')->where('category_id', $twocategory->id)
                    ->where('bigthumbnail', '1')->first();
                    $twocatbigthumall = DB::table('posts')->where('category_id', $twocategory->id)
                    ->where('bigthumbnail', NULL)->limit(3)->get();
                    @endphp

                    <div class="col-md-6 col-sm-6">
                        <div class="bg-one">
                            <div class="cetagory-title">
                                <a href="#">
                                    @if(session()->get('lang') == 'en')
                                    {{$twocategory->category_en}}
                                    @else
                                    {{$twocategory->category_vi}}
                                    @endif
                                    <span>
                                        @if(session()->get('lang') == 'en')
                                        More
                                        @else
                                        Đọc Thêm
                                        @endif
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    </span></a>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="top-news">
                                        <a href="#"><img src="{{asset($twocatbigthum->image)}}" alt="Notebook"></a>
                                        <h4 class="heading-02"><a href="#">
                                                @if(session()->get('lang') == 'en')
                                                {{$twocatbigthum->title_en}}
                                                @else
                                                {{$twocatbigthum->title_vi}}
                                                @endif
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    @foreach($twocatbigthumall as $row)
                                    <div class="image-title">
                                        <a href="#"><img src="{{asset($row->image)}}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">
                                                @if(session()->get('lang') == 'en')
                                                {{$row->title_en}}
                                                @else
                                                {{$row->title_vi}}
                                                @endif
                                            </a>
                                        </h4>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3">
                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="{{asset('frontend/assets/img/banner_1.jpg')}}" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->

                @php
                $livetv = DB::table('livetvs')->first();
                @endphp
                @if($livetv->status == 1)
                <!-- youtube-live-start -->
                <div class="cetagory-title-03">Live TV</div>
                <div class="photo">
                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item"
                        style="margin-bottom:5px;">
                        {!! $livetv->embed_code !!}

                    </div>
                </div><!-- /.youtube-live-close -->
                @endif
                <!-- facebook-page-start -->
                <div class="cetagory-title-03">Facebook </div>
                <div class="fb-root">
                    facebook page here
                </div><!-- /.facebook-page-close -->

                <!-- add-start -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                            <img src="{{asset('frontend/assets/img/add_01.jpg')}}" alt="" />
                        </div>
                    </div>
                </div><!-- /.add-close -->
            </div>
        </div>
    </div>
</section><!-- /.1st-news-section-close -->

<!-- 2nd-news-section-start -->
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            @php
            $threecategory = DB::table('categories')->skip(2)->first();
            $threecatbigthum = DB::table('posts')->where('category_id', $threecategory->id)
            ->where('bigthumbnail', '1')->first();
            $threecatbigthumall = DB::table('posts')->where('category_id', $threecategory->id)
            ->where('bigthumbnail', NULL)->limit(3)->get();
            @endphp
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02">
                        <a href="#">
                            @if(session()->get('lang') == 'en')
                            {{$threecategory->category_en}}
                            @else
                            {{$threecategory->category_vi}}
                            @endif
                            <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus"
                                    aria-hidden="true"></i>
                                @if(session()->get('lang') == 'en')
                                All News
                                @else
                                Tất Cả Bài Viết
                                @endif
                            </span></a>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{asset($threecatbigthum->image)}}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">
                                        @if(session()->get('lang') == 'en')
                                        {{$threecatbigthum->title_en}}
                                        @else
                                        {{$threecatbigthum->title_vi}}
                                        @endif
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            @foreach($threecatbigthumall as $row)
                            <div class="image-title">
                                <a href="#"><img src="{{asset($row->image)}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">
                                        @if(session()->get('lang') == 'en')
                                        {{$row->title_en}}
                                        @else
                                        {{$row->title_vi}}
                                        @endif
                                    </a>
                                </h4>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @php
            $fourcategory = DB::table('categories')->skip(3)->first();
            $fourcatbigthum = DB::table('posts')->where('category_id', $fourcategory->id)
                                ->where('bigthumbnail', '1')->first();
            $fourcatbigthumall = DB::table('posts')->where('category_id', $fourcategory->id)
                                ->where('bigthumbnail', NULL)->limit(3)->get();
            @endphp
            <div class="col-md-6 col-sm-6">
                <div class="bg-one">
                    <div class="cetagory-title-02">
                        <a href="#">
                            @if(session()->get('lang') == 'en')
                            {{$fourcategory->category_en}}
                            @else
                            {{$fourcategory->category_vi}}
                            @endif
                            <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus"
                                    aria-hidden="true"></i>
                                @if(session()->get('lang') == 'en')
                                All News
                                @else
                                Tất Cả Bài Viết
                                @endif
                            </span></a>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{asset($fourcatbigthum->image)}}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">
                                        @if(session()->get('lang') == 'en')
                                        {{$fourcatbigthum->title_en}}
                                        @else
                                        {{$fourcatbigthum->title_vi}}
                                        @endif
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            @foreach($fourcatbigthumall as $row)
                            <div class="image-title">
                                <a href="#"><img src="{{asset($row->image)}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">
                                        @if(session()->get('lang') == 'en')
                                        {{$row->title_en}}
                                        @else
                                        {{$row->title_vi}}
                                        @endif
                                    </a>
                                </h4>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ******* -->
        <div class="row">
            @php
            $fivecategory = DB::table('categories')->skip(4)->first();
            $fivecatbigthum = DB::table('posts')->where('category_id', $fivecategory->id)
                                ->where('bigthumbnail', '1')->first();
            $fivecatbigthumall = DB::table('posts')->where('category_id', $fivecategory->id)
                                ->where('bigthumbnail', NULL)->limit(3)->get();
            @endphp
            <div class="col-md-12 col-sm-12">
                <div class="bg-one">
                    <div class="cetagory-title-02">
                        <a href="#">
                            @if(session()->get('lang') == 'en')
                            {{$fivecategory->category_en}}
                            @else
                            {{$fivecategory->category_vi}}
                            @endif
                            <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus"
                                    aria-hidden="true"></i>
                                @if(session()->get('lang') == 'en')
                                All News
                                @else
                                Tất Cả Bài Viết
                                @endif
                            </span></a>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="top-news">
                                <a href="#"><img src="{{asset($fivecatbigthum->image)}}" alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">
                                        @if(session()->get('lang') == 'en')
                                        {{$fivecatbigthum->title_en}}
                                        @else
                                        {{$fivecatbigthum->title_vi}}
                                        @endif
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            @foreach($fivecatbigthumall as $row)
                            <div class="image-title">
                                <a href="#"><img src="{{asset($row->image)}}" alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">
                                        @if(session()->get('lang') == 'en')
                                        {{$row->title_en}}
                                        @else
                                        {{$row->title_vi}}
                                        @endif
                                    </a>
                                </h4>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- add-start -->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="add"><img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt="" /></div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="add"><img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt="" /></div>
            </div>
        </div><!-- /.add-close -->

    </div>
</section><!-- /.2nd-news-section-close -->

@php 
$bigphoto = DB::table('photos')->where('type', 1)->orderBy('id', 'desc')->first();

$smaillphoto = DB::table('photos')->where('type', 0)->orderBy('id', 'desc')->get();

$bigvideo = DB::table('videos')->where('type', 1)->orderBy('id', 'desc')->first();

$smaillvideo = DB::table('videos')->where('type', 0)->orderBy('id', 'desc')->get();
@endphp
<!-- gallery-section-start -->
<section class="news-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-7">
                <div class="gallery_cetagory-title">
                @if(session()->get('lang') == 'en')
                    Photo Gallery
                @else  
                    Thư Viện Ảnh
                @endif
                </div>

                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <div class="photo_screen">
                            <div class="myPhotos" style="width:100%">
                                <img src="{{asset($bigphoto->photo)}}" alt="Avatar">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="photo_list_bg">
                            @foreach($smaillphoto as $row)
                            <div class="photo_img photo_border active">
                                <img src="{{$row->photo}}" alt="image" onclick="currentDiv(1)">
                                <div class="heading-03">
                                    {{$row->title}}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!--=======================================
                    Video Gallery clickable jquary  start
                ========================================-->

                <script>
                var slideIndex = 1;
                showDivs(slideIndex);

                function plusDivs(n) {
                    showDivs(slideIndex += n);
                }

                function currentDiv(n) {
                    showDivs(slideIndex = n);
                }

                function showDivs(n) {
                    var i;
                    var x = document.getElementsByClassName("myPhotos");
                    var dots = document.getElementsByClassName("demo");
                    if (n > x.length) {
                        slideIndex = 1
                    }
                    if (n < 1) {
                        slideIndex = x.length
                    }
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                    }
                    x[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " w3-opacity-off";
                }
                </script>

                <!--=======================================
                    Video Gallery clickable  jquary  close
                =========================================-->

            </div>
            <div class="col-md-4 col-sm-5">
                <div class="gallery_cetagory-title">
                @if(session()->get('lang') == 'en')
                    Video Gallery
                @else  
                    Thư Viện Video
                @endif
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="video_screen">
                            <div class="myVideos" style="width:100%">
                                <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                    <iframe width="853" height="480"
                                        src="https://www.youtube.com/embed/{{$bigvideo->embed_code}}"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen control></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="gallery_sec owl-carousel">
                            @foreach($smaillvideo as $row)
                            <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                            <iframe width="100%"
                                src="https://www.youtube.com/embed/{{$row->embed_code}}"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen control></iframe>
                                
                            </div>
                            @endforeach
                        
                        </div>
                    </div>
                </div>


                <script>
                var slideIndex = 1;
                showDivss(slideIndex);

                function plusDivs(n) {
                    showDivss(slideIndex += n);
                }

                function currentDivs(n) {
                    showDivss(slideIndex = n);
                }

                function showDivss(n) {
                    var i;
                    var x = document.getElementsByClassName("myVideos");
                    var dots = document.getElementsByClassName("demo");
                    if (n > x.length) {
                        slideIndex = 1
                    }
                    if (n < 1) {
                        slideIndex = x.length
                    }
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                    }
                    x[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " w3-opacity-off";
                }
                </script>

            </div>
        </div>
    </div>
</section><!-- /.gallery-section-close -->
@endsection