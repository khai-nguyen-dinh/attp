@extends('layouts.index')
@section('title')
{{ trans('a.vanban')}}
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
		<h1>{{ trans('a.vanban') }}</h1>
		<ol class="breadcrumb">
			<li><a href="{{ url(App::getLocale()) }}">{{ trans('a.trangchu') }}</a></li>
			<li class="active">{{ trans('a.vanban')}}</li>
		</ol>
	</div>

</section><!-- #page-title end -->
<section id="content">

	<div class="content-wrap">

		<div class="container clearfix">

			<!-- Post Content
			============================================= -->
			<div class="postcontent nobottommargin clearfix">
				<table class="table table-hover table-striped">
				    <thead>
						<tr>
						    <th>Số/ Ký hiệu</th>
						    <th width="18%">Cơ quan ban hành</th>
						    <th width="15%">Ngày ban hành</th>
						    <th>Trích yếu</th>
					    </tr>
					</thead>
					<tbody>
						{{-- @if($document!=null) --}}
						@forelse($document as $rows_document)
						<tr>
							<td>{{ $rows_document->c_code }}</td>
							<td>{{ $rows_document->c_company }}</td>
							<td>{{ $rows_document->c_date }}</td>
							<td><a style="color: #3c986a" href="{{ $rows_document->c_file }}"> {{ $rows_document->c_name }}</a></td>
						</tr>
						{{-- @endforeach --}}
						
						@empty 
						<tr>
							<td colspan='4' style="text-align: center">{{ trans('a.dulieucapnhat') }}</td>
						</tr>
						@endforelse
					</tbody>
				</table>
				<ul class="pager nomargin">
				{{ $document->render() }}
					{{-- <li class="previous"><a href="#">&larr; Older</a></li>
					<li class="next"><a href="#">Newer &rarr;</a></li> --}}
				</ul><!-- .pager end -->
			</div>
			
			<div class="sidebar nobottommargin col_last">    

			@include("layouts.right")
			</div>

			<div class="clear"></div>
		</div>

	</div>

</section>				
@endsection