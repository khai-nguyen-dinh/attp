@extends('layouts.index')
@section('title')
{{ trans('a.tintuc') }}
@endsection
@section('content')
<!-- Page Title
		============================================= -->
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
		<section id="page-title">			
			<div class="container clearfix">
				<h1>{{ trans('a.tintuc') }}</h1>
				<ol class="breadcrumb">
					<li><a href="{{ url(App::getLocale()) }}">{{ trans('a.trangchu') }}</a></li>
					<li class="active">{{ trans('a.tintuc')}}</li>
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
						<div id="posts" class="post-grid grid-3 clearfix">
						@foreach($cate_news as $rows_cate_news)	
						<?php
							if($rows_cate_news->c_category_news==1) $kind_news='tin-trong-nuoc'; else $kind_news = 'tin-quoc-te';
						?>

							<div class="entry ipost cate-news clearfix">
								<div class="entry-image">
									<a href="{{ url(App::getLocale()) }}/tin-tuc/{{$kind_news}}/{{ $rows_cate_news->c_slug }}"><img class="image_fade" src="{{ $rows_cate_news->c_img}}" alt="{{ $rows_cate_news->c_name }}"></a>
								</div>
								<div class="entry-title">
									<h3><a href="{{ url(App::getLocale()) }}/tin-tuc/{{$kind_news}}/{{ $rows_cate_news->c_slug }}">{{ $rows_cate_news->c_name }}</a></h3>
								</div>
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> {{ $rows_cate_news->c_date }}</li>
									
								</ul>
								<div class="entry-content">
									<p>{{ $rows_cate_news->c_description }}</p>
								</div>
							</div>

						@endforeach
						</div><!-- #posts end -->

						<!-- Pagination
						============================================= -->
						<ul class="pager nomargin">
						{{ $cate_news->render() }}
							
						</ul><!-- .pager end -->

					</div><!-- .postcontent end -->
					<div class="sidebar nobottommargin col_last">    

            		@include("layouts.right")
            
            		<div class="clear"></div>
		</section><!-- #content end -->
@endsection					
