<!-- Footer
        ============================================= -->
        <footer id="footer" class="dark" >

            

            <!-- Copyrights
            ============================================= -->
            <div id="copyrights" >

                <div class="container clearfix">
                    <?php $profile=DB::table('tbl_profile')->where('c_lang',App::getLocale())->first();?>
                    <div class="col_half" style="font-weight:bold">
                        
                        {!! $profile->c_description or '' !!}
                        <div style="color:#666; font-weight:300; font-size:12px;padding-top:5px">
                        <span >Địa chỉ: {{ $profile->c_address or '' }}</span>
                        <br><span>ĐT/Fax: {{ $profile->c_phone or '' }}</span>
                        <br><span >Email:  {{ $profile->c_email or '' }}</span>
                        <br><span >Copyright © 2016 {!! $profile->c_description or '' !!}</span>
                        </div>
                    </div>

                    <div class="col_half col_last tright">
                        <div class="fright clearfix">
                            <a href="{{ $profile->c_facebook or '' }}" class="social-icon si-small si-borderless si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>

                            <a  class="social-icon si-small si-borderless si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>

                            <a  class="social-icon si-small si-borderless si-gplus">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>

                            <a  class="social-icon si-small si-borderless si-pinterest">
                                <i class="icon-pinterest"></i>
                                <i class="icon-pinterest"></i>
                            </a>

                            <a  class="social-icon si-small si-borderless si-vimeo">
                                <i class="icon-vimeo"></i>
                                <i class="icon-vimeo"></i>
                            </a>

                            

                            <a href="{{ $profile->c_yahoo or '' }}" class="social-icon si-small si-borderless si-yahoo">
                                <i class="icon-yahoo"></i>
                                <i class="icon-yahoo"></i>
                            </a>

                            <a  class="social-icon si-small si-borderless si-linkedin">
                                <i class="icon-linkedin"></i>
                                <i class="icon-linkedin"></i>
                            </a>
                        </div>

                        <div class="clear"></div>

                        <i class="icon-envelope2"></i>  {{ $profile->c_email or '' }} <span class="middot">&middot;</span> <i class="icon-headphones"></i> {{ $profile->c_phone or '' }} <span class="middot">&middot;</span> <i class="icon-skype2"></i> AttpSkype

                    </div>

                </div>

            </div><!-- #copyrights end -->

        </footer><!-- #footer end -->