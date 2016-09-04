 
 <!-- Top Bar
        ============================================= -->
        <div id="top-bar">

            <div class="container clearfix">

                <div class="col_half nobottommargin">

                    <!-- Top Links
                    ============================================= -->
                    <div class="top-links">
                        <ul>
                            <li><a href="{{url(App::getLocale())}}">{{trans('a.trangchu')}}</a></li>
                            <li><a href="{{url(App::getLocale())}}/hoi-dap">{{ trans('a.hoidap') }}</a></li>
                            <li><a href="{{url(App::getLocale())}}/lien-he">{{ trans('a.lienhe') }}</a></li>
                            
                        </ul>
                    </div><!-- .top-links end -->

                </div>

                <div class="col_half fright col_last nobottommargin">

                    <!-- Top Social
                    ============================================= -->
                    <div id="top-social">
                        <ul>
                        <?php $profile=DB::table('tbl_profile')->where('c_lang',App::getLocale())->first();?>
                            <li><a href="{{ $profile->c_facebook or ''}}" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
                            <li><a href="{{ $profile->c_skype or '' }}" class="si-twitter"><span class="ts-icon"><i class="icon-skype"></i></span><span class="ts-text">Skype</span></a></li>
                            
                            <li><a href="{{ $profile->c_yahoo or '' }}" class="si-pinterest"><span class="ts-icon"><i class="icon-yahoo"></i></span><span class="ts-text">Yahoo</span></a></li>
                            
                            <li><a href="tel:{{-- {{ $profile->c_phone }} --}}+84979427121" class="si-call"><span class="ts-icon"><i class="icon-call"></i></span><span class="ts-text">+84 4 3756 8422</span></a></li>
                            <li><a href="mailto:{{ $profile->c_email or '' }}" class="si-email3"><span class="ts-icon"><i class="icon-email3"></i></span><span class="ts-text"> {{ $profile->c_email or '' }}</span></a></li>
                            <li><a href="{{ url('') }}" class="si-github"><span class="ts-icon"><img src="{{ asset('public') }}/images/vn.jpeg"></span><span class="ts-text">Vietnamese</span></a></li>
                            <li><a href="{{ url('en') }}" class="si-github"><span class="ts-icon"><img src="{{ asset('public') }}/images/en.jpeg"></i></span><span class="ts-text">English</span></a></li>
                        </ul>
                    </div><!-- #top-social end -->

                </div>

            </div>

        </div><!-- #top-bar end -->
        <!-- Header
        ============================================= -->
        <header id="header" class="sticky-style-2">

            <div class="container clearfix">

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="{{url(App::getLocale())}}" class="standard-logo" data-dark-logo="{{ asset('public') }}/images/logo_attp.png"><img src="{{ asset('public') }}/images/logo_attp.png" id='saturation' alt="Trung tâm Tư vấn, Đào tạo và Chuyển giao Công nghệ - VIỆN HÀN LÂM KHOA HỌC VÀ CÔNG NGHỆ VIỆT NAM"></a>
                    <a href="{{url(App::getLocale())}}" class="retina-logo" data-dark-logo="{{ asset('public') }}/images/logo_attp.png"><img id='saturation' src="{{ asset('public') }}/images/logo_attp.png" alt="Trung tâm Tư vấn, Đào tạo và Chuyển giao Công nghệ - VIỆN HÀN LÂM KHOA HỌC VÀ CÔNG NGHỆ VIỆT NAM"></a>
                </div><!-- #logo end -->

                <div class="top-advert">
                    <img src="{{ asset('public') }}/images/magazine/vi-suc-khoe-cuoc-song.jpeg" alt="Vì sức khỏe cuộc sống">
                </div>

            </div>

            <div id="header-wrap">

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu" class="style-2">

                    <div class="container clearfix">

                        <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                        <ul>
                            <li class="current"><a href="{{url(App::getLocale())}}"><div>{{ trans('a.trangchu') }}</div></a>
                                
                            </li>
                            <li><a href="#"><div>{{ trans('a.gioithieu') }}</div></a>
                                <?php $cate_about = DB::table('tbl_category_about')->where('c_lang',App::getLocale())->get(); ?>
                                <ul>
                                    @foreach($cate_about as $rows_cate_about)
                                    <li><a href="{{url(App::getLocale())}}/gioi-thieu/{{ $rows_cate_about->c_slug }}"><div>{!! $rows_cate_about->c_name !!}</div></a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="{{ url(App::getLocale()) }}/tin-tuc"><div>{{ trans('a.tintuc') }}</div></a> 
                            </li>
                            <li>
                                <a href="{{ url(App::getLocale()) }}/van-ban-phap-luat"><div>{{ trans('a.vanban') }}</div></a>  
                            </li>
                            <li><a href="#"><div>{{ trans('a.dichvu') }}</div></a>
                                <ul style="display: none;">
                                    
                                   <?php $cate_service = DB::table('tbl_category_service')->where('c_lang',App::getLocale())->get(); ?>
                                   @foreach($cate_service as $rows_service)
                                    <li><a href="{{url(App::getLocale())}}/dich-vu-phan-tich/{{ $rows_service->c_slug }}"><div>{{ $rows_service->c_name }}</div></a>
                                        
                                    </li>
                                   @endforeach 
                                    
                                </ul>
                            </li>
                            
                            <li><a href="#"><div >{{ trans('a.dichvukhac') }}</div></a>
                                <?php $cate_other = DB::table('tbl_category_other')->where('c_lang',App::getLocale())->get(); ?>
                                <ul style="display: none;">
                                    
                                    @foreach($cate_other as $rows_other)
                                    <li><a href="{{url(App::getLocale())}}/dich-vu-khac/{{ $rows_other->c_slug }}"><div>{{ $rows_other->c_name }}</div></a>
                                        
                                    </li>
                                   @endforeach 
                                    
                                    
                                </ul>
                            </li>
                            
                                
                            </li>
                        </ul>

                        <!-- Top Search
                        ============================================= -->
                        <div id="top-search">
                            <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                            <form action="{{url(App::getLocale())}}/tim-kiem" method="get">
                            {{-- {{ csrf_field() }} --}}
                                <input type="text" name="q" class="form-control" value="" placeholder="{{ trans('a.timkiem') }}...">
                           
                            </form>
                        </div><!-- #top-search end -->

                    </div>

                </nav><!-- #primary-menu end -->

            </div>

        </header><!-- #header end -->
