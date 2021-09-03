@php 
$category = DB::table('categories')->get();
$social = DB::table('socials')->first();
@endphp 
   
   <!-- header-start -->
    <section class="hdr_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6 col-md-2 col-sm-4">
                    <div class="header_logo">
                        <a href=""><img src="{{asset('frontend/assets/img/logo1.png')}}"></a>
                    </div>
                </div>
                <div class="col-xs-6 col-md-8 col-sm-8">
                    <div id="menu-area" class="menu_area">
                        <div class="menu_bottom">
                            <nav role="navigation" class="navbar navbar-default mainmenu">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" data-target="#navbarCollapse" data-toggle="collapse"
                                        class="navbar-toggle">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <!-- Collection of nav links and other content for toggling -->
                                <div id="navbarCollapse" class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav">
                                        <li><a href="#">
                                            @if(session()->get('lang') == 'en')
                                                Home
                                            @else
                                                Trang Chủ 
                                            @endif
                                            </a></li>
                                        @foreach($category as $cate)
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle text-uppercase" data-toggle="dropdown">
                                                @if(session()->get('lang') == 'en')
                                                {{$cate->category_en}} 
                                                @else
                                                {{$cate->category_vi}} 
                                                @endif
                                                <b class="caret"></b></a>
                                                @php 
                                                $subcategory = DB::table('subcategories')->where('category_id', $cate->id)->get();
                                                @endphp                                           
                                                <ul class="dropdown-menu">
                                                @foreach($subcategory as $subcate) 
                                                    <li><a href="#">
                                                        @if(session()->get('lang') == 'en')
                                                            {{$subcate->subcategory_en}}
                                                        @else
                                                            {{$subcate->subcategory_vi}}
                                                        @endif
                                                    </a></li>
                                                    @endforeach
                                                </ul>          
                                        </li>
                                        @endforeach
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-2 col-sm-12">
                    <div class="header-icon">
                        <ul>
                            <!-- version-start -->
                            @if(session()->get('lang') == 'en')
                            <li class="version"><a href="{{route('vi.language')}}"><B>VI</B></a></li>&nbsp;&nbsp;&nbsp;
                            @else
                            <li class="version"><a href="{{route('en.language')}}"><B>EN</B></a></li>&nbsp;&nbsp;&nbsp;
                            @endif
                            <!-- login-start -->

                            <!-- search-start -->
                            <li>
                                <div class="search-large-divice">
                                    <div class="search-icon-holder"> <a href="#" class="search-icon" data-toggle="modal"
                                            data-target=".bd-example-modal-lg"><i class="fa fa-search"
                                                aria-hidden="true"></i></a>
                                        <div class="modal fade bd-example-modal-lg" action="" tabindex="-1"
                                            role="dialog" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"> <i class="fa fa-times-circle"
                                                                aria-hidden="true"></i> </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="custom-search-input">
                                                                    <form>
                                                                        <div class="input-group">
                                                                            <input class="search form-control input-lg"
                                                                                placeholder="search" value="Type Here.."
                                                                                type="text">
                                                                            <span class="input-group-btn">
                                                                                <button class="btn btn-lg"
                                                                                    type="button"> <i
                                                                                        class="fa fa-search"
                                                                                        aria-hidden="true"></i>
                                                                                </button>
                                                                            </span>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- social-start -->
                            <li>
                                <div class="dropdown">
                                    <button class="dropbtn-02"><i class="fa fa-thumbs-up"
                                            aria-hidden="true"></i></button>
                                    <div class="dropdown-content">
                                        <a href="{{$social->facebook}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                                        <a href="{{$social->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                                        <a href="{{$social->youtube}}"><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</a>
                                        <a href="{{$social->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.header-close -->