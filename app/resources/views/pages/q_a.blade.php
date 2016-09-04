@extends('layouts.index')
@section('title')
{{trans('a.hoidap')}}
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
		<h1>{{trans('a.hoidap')}}</h1>		
		<ol class="breadcrumb">
			<li><a href="{{url(App::getLocale())}}">Home</a></li>
			<li class="active">{{trans('a.hoidap')}}</li>
		</ol>
	</div>

</section><!-- #page-title end -->

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
				<div id="posts" class="post-timeline clearfix">

					<div class="timeline-border"></div>
					@if($qa!=null)
					<?php $s=0;?>
					@foreach($qa as $rows_qa)
					<?php $s++; ?>
					<div class="entry clearfix">
						<div class="entry-timeline">
							@if($s%2)
							<i class="fa fa-envelope" aria-hidden="true"></i>
							@else
							<i class="fa fa-envira" aria-hidden="true"></i>
							@endif
							<div class="timeline-divider"></div>
						</div>
						<div class="entry-image">
							<blockquote>
								<header><strong>{{$rows_qa->c_name}}</strong> {{trans('a.hoi')}}</header>
								<p>"{{$rows_qa->c_question}}"</p>								
							</blockquote>
						</div>
						<div class="entry-image">
							<div class="panel panel-default">								
								<div class="panel-body">
									{!! $rows_qa->c_answer !!}
								</div>
							</div>
						</div>
					</div>
					@endforeach
					@endif
					{{$qa->render()}}	

				</div><!-- #posts end -->

				<h3>{{trans('a.guicauhoi')}}</h3>

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
						    	'url' : 'hoi-dap',
						    	'data' :{
						    		'template-contactform-name' : $('#template-contactform-name').val(),
						    		'template-contactform-email' : $('#template-contactform-email').val(),
						    		'template-contactform-message' : $('#template-contactform-message').val(),
						    		'g-recaptcha-response' : $('#g-recaptcha-response').val()
						    	},
						    	'type' : 'POST',
						    	success: function(data){
						    		console.log(data);
						    		$('.form-process').fadeOut(300);
						    		$("#dialog").html("<i class=icon-ok-sign></i> Câu hỏi của bạn đã được gửi đi! Xin cảm ơn!");
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
			<div class="sidebar nobottommargin col_last">    

    		@include("layouts.right")
    
    		<div class="clear"></div>
			
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