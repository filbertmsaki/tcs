<x-web-layout>
    <div class="inner-banner has-base-color-overlay text-center" style="background: url(images/background/4.jpg);">
        <div class="container">
            <div class="box">
                <h1>Contact us</h1>
            </div>
        </div>
    </div>
    <div class="breadcumb-wrapper">
        <div class="container">
            <div class="pull-left">
                <ul class="list-inline link-list">
                    <li>
                        <a href="{{ route('index') }}">Home</a>
                    </li>
                    <li>
                        Contact Us
                    </li>
                </ul>
            </div>
            <div class="pull-right">
                <a href="{{ route('members') }}" class="get-qoute"><i class="fa fa-arrow-circle-right"></i>Become a Member</a>
            </div>
        </div>
    </div>
    <section class="contact sec-padd2">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <h2>Send Your <span class="thm-color">Message</span></h2>
                    </div>
                    <div class="default-form-area">
                        <form id="contact-form" name="contact_form" class="default-form" action="inc/sendmail.php"
                            method="post">
                            <div class="row clearfix">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="form_name" class="form-control" value=""
                                            placeholder="Your Name *" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="email" name="form_email" class="form-control required email"
                                            value="" placeholder="Your Mail *" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="form_phone" class="form-control" value=""
                                            placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="form_subject" class="form-control" value=""
                                            placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <textarea name="form_message" class="form-control textarea required" placeholder="Your Message...."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input id="form_botcheck" name="form_botcheck" class="form-control"
                                            type="hidden" value="">
                                        <button class="thm-btn" type="submit" data-loading-text="Please wait...">send
                                            message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <h2>Quick <span class="thm-color">Contact</span></h2>
                    </div>
                    <div class="content">
                        <div class="text">
                            <p>If you are passionate to join in our Society, contact us </p>
                        </div>
                        <ul class="contact-info">
                            <li><i class="icon-arrows"></i><span>Address:</span> P o Box 12235 <br>Dar es Salaam
                                Tanzania</li>
                            <li><i class="icon-phone"></i><span> Phone:</span> +255 782 242 226 & <br>+255 746 410
                                000</li>
                            <li><i class="icon-back"></i><span>Email:</span> info@tcs.or.tz</li>
                        </ul>
                        <ul class="social-icon">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-feed"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="home-google-map">
        <div></div>
    </section>
</x-web-layout>
