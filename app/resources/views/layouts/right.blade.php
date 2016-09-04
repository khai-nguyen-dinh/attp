
<div class="sidebar-widgets-wrap">

    <div class="widget clearfix">

        <div class="tabs nobottommargin clearfix" id="sidebar-tabs">
        <?php
            $profile=DB::table('tbl_profile')->where('c_lang',App::getLocale())->first();
            $view1= DB::table('tbl_news')->where('c_lang',App::getLocale())->orderBy('c_view','desc')->first();   
            if($view1!=null){         
            if($view1->c_category_news==1) $kind1 = 'tin-trong-nuoc'; else $kind1 = 'tin-quoc-te';
        }
            $view2= DB::table('tbl_science')->where('c_lang',App::getLocale())->orderBy('c_view','desc')->first();            
            $view3= DB::table('tbl_service')->where('c_lang',App::getLocale())->orderBy('c_view','desc')->first();
            if($view3!=null){
                $kind3 = DB::table('tbl_category_service')->where([['c_lang',App::getLocale()],['pk_category_service_id',$view3->fk_category_service_id]])->select('c_slug')->first();
            }
            $view4= DB::table('tbl_other')->where('c_lang',App::getLocale())->orderBy('c_view','desc')->first();
            if($view4!=null){
                $kind4 = DB::table('tbl_category_other')->where([['c_lang',App::getLocale()],['pk_category_other_id',$view4->fk_category_other_id]])->select('c_slug')->first();
            }
        ?>
            <ul class="tab-nav clearfix ">
                
                <li><a class="pop-news" href="#tabs-2"><i class="fa fa-tags" aria-hidden="true"></i> {{ trans('a.tindocnhieu')}}</a></li>
                
            </ul>

            <div class="tab-container">

                
                <div class="tab-content clearfix" id="tabs-2">
                    <div id="recent-post-list-sidebar">

                        <div class="spost clearfix">
                            
                            <div class="entry-c">
                                <div class="entry-title">
                                    <h4><a class="text-pop-news" href="{{url(App::getLocale())}}/tin-tuc/{{$kind1 or ''}}/{{$view1->c_slug or '' }}">{!! $view1->c_name or '' !!}</a></h4>
                                </div>
                                <ul class="entry-meta">
                                    <li>{{ $view1->c_date or '' }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="spost clearfix">
                            
                            <div class="entry-c">
                                <div class="entry-title">
                                    <h4><a class="text-pop-news" href="{{url(App::getLocale())}}/nghien-cuu-khoa-hoc/bai-viet/{{$view2->c_slug or '' }}">{!! $view2->c_name or ''!!}</a></h4>
                                </div>
                                <ul class="entry-meta">
                                    <li>{{ $view2->c_date or '' }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="spost clearfix">
                            
                            <div class="entry-c">
                                <div class="entry-title">
                                    <h4><a class="text-pop-news" href="{{url(App::getLocale())}}/dich-vu-phan-tich/{{ $kind3->c_slug or '' }}/{{$view3->c_slug or ''}}">{!!$view3->c_name or '' !!}</a></h4>
                                </div>
                                <ul class="entry-meta">
                                    <li>{{ $view3->c_date or '' }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="spost clearfix">
                            
                            <div class="entry-c">
                                <div class="entry-title">
                                    <h4><a class="text-pop-news" href="{{url(App::getLocale())}}/dich-vu-khac/{{ $kind4->c_slug or '' }}/{{$view4->c_slug or ''}}">{!! $view4->c_slug->c_name or '' !!}</a></h4>
                                </div>
                                <ul class="entry-meta">
                                    <li>{{ $view4->c_date or '' }}</li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
                

            </div>

        </div>

    </div>


    <div class="widget clearfix right-chat-online">
        <h4>Chat Online</h4>
            
            <br>
        <div class="col_one_third nobottommargin">
            <a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
                <i class="icon-facebook"></i>
                <i class="icon-facebook"></i>
            </a>
            <small style="display: block; margin-top: 3px;"><strong><div class="counter counter-inherit"><span data-from="1000" data-to="58742" data-refresh-interval="100" data-speed="3000" data-comma="true"></span></div></strong>Likes</small>
        </div>

        <div class="col_one_third nobottommargin">
            <a href="Skype:haquy?chat" class="social-icon si-dark si-colored si-twitter nobottommargin" style="margin-right: 10px;">
                <i class="icon-skype"></i>
                <i class="icon-skype"></i>
            </a>
            <small style="display: block; margin-top: 3px;"><strong><div class="counter counter-inherit"><span data-from="500" data-to="9654" data-refresh-interval="50" data-speed="2500" data-comma="true"></span></div></strong>Followers</small>
        </div>

        <div class="col_one_third nobottommargin col_last">
            <a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">
                <i class="icon-yahoo"></i>
                <i class="icon-yahoo"></i>
            </a>
            <small style="display: block; margin-top: 3px;"><strong><div class="counter counter-inherit"><span data-from="200" data-to="15475" data-refresh-interval="150" data-speed="3500" data-comma="true"></span></div></strong>Readers</small>
        </div>
        </div>
    </div>

    <div class="widget clearfix right-box-fb">

        <iframe style="border: none; overflow: hidden; width: 250px; height: 350px;" src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/chuyendong24hvtvnews/?fref=ts&amp;width=250&amp;height=350&amp;colorscheme=light&amp;show_faces=true&amp;small_header=false&amp;header=true&amp;stream=false&amp;show_border=true" width="250" height="350" frameborder="0" scrolling="no"></iframe>

    </div>

    <div class="widget clearfix">

        <h4>Flickr ảnh</h4>
        <div id="flickr-widget" class="flickr-feed masonry-thumbs col-5" data-id="{{$profile->c_flickr or '' }}" data-count="15" data-type="group" data-lightbox="gallery"></div>

    </div>                            

    <div class="widget clearfix right-img">

        <img class="aligncenter" src="{{ asset('public')}}/images/magazine/ad.png" alt="">

    </div>
    
    <div class="widget clearfix right-link">
    <h4>{{ trans('a.lienket') }}</h4>
    <?php $link = DB::table('tbl_link')->get(); ?>
        @forelse($link as $rows_link)
        <div><a href="{{$rows_link->c_link}}" target="_blank"><img class="aligncenter" src="{{ asset('public/upload/link')}}/{{$rows_link->c_img}}" alt="{{$rows_link->c_name}}"></a></div>
        @empty
        @endforelse
    </div>
</div>
   
