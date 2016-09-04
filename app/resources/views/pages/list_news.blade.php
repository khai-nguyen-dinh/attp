@extends('layouts.index')
@section('title')
{{ trans('a.nghiencuukhoahoc')}}
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

<section id="page-title">			
	<div class="container clearfix">
		<h1>{{ trans('a.nghiencuukhoahoc') }}</h1>
		<ol class="breadcrumb">
			<li><a href="{{ url(App::getLocale()) }}">{{ trans('a.trangchu') }}</a></li>
			<li class="active">{{ trans('a.nghiencuukhoahoc')}}</li>
		</ol>
	</div>

</section><!-- #page-title end -->
<section id="content">

	<div class="content-wrap">

		<div class="container clearfix">
		<?php if($list_science3!=null) $page=$list_science3->currentPage(); else $page=1; ?>
			@if($page<2)
			<div class="postcontent nobottommargin clearfix">
				<div id="posts" class="post-grid post-masonry clearfix">

					<div class="entry clearfix">
						@forelse($list_science2 as $rows_list_science2)
						<div class="entry-image img-list">
							<a href="{{ url(App::getLocale()) }}/nghien-cuu-khoa-hoc/bai-viet/{{ $rows_list_science2->c_slug }}"><img class="image_fade" src="{{asset('public/upload')}}/{{ $folder_img }}/{{ $rows_list_science2->c_img }}" alt="{{ $rows_list_science2->c_name }}"></a>
						</div>
						<div class="entry-title">
							<h5><a href="{{ url(App::getLocale()) }}/nghien-cuu-khoa-hoc/bai-viet/{{ $rows_list_science2->c_slug }}">{{ $rows_list_science2->c_name }}</a></h5>
						</div>
						@empty
						<h5>{{ trans('a.dulieucapnhat')}}</h5>
						@endforelse				
						
					</div>
					{{-- <div class="post-grid grid-2 clearfix"> --}}
					@if($list_science1!=null)
					<div class="entry clearfix" style="width: 60%;">
						<div class="entry-image">
							<a href="{{ url(App::getLocale()) }}/nghien-cuu-khoa-hoc/bai-viet/{{ $list_science1->c_slug }}"><img class="image_fade" src="{{asset('public/upload')}}/{{ $folder_img }}/{{ $list_science1->c_img }}" alt="{{ $list_science1->c_name }}"></a>
						</div>
						<div class="entry-title">
							<h4><a href="{{ url(App::getLocale()) }}/nghien-cuu-khoa-hoc/bai-viet/{{ $list_science1->c_slug }}">{{ $list_science1->c_name }}</a></h4>
						</div>
						<div class="entry-content">
							<p>{{ $list_science1->c_description }}</p>
						</div>
					</div>
					@else
					<h5>{{ trans('a.dulieucapnhat')}}</h5>
					@endif
					{{-- </div>				 --}}
				</div>
				@endif
				@if($page>=2)<div class="postcontent nobottommargin clearfix">@endif
				<div id="posts" class="small-thumbs">
					@if($list_science3!=null)
					@forelse($list_science3 as $rows_list_science3)
					<div class="entry clearfix">
						<div class="entry-image">
							<a href="{{url(App::getLocale())}}/nghien-cuu-khoa-hoc/bai-viet/{{ $rows_list_science3->c_slug }}"><img class="image_fade" src="{{asset('public/upload')}}/{{ $folder_img }}/{{ $rows_list_science3->c_img }}" alt="{{ $rows_list_science3->c_name }}"></a>
						</div>
						<div class="entry-c">
							<div class="entry-title color-h3">
								<h4><a href="{{url(App::getLocale())}}/nghien-cuu-khoa-hoc/bai-viet/{{ $rows_list_science3->c_slug }}">{{ $rows_list_science3->c_name }}</a></h4>
							</div>
							<ul class="entry-meta clearfix">
								<li><i class="icon-calendar3"></i> {{ $rows_list_science3->c_date }}</li>
							</ul>
							<div class="entry-content">
								<p>{{ $rows_list_science3->c_description }}</p>
							</div>
						</div>
					</div>
					@empty
					<h5>{{ trans('a.dulieucapnhat')}}</h5>
					@endforelse
					<ul class="pager nomargin">
					{{ $list_science3->render() }}
						
					</ul><!-- .pager end -->
					@endif
				</div>

				@if($page>=2)</div>@endif
				@if($page>=2)
					<div class="sidebar nobottommargin col_last">  
					@include("layouts.right")
					
					</div>	
				@endif
			</div>
			@if($page<2)
			<div class="sidebar nobottommargin col_last">  
				@include("layouts.right")
				
			</div>	
			@endif
			
			
		</div>
		
		
	</div>
</section>	
@endsection