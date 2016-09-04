@extends("layouts.index")
@section('title')
TRUNG TÂM TƯ VẤN, ĐÀO TẠO VÀ CHUYỂN GIAO CÔNG NGHỆ - VIỆN HÀN LÂM KHOA HỌC VÀ CÔNG NGHỆ VIỆT NAM
@endsection
@section('content')
<section id="content">

    <div class="content-wrap">

        <div class="section header-stick bottommargin-lg clearfix" style="padding: 20px 0;">
            <div>
                <div class="container clearfix">
                    <span class="label label-danger bnews-title hot-news-title">{{ trans('a.tinmoi') }}</span>

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
        </div>

        <div id="oc-images" class="owl-carousel owl-carousel-full news-carousel header-stick bottommargin-lg">          
             @foreach($hot as $rows_hot)
             <?php if($rows_hot->c_category_news==1) $kind='tin-trong-nuoc'; else $kind='tin-quoc-te'; ?>
            <div class="oc-item">
                <a href="{{ url('') }}/{{ App::getLocale() }}/tin-tuc/{{$kind}}/{{ $rows_hot->c_slug }}"><img src="{{ $rows_hot->c_img }}" alt="{{ $rows_hot->c_name }}"></a>
                <div class="overlay">
                    <div class="text-overlay">
                        <span class="label label-danger">Nóng</span>
                        <div class="text-overlay-title">
                            <a href="{{ url('') }}/{{ App::getLocale() }}/tin-tuc/{{$kind}}/{{ $rows_hot->c_slug }}"><h2 style="font-size:16px">{!! $rows_hot->c_name !!} </h2></a>
                        </div>
                        <div class="text-overlay-meta">
                            <span><i class="icon-clock"></i> {{ $rows_hot->c_date }} </span>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            @endforeach                    
        </div>

        <script type="text/javascript">

            jQuery(document).ready(function($) {

                var ocImages = $("#oc-images");

                ocImages.owlCarousel({
                    margin: 3,
                    stagePadding: 50,
                    loop: true,
                    nav: true,
                    navText: ['<i class="icon-angle-left"></i>','<i class="icon-angle-right"></i>'],
                    dots: false,
                    responsive:{
                        0:{ items:1 },
                        500:{ items:2 },
                        1050:{ items:3 },
                    }
                });

            });

        </script>

        <div class="clear"></div>

        <div class="container clearfix">

            <div class="postcontent nobottommargin">

                <div class="tabs bottommargin-lg clearfix" id="tab-news">

                    <ul class="tab-nav clearfix">
                        <li><a href="#tabs-news-1"> <i class="icon-bookmark"></i><span class="hidden-xs"> {{ trans('a.tintrongnuoc') }}</span></a></li>
                        <li><a href="#tabs-news-2"> <i class="icon-globe"></i><span class="hidden-xs"> {{ trans('a.tinquocte') }}</span></a></li>
                        
                    </ul>

                    <div class="tab-container">

                        <div class="tab-content clearfix" id="tabs-news-1">

                            <div class="col_three_fifth nobottommargin">
                            @if($in_news1!=null)
                                <div class="ipost clearfix">
                                    <div class="entry-image">
                                        <a href="{{ url('') }}/{{ App::getLocale() }}/tin-tuc/tin-trong-nuoc/{{ $in_news1->c_slug }}">
                                        @if($in_news1->c_img!='')
                                        <img class="image_fade" src="{{ $in_news1->c_img }}" alt="{{ $in_news1->c_name }}">
                                        @else
                                        <img class="image_fade" src="{{asset('public/images/magazine/news')}}/4.jpg" alt="{{ $in_news1->c_name }}">
                                        @endif    
                                        </a>
                                    </div>
                                    <div class="entry-title">
                                        <h3><a href="{{ url('') }}/{{ App::getLocale() }}/tin-tuc/tin-trong-nuoc/{{ $in_news1->c_slug }}">{!! $in_news1->c_name !!}</a></h3>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> {{ $in_news1->c_date }}</li>
                                        <li><i class="icon-eye-open"></i> {{ $in_news1->c_view }} lượt xem</li>
                                    </ul>
                                    <div class="entry-content">
                                        <p>{!! $in_news1->c_description !!}</p>
                                    </div>
                                </div>
                               @else
                               <h5>{{ trans('a.dulieucapnhat')}}</h5>
                               @endif 
                            </div>


                            <div class="col_two_fifth col_last nobottommargin">
                                @if($in_news2!=null)
                                @foreach($in_news2 as $rows_in_news2)
                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="{{ url('') }}/{{ App::getLocale() }}/tin-tuc/tin-trong-nuoc/{{ $rows_in_news2->c_slug }}">{!! $rows_in_news2->c_name !!}</a></h4>
                                            <ul class="entry-meta clearfix">
                                                <li><i class="icon-calendar3"></i> {{ $rows_in_news2->c_date }}</li>
                                                <li><i class="icon-eye-open"></i> {{ $rows_in_news2->c_view }} lượt xem</li></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h5><a class="read-more" href="{{ url(App::getLocale()) }}/tin-tuc/tin-trong-nuoc">{{trans('a.xemthem')}}<i class="icon-chevron-right"></i></a></h5> 
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>

                        </div>
                        <div class="tab-content clearfix" id="tabs-news-2">

                            <div class="col_three_fifth nobottommargin">
                                @if($out_news1!=null)
                                <div class="ipost clearfix">
                                    <div class="entry-image">
                                        <a href="{{ url('') }}/{{ App::getLocale() }}/tin-tuc/tin-quoc-te/{{ $out_news1->c_slug }}">
                                        @if($out_news1->c_img!='')
                                        <img class="image_fade" src="{{ $out_news1->c_img }}" alt="{{ $out_news1->c_name }}">
                                        @else
                                        <img class="image_fade" src="{{asset('public/images/magazine/news')}}/4.jpg" alt="{{ $out_news1->c_name }}">
                                        @endif    
                                        </a>
                                    </div>
                                    <div class="entry-title">
                                        <h3><a href="{{ url('') }}/{{ App::getLocale() }}/tin-tuc/tin-quoc-te/{{ $out_news1->c_slug }}">{!! $out_news1->c_name !!}</a></h3>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> {{ $out_news1->c_date }}</li>
                                        <li><i class="icon-eye-open"></i> {{ $out_news1->c_view }} Views</li>
                                    </ul>
                                    <div class="entry-content">
                                        <p>{!! $out_news1->c_description !!}</p>
                                    </div>
                                </div>
                                @else
                               <h5>{{ trans('a.dulieucapnhat')}}</h5>
                               @endif 
                            </div>
    
                            <div class="col_two_fifth col_last nobottommargin">
                                @if($out_news2!=null)
                                @foreach($out_news2 as $rows_out_news2)

                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="{{ url('') }}/{{ App::getLocale() }}/tin-tuc/tin-quoc-te/{{ $rows_out_news2->c_slug }}">{!! $rows_out_news2->c_name !!}</a></h4>
                                            <ul class="entry-meta clearfix">
                                                <li><i class="icon-calendar3"></i> {{ $rows_out_news2->c_date }}</li>
                                                <li><i class="icon-eye-open"></i> {{ $rows_out_news2->c_view }} lượt xem</li></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                   @endforeach 
                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h5><a class="read-more" href="{{ url(App::getLocale()) }}/tin-tuc/tin-quoc-te">{{trans('a.xemthem')}}<i class="icon-chevron-right"></i></a></h5> 
                                        </div>
                                    </div>
                                </div>
                                   @endif 
                            </div>

                        </div>
                        
                    </div>

                </div>
            




                <div class="col_full bottommargin-lg clearfix">

                    <div class="fancy-title title-border title-tab res-title">
                        <img style="width: 6%; margin-top: -75px; margin-right: 2%;" src="{{url('public/images/icons/title')}}/icon-nghien-cuu-khoa-hoc.jpeg">
                        <h3><a style="color: #1d2129" href="{{ url(App::getLocale()) }}/nghien-cuu-khoa-hoc"><span>{{ trans('a.nghiencuukhoahoc') }}</span></a></h3>
                    </div>
                    @if($science!=null) 
                    <?php $s=0; ?>
                    @forelse($science as $rows_science)
                    <?php $s++; ?>
                    <div class="col_one_third <?php if($s==3) echo 'col_last'?>">
                        <div class="ipost clearfix">
                            <div class="entry-image">
                                <a href="{{ url(App::getLocale()) }}/nghien-cuu-khoa-hoc/bai-viet/{{ $rows_science->c_slug }}"><img class="image_fade" src="{{ asset('public/upload/science') }}/{{ $rows_science->c_img }}" alt="{{ $rows_science->c_name }}"></a>
                            </div>
                            <div class="entry-title">
                                <h3><a href="{{ url(App::getLocale()) }}/nghien-cuu-khoa-hoc/bai-viet/{{ $rows_science->c_slug }}">{!! $rows_science->c_name !!}</a></h3>
                            </div>
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i> {{ $rows_science->c_date }}</li>
                                <li><i class="icon-eye-open"></i> {{ $rows_science->c_view }}</li>
                            </ul>
                            <div class="entry-content">
                                <p style="font-size:12px">{!! $rows_science->c_description !!}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <h5>{{ trans('a.dulieucapnhat')}}</h5>
                    @endforelse
                    @endif

                    <div class="clear"></div>

                </div>
            
        
                <div class="fancy-title title-border title-tab res-title">
                    <img style="width: 6%; margin-top: -75px; margin-right: 2%;" src="{{url('public/images/icons/title')}}/icon-dich-vu-phan-tich.jpeg">
                    <h3>{{ trans('a.dichvuphantich') }}</h3>
                </div>
                <div class="tabs bottommargin-lg clearfix" id="tab-news">
                @if($cate_service!=null)
                    <ul class="tab-nav clearfix">
                        
                        
                        @foreach($cate_service as $rows_cate_service)                                

                        <li><a href="#tabs-news-{{ $rows_cate_service->pk_category_service_id }}">{!! $rows_cate_service->c_icon !!} <span class="hidden-xs">{!! $rows_cate_service->c_name !!}</span></a></li>

                        @endforeach
                        

                        
                    </ul>
                    
                    <div class="tab-container">
                        @forelse($cate_service as $rows_cate_service)
                        <div class="tab-content clearfix" id="tabs-news-{{ $rows_cate_service->pk_category_service_id }}">
                            <?php $service1 = DB::table('tbl_service')->where([                                                         
                                                ['c_lang',App::getLocale()],
                                                ['fk_category_service_id',$rows_cate_service->pk_category_service_id]
                                            ])
                                            ->orderBy('pk_service_id','desc')->first(); ?>
                            @if($service1!=null)                                    
                            <div class="col_three_fifth nobottommargin">
                                <div class="ipost clearfix">
                                    <div class="entry-image">
                                        <a href="{{ url(App::getLocale()) }}/dich-vu-phan-tich/{{ $rows_cate_service->c_slug }}/{{ $service1->c_slug }}"><img class="image_fade" src="{{ asset('public/upload/service') }}/{{ $service1->c_img }}" alt="{{ $service1->c_name }}"></a>
                                    </div>
                                    <div class="entry-title">
                                        <h3><a href="{{ url(App::getLocale()) }}/dich-vu-phan-tich/{{ $rows_cate_service->c_slug }}/{{ $service1->c_slug }}">{!! $service1->c_name !!}</a></h3>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i>{{ $service1->c_date }}</li>
                                        {{-- <li><i class="icon-eye-open"></i> {{ $service1->c_view }} lượt xem</li> --}}
                                    </ul>
                                    <div class="entry-content">
                                        <p>{!! $service1->c_description !!}</p>
                                    </div>
                                </div>
                            </div>
                            @else
                            <h5>{{ trans('a.dulieucapnhat')}}</h5>
                            @endif
                            <?php $service2 = DB::table('tbl_service')->where([                                                         
                                                ['c_lang',App::getLocale()],
                                                ['fk_category_service_id',$rows_cate_service->pk_category_service_id]
                                            ])
                                            ->orderBy('pk_service_id','desc')->skip(1)->take(4)->get(); ?>
                            @if($service2!=null)
                            <div class="col_two_fifth col_last nobottommargin">

                            @forelse($service2 as $rows_service2)
                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="{{ url(App::getLocale()) }}/dich-vu-phan-tich/{{ $rows_cate_service->c_slug }}/{{ $rows_service2->c_slug }}">{!! $rows_service2->c_name !!}</a></h4>
                                            <ul class="entry-meta clearfix">
                                                <li><i class="icon-calendar3"></i> {{ $rows_service2->c_date }}</li>
                                                {{-- <li><i class="icon-eye-open"></i> {{ $rows_service2->c_view }} lượt xem</li></li> --}}
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            <h5>{{ trans('a.dulieucapnhat')}}</h5>
                            @endforelse
                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h5><a class="read-more" href="{{ url(App::getLocale()) }}/dich-vu-phan-tich/{{ $rows_cate_service->c_slug }}">Xem thêm<i class="icon-chevron-right"></i></a></h5> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        @empty
                        <h5>{{ trans('a.dulieucapnhat')}}</h5>
                        @endforelse
                    </div>
                    
                @else
                    <h5>{{ trans('a.dulieucapnhat')}}</h5>
               @endif 
                </div>

                <div class="clear"></div>

                <div class="bottommargin-lg">
                    <img src="{{ asset('public/images/magazine') }}/vi-suc-khoe-cong-dong-2.jpeg" alt="Vì sức khỏe cộng đồng" class="aligncenter notopmargin nobottommargin">
                </div>

                <div class="col_full bottommargin-lg clearfix">

                    <div class="fancy-title title-border title-tab res-title">
                        <img style="width: 6%; margin-top: -75px; margin-right: 2%;" src="{{url('public/images/icons/title')}}/icon-dich-vu-khac.jpeg">
                        <h3>{{ trans('a.dichvukhac')}}</h3>
                    </div>

                    <div class="tabs bottommargin-lg clearfix" id="tab-news">
                    @if($cate_other!=null)
                        <ul class="tab-nav clearfix">
                            @foreach($cate_other as $rows_cate_other)
                            <li><a href="#tabs-news-{{ $rows_cate_other->pk_category_other_id }}">{!! $rows_cate_other->c_icon!!} <span class="hidden-xs"> {!! $rows_cate_other->c_name !!}</span></a></li>
                            @endforeach
                            
                        </ul>

                        <div class="tab-container">
                            @foreach($cate_other as $rows_cate_other)
                            <div class="tab-content clearfix" id="tabs-news-{{ $rows_cate_other->pk_category_other_id }}">
                                <?php $other1 = DB::table('tbl_other')->where([                                                         
                                                ['c_lang',App::getLocale()],
                                                ['fk_category_other_id',$rows_cate_other->pk_category_other_id]
                                            ])
                                            ->orderBy('pk_other_id','desc')->first(); ?>
                                @if($other1!=null)

                                <div class="col_three_fifth nobottommargin">
                                    <div class="ipost clearfix">
                                        <div class="entry-image">
                                            <a href="{{ url(App::getLocale()) }}/dich-vu-khac/{{ $rows_cate_other->c_slug }}/{{ $other1->c_slug }}"><img class="image_fade" src="{{ asset('public/upload/other') }}/{{ $other1->c_img }}" alt="{{ $other1->c_name }}"></a>
                                        </div>
                                        <div class="entry-title">
                                            <h3><a href="{{ url(App::getLocale()) }}/dich-vu-khac/{{ $rows_cate_other->c_slug }}/{{ $other1->c_slug }}">{!! $other1->c_name !!}</a></h3>
                                        </div>
                                        <ul class="entry-meta clearfix">
                                            <li><i class="icon-calendar3"></i> {{ $other1->c_date }}</li>                   
                                            {{-- <li><i class="icon-eye-open"></i> 6422 Views</li> --}}
                                        </ul>
                                        <div class="entry-content">
                                            <p>{!! $other1->c_description !!}</p>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <h5>{{ trans('a.dulieucapnhat')}}</h5>
                                @endif
                                <?php $other2 = DB::table('tbl_other')->where([                                                         
                                                ['c_lang',App::getLocale()],
                                                ['fk_category_other_id',$rows_cate_other->pk_category_other_id]
                                            ])
                                            ->orderBy('pk_other_id','desc')->skip(1)->take(4)->get(); ?>
                                @if($other2!=null)
                                <div class="col_two_fifth col_last nobottommargin">
                                    @forelse($other2 as $rows_other2)

                                    <div class="spost clearfix">
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="{{ url(App::getLocale()) }}/dich-vu-khac/{{ $rows_cate_other->c_slug }}/{{ $rows_other2->c_slug }}">{!! $rows_other2->c_name !!}</a></h4>
                                                <ul class="entry-meta clearfix">
                                                    <li><i class="icon-calendar3"></i> {{ $rows_other2->c_date }}</li>
                                                                                                                
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <h5>{{ trans('a.dulieucapnhat')}}</h5>
                                    @endforelse
                                    <div class="spost clearfix">
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h5><a class="read-more" href="{{ url(App::getLocale()) }}/dich-vu-khac/{{ $rows_cate_other->c_slug }}">Xem thêm<i class="icon-chevron-right"></i></a></h5> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                            </div>
                            @endforeach
                        </div>                                                                    
                    @else
                   <h5>{{ trans('a.dulieucapnhat')}}</h5>
                   @endif 
                    </div>

                    <div class="fancy-title title-border topmargin title-tab res-title" >
                        <img style="width: 6%; margin-top: -75px; margin-right: 2%;" src="{{url('public/images/icons/title')}}/icon-vien-han-lam.png">
                        <h3><i ></i>{{ trans('a.vien') }}</h3>
                    </div>
                    <div class="tabs bottommargin-lg clearfix vien-tab" id="tab-news">
                        @if($cate_about!=null)
                        <ul class="tab-nav clearfix">
                        @foreach($cate_about as $rows_cate_about)
                            
                            <li><a href="#tabs-news-{{ $rows_cate_about->pk_category_about_id }}">{!! $rows_cate_about->c_icon !!}<span class="hidden-xs"> {{ $rows_cate_about->c_name }}</span></a></li>
                            
                        @endforeach
                        </ul>

                        <div class="tab-container">
                        @foreach($cate_about as $rows_cate_about)
                            <div class="tab-content clearfix" id="tabs-news-{{ $rows_cate_about->pk_category_about_id }}">
                            <?php $about1 = DB::table('tbl_about')->where([                                                         
                                                    ['c_lang',App::getLocale()],
                                                    ['fk_category_about_id',$rows_cate_about->pk_category_about_id]
                                                ])
                                                ->orderBy('pk_about_id','desc')->first(); ?>
                            @if($about1!=null)
                                <div class="col_three_fifth nobottommargin">
                                    <div class="ipost clearfix">
                                        <div class="entry-image">
                                            <a href="{{ url(App::getLocale()) }}/gioi-thieu/{{ $rows_cate_about->c_slug }}/{{ $about1->c_slug }}"><img class="image_fade" src="{{ asset('public/upload/about') }}/{{ $about1->c_img }}" alt="{{ $about1->c_name }}"></a>
                                        </div>
                                        <div class="entry-title">
                                            <h3><a href="{{ url(App::getLocale()) }}/gioi-thieu/{{ $rows_cate_about->c_slug }}/{{ $about1->c_slug }}">{!! $about1->c_name !!}</a></h3>
                                        </div>
                                        <ul class="entry-meta clearfix">
                                            <li><i class="icon-calendar3"></i> {{ $about1->c_date }}</li>
                                            {{-- <li><i class="icon-eye-open"></i> 6422 Views</li> --}}
                                        </ul>
                                        <div class="entry-content">
                                            <p>{!! $about1->c_description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <h5>{{ trans('a.dulieucapnhat')}}</h5>
                            @endif 
                            <?php $about2 = DB::table('tbl_about')->where([                                                         
                                                    ['c_lang',App::getLocale()],
                                                    ['fk_category_about_id',$rows_cate_about->pk_category_about_id]
                                                ])
                                                ->orderBy('pk_about_id','desc')->skip(1)->take(4)->get(); ?>
                            @if($about2!=null)   
                                <div class="col_two_fifth col_last nobottommargin">
                                @forelse($about2 as $rows_about2)
                                    <div class="spost clearfix">
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="{{ url(App::getLocale()) }}/gioi-thieu/{{ $rows_cate_about->c_slug }}/{{ $rows_about2->c_slug }}">{!! $rows_about2->c_name !!}</a></h4>
                                                <ul class="entry-meta clearfix">
                                                    <li><i class="icon-calendar3"></i> {{ $rows_about2->c_date }}</li>                 
                                                </ul>
                                            </div>
                                        </div>
                                    </div>                                 
                                @empty
                                <h5>{{ trans('a.dulieucapnhat')}}</h5>
                                @endforelse
                                    <div class="spost clearfix">
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h5><a class="read-more" href="{{ url(App::getLocale()) }}/gioi-thieu/{{ $rows_cate_about->c_slug }}">Xem thêm<i class="icon-chevron-right"></i></a></h5> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           @endif 
                            </div>
                        @endforeach       

                        </div>

                    @else
                    <h5>{{ trans('a.dulieucapnhat')}}</h5>
                    @endif 
                    </div>

                </div>

                    <div class="clear"></div>

            </div>

            <div class="sidebar nobottommargin col_last">    

                @include("layouts.right")
                
            
        

            <div class="clear"></div>


            


            <div class="fancy-title title-border topmargin res-video">
                
                <h3><img style="width: 16%;margin-bottom: 13px;" src="{{url('public/images/icons/title')}}/icon-thong-diep.png">{{ trans('a.video') }}</h3>
            </div>

            <div id="occ-images" class="owl-carousel image-carousel">

                @forelse($video as $rows_video)
                <div class="oc-item">
                    <div class="ipost clearfix">
                        <div class="entry-image">
                            <iframe src="https://player.vimeo.com/video/{{ $rows_video->c_code }}" width="400" height="230" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        </div>
                        <div class="entry-title">
                            <h4><a {{-- href="#{{ url(App::getLocale()) }}/video/{{ $rows_video->c_slug }}" --}}> {{ $rows_video->c_name }}</a></h4>
                        </div>
                        <ul class="entry-meta clearfix">
                            <li><i class="icon-calendar3"></i> {{ $rows_video->c_date }}</li>
                            {{-- <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 12</a></li> --}}
                        </ul>
                    </div>
                </div>
                @empty
                <h5>{{ trans('a.dulieucapnhat')}}</h5>                                
                @endforelse
            </div>

            <script type="text/javascript">

                jQuery(document).ready(function($) {

                    var ocImages = $("#occ-images");

                    ocImages.owlCarousel({
                        margin: 30,
                        nav: false,
                        autoplayHoverPause: true,
                        dots: true,
                        responsive:{
                            0:{ items:1 },
                            480:{ items:2 },
                            768:{ items:3 },
                            992:{ items:4 }
                        }
                    });

                });

            </script>


            <div class="col_full bottommargin-lg clearfix">

                    
                    <br>
                    <br>
                    <br>
                    <div class="clear"></div>
                    <div class="clear"></div>

            </div>

            <div class="section header-stick bottommargin-lg clearfix" style="padding: 20px 0;">
                <div>
                    <div class="container clearfix">
                        <div class="fancy-title title-border res-video">
                            
                            <h3><img style="width: 10%; margin-right: 2%;" src="{{url('public/images/icons/title')}}/icon-van-ban-phap-luat.png">{{ trans('a.vanban') }}</h3>
                        </div>
                        <div class="fslider bnews-slider nobottommargin" data-speed="800" data-pause="6000" data-arrows="false" data-pagi="false" >
                            <div class="flexslider">
                                <div class="slider-wrap" >
                                    <div class="slide ">
                                        
                                        @forelse($document as $rows_document)

                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <div class="ipost clearfix">
                                                
                                                <div class="entry-title">
                                                    <h3><a href="{{ $rows_document->c_file }}" style="font-size:13px">{{ $rows_document->c_name }}</a></h3>
                                                </div>
                                                <ul class="entry-meta clearfix">
                                                    <li><i class="icon-calendar3"></i> {{ $rows_document->c_date }}</li>
                                                    <li><a><i class="fa fa-signal" aria-hidden="true"></i> {{ $rows_document->c_company }}</a></li>
                                                </ul>
                                                
                                            </div>
                                        </div>
                                        @empty
                                        <h5>{{ trans('a.dulieucapnhat')}}</h5>
                                        @endforelse

                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <img src="{{ asset('public/images/magazine') }}/vi-suc-khoe-cong-dong-2.jpeg" alt="Vì sức khỏe cộng đồng" class="aligncenter topmargin-lg nobottommargin">
        
        </div>
            
    </div>

</section><!-- #content end -->
@endsection