
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rao vặt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <!-- <link href="{{ asset('dist/css/app.css') }}" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" type="text/css" href="/dist/css/app.css"> -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- css -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{asset("assets/public/asset/css/")}}/bootstrap.css" rel="stylesheet" />
    <link href="{{asset("assets/public/asset/css/")}}/bootstrap-responsive.css" rel="stylesheet" />
    <link href="{{asset("assets/public/asset/css/")}}/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="{{asset("assets/public/asset/css/")}}/jcarousel.css" rel="stylesheet" />
    <link href="{{asset("assets/public/asset/css/")}}/flexslider.css" rel="stylesheet" />
    <link href="{{asset("assets/public/asset/css/")}}/style.css" rel="stylesheet" />
    <!-- Theme skin -->

    <link href="//l.allcdn.org/fa/v5.12.2/css/all.min.css" rel="stylesheet">
    <!-- <link href="skins/default.css" rel="stylesheet" /> -->
    <link href="{{asset("assets/public/asset/skins/")}}/default.css" rel="stylesheet" />

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png" />
    <link rel="shortcut icon" href="https://raovat.vietpage.com/data/images/vietpage/category/classified/icon/mua-ban.png" />

    <!-- =======================================================
      Theme Name: Flattern
      Theme URL: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/
      Author: BootstrapMade.com
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>


<body>
<div id="app">
    <div id="wrapper" >
        <header>
        <navbar-component />
        </header>
       
        {{--Vue Routing--}}
        <home-main></home-main>
        <vue-progress-bar></vue-progress-bar>
    </div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="widget">
                            <h5 class="widgetheading">Browse pages</h5>
                            <ul class="link-list">
                                <li><a href="#">Công ty chúng tôi</a></li>
                                <li><a href="#">Dịch vụ chúng tôi</a></li>
                                <li><a href="#">Gặp gỡ đội ngũ</a></li>
                                <li><a href="#">Khám phá PKTPASS</a></li>
                                <li><a href="#">Liên hệ với chúng tôi</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="widget">
                            <h5 class="widgetheading">Hướng dẫn</h5>
                            <ul class="link-list">
                                <li><a href="#">Đăng kí thành viên</a></li>
                                <li><a href="#">Đăng tin</a></li>
                                <li><a href="#">Thanh toán</a></li>
                                <li><a href="#">Nạp tiền</a></li>
                                <li><a href="#">Mua tin</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="span3">
                        <div class="widget">
                            <h5 class="widgetheading">Flickr photostream</h5>
                            <div class="flickr_badge">
                                <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=8&amp;display=random&amp;size=s&amp;layout=x&amp;source=user&amp;user=34178660@N03"></script>
                            </div>
                            <div class="clear">
                            </div>
                        </div>
                    </div> -->
                    <div class="span3">
                        <div class="widget">
                            <h5 class="widgetheading">Liên lạc với chúng tôi</h5>
                            <address>
                                <strong>PKTPASS</strong><br>
                               University of Information Technology
                            </address>
                            <p>
                                <i class="icon-phone"></i> 0386541274 <br>
                                <i class="icon-envelope-alt"></i>tanphatjk5@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="span6">
                            <div class="copyright">
                                <p>
                                    <span>&copy; PKTPASS - All right reserved.</span>
                                </p>
                                <div class="credits">
                                 
                                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <ul class="social-network">
                                <li><a href="https://www.facebook.com/imfat5" data-placement="bottom" title="Facebook"><i class="icon-facebook icon-square"></i></a></li>
                                <li><a href="#" data-placement="bottom" title="Twitter"><i class="icon-twitter icon-square"></i></a></li>
                                <li><a href="#" data-placement="bottom" title="Linkedin"><i class="icon-linkedin icon-square"></i></a></li>
                                <li><a href="#" data-placement="bottom" title="Pinterest"><i class="icon-pinterest icon-square"></i></a></li>
                                <li><a href="#" data-placement="bottom" title="Google plus"><i class="icon-google-plus icon-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

</body>
<a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
<script src="{{asset("dist/js/app.js")}}"></script>
<script src="/dist/js/app.js"></script>
<!-- javascript
  ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset("assets/public/asset/js/")}}/jquery.js"></script>
<script src="{{asset("assets/public/asset/js/")}}/jquery.easing.1.3.js"></script>
<script src="{{asset("assets/public/asset/js/")}}/bootstrap.js"></script>
<script src="{{asset("assets/public/asset/js/")}}/jcarousel/jquery.jcarousel.min.js"></script>
<script src="{{asset("assets/public/asset/js/")}}/jquery.fancybox.pack.js"></script>
<script src="{{asset("assets/public/asset/js/")}}/jquery.fancybox-media.js"></script>
<script src="{{asset("assets/public/asset/js/")}}/google-code-prettify/prettify.js"></script>
<script src="{{asset("assets/public/asset/js/")}}/portfolio/jquery.quicksand.js"></script>
<script src="{{asset("assets/public/asset/js/")}}/portfolio/setting.js"></script>
<script src="{{asset("assets/public/asset/js/")}}/jquery.flexslider.js"></script>
<script src="{{asset("assets/public/asset/js/")}}/jquery.nivo.slider.js"></script>
<script src="{{asset("assets/public/asset/js/")}}/modernizr.custom.js"></script>
<script src="{{asset("assets/public/asset/js/")}}/jquery.ba-cond.min.js"></script>
<script src="{{asset("assets/public/asset/js/")}}/jquery.slitslider.js"></script>
<script src="{{asset("assets/public/asset/js/")}}/animate.js"></script>

<!-- Template Custom JavaScript File -->
<script src="{{asset("assets/public/asset/js/")}}/custom.js"></script>

</body>
</html>
