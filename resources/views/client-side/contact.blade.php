@extends('layouts.client-master')

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend') }}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2 style="color:black;">Contact Us</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/') }}" style="color:black;">Home</a>
                        <span style="color:black;">Contact Us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone" style="color: #fcb800"></span>
                    <h4 style="color: #fcb800">Phone</h4>
                    <p>+880 9638 444 004</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt" style="color: #fcb800"></span>
                    <h4 style="color: #fcb800">Address</h4>
                    <p> বাড়ি#27, রোড#12, শেখেরটেক, আদাবর, মোহাম্মদপুর, ঢাকা-1207 (মোহাম্মদপুর গ্রেস ইন্টারন্যাশনাল স্কুল এর ২য় তলা)</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt" style="color: #fcb800"></span>
                    <h4 style="color: #fcb800">Open time</h4>
                    <p>24 Hour</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_mail_alt" style="color: #fcb800"></span>
                    <h4 style="color: #fcb800">Email</h4>
                    <p>info@ajwanshop.com</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Map Begin -->
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.4144965776004!2d90.35100137435967!3d23.768249888092786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c18733a0778f%3A0xb19d72b71eca0276!2sShekhertek!5e0!3m2!1sen!2sbd!4v1703437435564!5m2!1sen!2sbd" 
     height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    <div class="map-inside">
        <i class="icon_pin"></i>
        <div class="inside-widget">
            <h4>শেখেরটেক, আদাবর, মোহাম্মদপুর</h4>
            <ul>
                <li>Phone: +8801331559550</li>
                <li>Add: বাড়ি#27, রোড#12, শেখেরটেক, আদাবর, মোহাম্মদপুর, ঢাকা-1207 (মোহাম্মদপুর গ্রেস ইন্টারন্যাশনাল স্কুল এর ২য় তলা)</li>
            </ul>
        </div>
    </div>
</div>
<!-- Map End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Leave Message</h2>
                </div>
            </div>
        </div>
        <form action="#">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Your name">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Your Email">
                </div>
                <div class="col-lg-12 text-center">
                    <textarea placeholder="Your message"></textarea>
                    <button type="submit" class="site-btn">SEND MESSAGE</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact Form End -->
    
@endsection