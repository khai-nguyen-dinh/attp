@extends('layouts.index')
@section('title')
{{trans('a.lienhe')}}
@endsection

@section('script')
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
    <link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css"
    rel="stylesheet" type="text/css" />
@endsection
@section('content')
<section id="page-title">

	<div class="container clearfix">
		<h1>{{trans('a.lienhe')}}</h1>		
		<ol class="breadcrumb">
			<li><a href="{{url(App::getLocale())}}">Home</a></li>
			<li class="active">{{trans('a.lienhe')}}</li>
		</ol>
	</div>

</section><!-- #page-title end -->
<!-- Google Map
============================================= -->
<section id="google-map" class="gmap slider-parallax"></section>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyAdGIOp0EXdvY8dbWjZoABbGyPGxD4hwKY"></script>
<script type="text/javascript" src="{{asset('public')}}/js/jquery.gmap.js"></script>

<script type="text/javascript">

	$('#google-map').gMap({

		address: '18 Hoàng Quốc Việt, Nghĩa Đô, Cầu Giấy, Hà Nội, Việt Nam',
		maptype: 'ROADMAP',
		zoom: 14,
		markers: [
			{
				address: "18 Hoàng Quốc Việt, Nghĩa Đô, Cầu Giấy, Hà Nội, Việt Nam",
				html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;"><strong>Viện Hàn lâm Khoa học & Công nghệ Việt Nam</strong>.</p></div>',
				icon: {
					image: "{{asset('public')}}/images/icons/map-icon-red.png",
					iconsize: [32, 39],
					iconanchor: [13,39]
				}
			}
		],
		doubleclickzoom: true,
		controls: {
			panControl: true,
			zoomControl: true,
			mapTypeControl: true,
			scaleControl: false,
			streetViewControl: false,
			overviewMapControl: false
		}

	});

</script><!-- Google Map End -->
<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">

		<div class="container clearfix">

			<!-- Post Content
			============================================= -->
			<div class="postcontent nobottommargin clearfix">

				<!-- Posts
				============================================= -->
				

				<h3>{{trans('a.lienhe')}}</h3>

				<div id="contact-form-result"></div>

				<form class="nobottommargin" id="template-contactform" name="template-contactform">
				
					<div class="form-process"></div>

					<div class="col_one_third">
						<label for="template-contactform-name">{{trans('a.hoten')}} <small>*</small></label>
						<input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
					</div>
			        
					<div class="col_one_third">
						<label for="template-contactform-email">Email <small>*</small></label>
						<input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
					</div>
					<div class="clear"></div>
					<div class="col_two_third">
						<label for="template-contactform-subject">Tiêu đề <small>*</small></label>
						<input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control" />
					</div>
					<div class="clear"></div>

					<div class="col_full">
						<label for="template-contactform-message">{{trans('a.cauhoi')}} <small>*</small></label>
						<textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="20"></textarea>
					</div>
					
					<div class="g-recaptcha" data-sitekey="6LcrLScTAAAAACzBxprdYpn0LK5wM2DxzNvDWyq6"></div>
					<div class="erro-cap" style="color: #f30e38;"></div>
					<div class="col_full hidden">
						<input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
					</div>

					<div class="col_full">
						<button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Gửi</button>
					</div>
					<div id="dialog" style="display: none">
					</div>
				</form>

				
				<script type="text/javascript">

					$("#template-contactform").validate({

						submitHandler: function(form) {
							
							if (!grecaptcha.getResponse()){
					           // console.log("Google reCAPTCHA not complete");
					           $('.erro-cap').html("Vui lòng xác minh rằng bạn không phải robot.");
					            return;
					        }
							$.ajaxSetup({
						        headers: {
						            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						        }
						    });
						    $("#dialog").dialog({
						        autoOpen: false,
						        modal: true,
						        title: "Success",
						        buttons: {
						            Close: function () {
						                $(this).dialog('close');
						            }
						        }
						    });

						    $.ajax({
						    	'url' : 'lien-he',
						    	'data' :{
						    		'template-contactform-name' : $('#template-contactform-name').val(),
						    		'template-contactform-email' : $('#template-contactform-email').val(),
						    		'template-contactform-subject' : $('#template-contactform-subject').val(),
						    		'template-contactform-message' : $('#template-contactform-message').val(),
						    		'g-recaptcha-response' : $('#g-recaptcha-response').val()
						    	},
						    	'type' : 'POST',
						    	success: function(data){

						    		console.log(data);
						    		$('.form-process').fadeOut(300);
						    		$("#dialog").html("<i class=icon-ok-sign></i> Liên hệ của bạn đã được gửi đi! Xin cảm ơn!");
						    		$("#dialog").dialog("open");
						    		$(form).find('.sm-form-control').val('');

						    	}		
						    });
						
						}
					});

				</script>

			</div><!-- .postcontent end -->
			<!-- Sidebar
			============================================= -->
			<div class="sidebar col_last nobottommargin">

				<address>
					<strong>{{ trans('a.diachi') }}</strong><br>
					{{ $profile->c_address or '' }}<br>
				</address>
				<abbr title="Phone Number"><strong>{{trans('a.dienthoai')}}</strong></abbr> {{ $profile->c_phone or '' }}<br>
				<abbr title="Email Address"><strong>Email:</strong></abbr> {{ $profile->c_email or '' }}

				<div class="widget noborder notoppadding">

					<div class="fslider customjs testimonial twitter-scroll twitter-feed" data-username="envato" data-count="3" data-animation="slide" data-arrows="false">
						<i class="i-plain i-small color icon-twitter nobottommargin" style="margin-right: 15px;"></i>
						<div class="flexslider" style="width: auto;">
							<div class="slider-wrap">
								<div class="slide"></div>
							</div>
						</div>
					</div>

				</div>

				<div class="widget noborder notoppadding">

					<a href="{{ $profile->c_facebook or '' }}" target="_blank" rel="nofollow" class="social-icon si-small si-dark si-facebook">
						<i class="icon-facebook"></i>
						<i class="icon-facebook"></i>
					</a>

					<a href="#" class="social-icon si-small si-dark si-twitter">
						<i class="icon-twitter"></i>
						<i class="icon-twitter"></i>
					</a>

					<a href="#" class="social-icon si-small si-dark si-dribbble">
						<i class="icon-dribbble"></i>
						<i class="icon-dribbble"></i>
					</a>

					<a href="#" class="social-icon si-small si-dark si-forrst">
						<i class="icon-forrst"></i>
						<i class="icon-forrst"></i>
					</a>

					<a href="#" class="social-icon si-small si-dark si-pinterest">
						<i class="icon-pinterest"></i>
						<i class="icon-pinterest"></i>
					</a>

					<a href="#" class="social-icon si-small si-dark si-gplus">
						<i class="icon-gplus"></i>
						<i class="icon-gplus"></i>
					</a>

				</div>

			</div><!-- .sidebar end -->
			
		</div>
	</div>
</section>		
@endsection
@section('script-sub')
<script type="text/javascript">
	$(function(){
		$('#template-contactform').submit(function(event){
			
		});
	});
</script>
@endsection