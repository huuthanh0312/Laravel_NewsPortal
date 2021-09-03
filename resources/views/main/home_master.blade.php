@php       
$seo = DB::table('seos')->first();
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="{{$seo->meta_author}}">
		<meta name="meta_keyword" content="{{$seo->meta_keyword}}">
		<meta name="description" content="{{$seo->meta_description}}">
		<meta name="google_verification	" content="{{$seo->google_verification}}">
        <title>{{$seo->meta_title}}</title>

        <link href="{{asset('frontend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/assets/css/menu.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/assets/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/assets/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/assets/css/responsive.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/assets/css/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/assets/style.css')}}" rel="stylesheet">

    </head>
    <body>
@include('main.body.header')
	
    <!-- top-add-start -->
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
					<div class="top-add"><img src="assets/img/top-ad.jpg" alt="" /></div>
				</div>
			</div>
		</div>
	</section> <!-- /.top-add-close -->
	
	<!-- date-start -->
    <section>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-12 col-sm-12">
					<div class="date">
						<ul>
							<li><i class="fa fa-map-marker" aria-hidden="true"></i>  Dhaka </li>
							<li><i class="fa fa-calendar" aria-hidden="true"></i>  Monday, 19th October 2020 </li>
							<li><i class="fa fa-clock-o" aria-hidden="true"></i> Update 5 min ago </li>
						</ul>
						
					</div>
				</div>
    		</div>
    	</div>
    </section><!-- /.date-close -->  

	<!-- notice-start -->
	 @php 
	 $headline = DB::table('posts')->where('headline','1')->limit(3)->get();
	 @endphp
    <section>
    	<div class="container-fluid">
			<div class="row scroll">
				<div class="col-md-2 col-sm-3 scroll_01 ">
					@if(session()->get('lang') == 'en')
					Breaking News :
					@else 
					Tin Nóng Hổi :
					@endif
				</div>
				<div class="col-md-10 col-sm-9 scroll_02">
					<marquee>
					@foreach($headline as $row)
						@if(session()->get('lang') == 'en')
						*{{$row->title_en}}
						@else 
						*{{$row->title_vi}}
						@endif
					@endforeach
					</marquee>
				</div>
			</div>
    	</div>
    </section> 
	<!-- notice-start -->
	@php 
	 $notice = DB::table('notices')->first();
	 @endphp
	 @if($notice->status == 1)
    <section>
    	<div class="container-fluid">
			<div class="row scroll">
				<div class="col-md-2 col-sm-3 scroll_01 " style="background-color:red;">
					@if(session()->get('lang') == 'en')
					Notice :
					@else 
					Lưu Ý :
					@endif
				</div>
				<div class="col-md-10 col-sm-9 scroll_02" style="background-color:blue;">
					<marquee>
					
						{{$notice->notice}}
					
					</marquee>
				</div>
			</div>
    	</div>
    </section>  
	@endif  

    @yield('content');
    @include('main.body.footer')

	
		<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('frontend/assets/js/main.js')}}"></script>
		<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
	</body>
</html> 