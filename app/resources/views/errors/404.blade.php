@extends('layouts.index')
@section('title')
404 Not Found
@endsection
@section('content')

<section id="page-title">

			<div class="container clearfix">
				<h1>Page Not Found</h1>
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li><a href="#">Pages</a></li>
					<li class="active">404</li>
				</ol>
			</div>

		</section><!-- #page-title end -->
<section id="content">

	<div class="content-wrap">

		<div class="container clearfix">
			<div class="postcontent nobottommargin">
				<div class="col_half nobottommargin">
						<div class="error404 center">404</div>
					</div>

					<div class="col_half nobottommargin col_last">

						<div class="heading-block nobottomborder">
							<h4>404 Not Found.! </h4>
							<span style="font-size:13px">Không tìm thấy dữ liệu. Vui lòng quay trở lại sau!</span>
						</div>

						

						<div class="col_one_third widget_links topmargin nobottommargin">
							<ul>
								<li><a href="http://ivtest.tk"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a></li>
								
								
							</ul>
						
						</div>

					</div>
			</div>
			<div class="sidebar nobottommargin col_last ">  
				@include("layouts.right")
				
			</div>

		</div>
	</div>
</section>		
@endsection