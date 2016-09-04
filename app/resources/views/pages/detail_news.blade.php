@extends('layouts.index')
@section('title')
{{$title}}
@endsection
@section('content')
<div class="hot-news">
    <div class="container clearfix">
        <span class="label label-danger bnews-title">{{ trans('a.tinmoi') }}</span>

        <div class="fslider bnews-slider nobottommargin hot-news-slide" style="width: 970px" data-speed="800" data-pause="6000" data-arrows="false" data-pagi="false">
            <div class="flexslider">
                <div class="slider-wrap">
                    <div class="slide"><a href="{{ url('') }}/{{ App::getLocale() }}/tin-tuc/<?php  if(isset($cate_hot_news1)) echo $cate_hot_news1; ?>/<?php if(isset($hot_news1)) echo $hot_news1->c_slug; ?>"><strong><?php if(isset($hot_news1->c_name)) echo $hot_news1->c_name;  ?></strong></a></div>
                    <div class="slide"><a href="{{ url('') }}/{{ App::getLocale() }}/nghien-cuu-khoa-hoc/bai-viet/<?php if(isset($hot_news2->c_slug)) echo $hot_news2->c_slug ?>"><strong><?php if(isset($hot_news2->c_name)) echo $hot_news2->c_name; ?></strong></a></div>
                    <div class="slide"><a href="{{ url('') }}/{{ App::getLocale() }}/dich-vu-phan-tich/<?php if(isset($cate_hot_news3->c_slug)) echo $cate_hot_news3->c_slug; ?>/<?php if(isset($hot_news3->c_slug)) echo $hot_news3->c_slug; ?>"><strong><?php if(isset($hot_news3->c_name)) echo $hot_news3->c_name; ?></strong></a></div>
                    <div class="slide"><a href="{{ url('') }}/{{ App::getLocale() }}/dich-vu-khac/<?php if(isset($cate_hot_news4->c_slug)) echo $cate_hot_news4->c_slug; ?>/<?php if(isset($hot_news4->c_slug)) echo $hot_news4->c_slug; ?>"><strong><?php if(isset($hot_news4->c_name)) echo $hot_news4->c_name; ?></strong></a></div>
                    <div class="slide"><a href="{{ url('') }}/{{ App::getLocale() }}/gioi-thieu/<?php if(isset($cate_hot_news5->c_slug)) echo $cate_hot_news5->c_slug; ?>/<?php if(isset($hot_news5->c_slug)) echo $hot_news5->c_slug; ?>"><strong><?php if(isset($hot_news5->c_name)) echo $hot_news5->c_name; ?></strong></a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="page-title" class="page-title-mini">			
	<div class="container clearfix">
		<h1>{{ $title }}</h1>
		{{-- <ol class="breadcrumb">
			<li><a href="{{ url(App::getLocale()) }}">{{ trans('a.trangchu') }}</a></li>
			<li class="active">{{ $title }}</li>
		</ol> --}}
	</div>

</section><!-- #page-title end -->
<section id="content">

	<div class="content-wrap">
		
		<div class="container clearfix">
			<div class="date-view">{{trans('a.ngaydang')}}: <strong>{{$detail->c_date}}</strong> - {{trans('a.luotxem')}}: <strong>{{$detail->c_view}}</strong></div>
			<div class="box-fb">
				<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>

			</div>
			<div class="postcontent nobottommargin des">

				<div style="padding-right:5px; ">
					{!!$detail->c_content!!}
						
				</div>
				<div class="clear"></div>
			
				<div class="box-comment-fb">
					<div class="fancy-title title-border res-video">
                        
                        <h4>Bình luận</h4>
                    </div>
                    <div class="fb-comments" data-href="{{URL::full()}}" data-numposts="10"></div>
				</div>
				

				<span class="news-other"><h4>{{ trans('a.tinkhac')}}</h4></span>

				<div class="related-posts clearfix">

					
					<div class="col_half nobottommargin">
					@foreach($relate as $rows_relate)
						<div class="mpost clearfix">
							<div class="entry-image">
								<a href="{{$link}}/{{$rows_relate->c_slug}}"><img src="{{isset($folder_img)?$folder_img.'/'.$rows_relate->c_img:$rows_relate->c_img}}" alt="{{$rows_relate->c_name}}"></a>
							</div>
							<div class="entry-c">
								<div class="entry-title relate-news">
									<h5><a href="{{$link}}/{{$rows_relate->c_slug}}">{{$rows_relate->c_name}}</a></h5>
								</div>
								
							</div>
						</div>
					@endforeach
						
					</div>
					<div class="col_half nobottommargin col_last">
					@foreach($relate2 as $rows_relate)
						<div class="mpost clearfix">
							<div class="entry-image">
								<a href="{{$link}}/{{$rows_relate->c_slug}}"><img src="{{isset($folder_img)?$folder_img.'/'.$rows_relate->c_img:$rows_relate->c_img}}" alt="{{$rows_relate->c_name}}"></a>
							</div>
							<div class="entry-c">
								<div class="entry-title relate-news">
									<h5><a href="{{$link}}/{{$rows_relate->c_slug}}">{{$rows_relate->c_name}}</a></h5>
								</div>
								
							</div>
						</div>
					@endforeach
						
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