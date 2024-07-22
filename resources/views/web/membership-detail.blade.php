<x-web-layout>
    <div class="inner-banner has-base-color-overlay text-center"
        style="background: url({{ asset('images/background/4.jpg') }});">
        <div class="container">
            <div class="box">
                <h1>Member Details</h1>
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
                        <a href="{{ route('members') }}">Membership</a>
                    </li>
                    <li>
                        Member Details
                    </li>
                </ul>
            </div>

        </div>
    </div>


    <section class="blog-single-post blog-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="post-area paddt-50">
                        <div class="content-box">
                            <div class="outer-box">
                                <div class="section-title-member">
                                    <h3>Thank you for registering as a member of the Tanzania Cardiac Society.</h3>
                                </div>
                                <div class="post-author paddt-30">
                                    <div class="inner-box">
                                        <figure class="author-thumb">
                                            <img src="{{ asset('images/images.png') }}" alt="" />
                                        </figure>
                                        <h4>{{ @$member->fullname }}</h4>
                                        <div class="">
                                            <p>
                                                Email: {{ @$member->email }}
                                            </p>
                                            <p>
                                                Phone: {{ @$member->phone }}
                                            </p>
                                            <p>
                                                Membership Number: {{ @$member->membership_no }}
                                            </p>

                                        </div>

                                        <div class="membership-info paddt-20">
                                            <div class="section-title1">
                                                <h3>Membership types and fees as below</h3>
                                            </div>
                                            <ul>
                                                <li>Ordinary Membership- 100, 000/= </li>
                                                <li>Associate Membership 50,000/=</li>
                                                <li>International Membership  USD $ 250.00</li>
                                            </ul>
                                            <div class="section-title1 mt-3">
                                                <h3>Instructions</h3>
                                            </div>
                                            <ol>
                                                <li>Payment option
                                                    <ul>
                                                        <li>
                                                            <strong>Crdb bank Tsh A/C - 015083222800 Branch Oysterbay
                                                                Branch code 3397</strong>
                                                        </li>
                                                        <li>
                                                            <strong>Crdb bank dollar A/C 025083222800. Branch Oysterbay.
                                                                Branch Code
                                                                3397</strong>
                                                        </li>
                                                        <li>
                                                            <strong>NMB bank Tsh A/C 20910038054 Muhimbili Branch.
                                                                Branch code</strong>
                                                        </li>
                                                        <li>
                                                            <strong>LIPA Number (M-Pesa ) - 542-932-77</strong>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>Send the deposit slip (Evidence of transaction) electronically via
                                                    <a href="mailto:info@tcs.or.tz">info@tcs.or.tz</a>. Subject should
                                                    be your
                                                    name and phone number</li>
                                            </ol>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-web-layout>
