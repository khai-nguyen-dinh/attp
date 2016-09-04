@extends('layouts.index')
@section('title')
Tìm kiếm
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
		<h1>Tìm kiếm</h1>
        <span>Có {{$num}} kết quả cho <i> "{{$keyword}}"</i></span>
		<ol class="breadcrumb">
			<li><a href="{{ url(App::getLocale()) }}">{{ trans('a.trangchu') }}</a></li>
			<li class="active">{{ trans('a.nghiencuukhoahoc')}}</li>
		</ol>
	</div>

</section><!-- #page-title end -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">
            <div class="postcontent nobottommargin clearfix">
                
                
                <div id="posts" class="small-thumbs">
                    @forelse($search as $rows_search)
                    <?php
                    if($num>0){
                        switch ($rows_search->type) {
                        case 'tintuc':
                            $folder_img = $rows_search->img;
                            if($rows_search->category==1){                            
                                $link = url(App::getLocale()).'/tin-tuc/tin-trong-nuoc/'.$rows_search->slug;
                            }
                            else {$link = url(App::getLocale()).'/tin-tuc/tin-quoc-te/'.$rows_search->slug;}
                            // dd($data['link']);
                            break;
                        case 'khoahoc':
                            $folder_img = asset('public/upload/science').'/'.$rows_search->img;
                            $link = url(App::getLocale()).'/nghien-cuu-khoa-hoc/bai-viet/'.$rows_search->slug;
                            break;
                        case 'dichvu':
                            $data['cate_service'] = DB::table('tbl_category_service')->where([
                                                                            ['c_lang',App::getLocale()],
                                                                            ['pk_category_service_id',$rows_search->category]
                                                                            ])          
                                                                        ->first();
                             $folder_img = asset('public/upload/service').'/'.$rows_search->img;
                             $link = url(App::getLocale()).'/dich-vu-phan-tich'.'/'.$data['cate_service']->c_slug.'/'.$rows_search->slug;
                             break; 
                        case 'khac':
                            $data['cate_other'] = DB::table('tbl_category_other')->where([
                                                                            ['c_lang',App::getLocale()],
                                                                            ['pk_category_other_id',$rows_search->category]
                                                                            ])          
                                                                        ->first();
                             $folder_img = asset('public/upload/other').'/'.$rows_search->img;
                             $link['link'] = url(App::getLocale()).'/dich-vu-khac'.'/'.$data['cate_other']->c_slug.'/'.$rows_search->slug;
                            break;
                        case 'gioithieu':
                            $data['cate_about'] = DB::table('tbl_category_about')->where([
                                                                            ['c_lang',App::getLocale()],
                                                                            ['pk_category_about_id',$rows_search->category]
                                                                            ])          
                                                                        ->first();
                             $folder_img = asset('public/upload/about').'/'.$rows_search->img;
                             $link = url(App::getLocale()).'/gioi-thieu'.'/'.$data['cate_about']->c_slug.'/'.$rows_search->slug;
                            break;
                        default:
                            # code...
                            break;
                        }
                    }
                    ?>
                    <div class="entry clearfix">
                        <div class="entry-image">
                            <a href="{{$link or ''}}"><img class="image_fade" src="{{$folder_img or ''}}" alt="{{$rows_search->name or ''}}"></a>
                        </div>
                        <div class="entry-c">
                            <div class="entry-title color-h3">
                                <h4><a href="{{$link or ''}}">{{ $rows_search->name }}</a></h4>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> {{ $rows_search->day }}</li>
                            </ul>
                            <div class="entry-content">
                                <p>{{ $rows_search->description }}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h5>{{ trans('a.notfound')}}</h5>
                    @endforelse
                    <ul class="pager nomargin">
                    {!! $search->appends(['q'=>$keyword])->render() !!}
                        
                    </ul><!-- .pager end -->
                    
                </div>

            </div>
            <div class="sidebar nobottommargin col_last">  
            @include("layouts.right")
            
            </div> 
        </div>
        
        
    </div>
</section>  
@endsection