<x-web-layout>
    @push('styles')
        <style>
            .membership-info {
                padding-top: 20px;
            }

            .membership-info ul,
            .membership-info ol {
                margin-top: 10px
            }
        </style>
    @endpush
    <div class="inner-banner has-base-color-overlay text-center" style="background: url(images/background/4.jpg);">
        <div class="container">
            <div class="box">
                <h1>Become a Member</h1>
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
                        Registration
                    </li>
                </ul>
            </div>
            <div class="pull-right">
                <a href="{{ route('members') }}" class="get-qoute"><i class="fa fa-arrow-circle-right"></i>Become a
                    Member</a>
            </div>
        </div>
    </div>
    <section class="volunteer">
        <div class="container">
            <div class="feature-style-one">
                <div class="membership-info">
                    <div class="section-title1">
                        <h3>Membership types and fees as below</h3>
                    </div>
                    <ul>
                        <li>Ordinary members (Specialist in internal medicine iM or mmed in any iM discipline): 100,000
                            Tshs</li>
                        <li>Associate members (Residents in internal medicine and registrars in internal medicine):
                            50,000 Tshs</li>
                    </ul>

                    <div class="section-title1 mt-3">
                        <h3>Instructions</h3>
                    </div>
                    <ol>
                        <li>Fill this form - COMPLETELY</li>
                        <li>Payment option
                            <ul>
                                <li>
                                    <strong>BANK TRANSFER</strong><br>
                                    Deposit the fees in a Aphyta Bank Account: <br>
                                    <strong>Name:</strong> The Association of Physicians of Tanzania<br>
                                    <strong>Bank:</strong> NMB<br>
                                    <strong>Account Number:</strong> 20910032155
                                </li>
                                <li>
                                    <strong>LIPA Number (tigo)</strong><br>
                                    8829908<br>
                                    See picture below
                                </li>
                            </ul>
                        </li>
                        <li>Send the deposit slip (Evidence of transaction) electronically via <a
                                href="mailto:aphytanzania@gmail.com">aphytanzania@gmail.com</a>. Subject should be your
                            name and phone number</li>
                        <li>You should receive an acknowledgment of payment (receipt and membership number)</li>
                    </ol>
                </div>

                <div class="section-title2 center mt-5">
                    <h3>Membership Application Form</h3>
                </div>
                <div class="default-form-area">
                    <form id="contact-form" name="contact_form" class="default-form" action="inc/sendmail.php"
                        method="post">
                        <div class="row">

                            <div class="form-group  col-md-6">
                                <label for="fullname" class="required">Your Name *(First name, middle and
                                    surname)</label>
                                <input type="text" class="form-control" id="fullname" placeholder="Enter your Name"
                                    required>
                            </div>
                            <div class="form-group  col-md-6">
                                <label for="phone" class="required">Phone number (format to use +255755xxxyyy)
                                </label>
                                <input type="text" class="form-control" id="phone"
                                    placeholder="Enter your phone number" required>
                            </div>
                            <div class="form-group  col-md-6">
                                <label for="email" class="required">Email Address</label>
                                <input type="email" class="form-control" id="email"
                                    placeholder="Enter your email address" required>
                            </div>
                            <div class="form-group  col-md-6">
                                <label for="mct_number" class="required">MCT number</label>
                                <input type="text" class="form-control" id="mct_number"
                                    placeholder="Enter your MCT number" required>
                            </div>

                            <div class="form-group  col-md-6">
                                <label for="gender" class="required">Gender</label>
                                <div class="select-box">
                                    <select class="text-capitalize selectpicker form-control required" name="gender"
                                        data-style="g-select" data-width="100%">
                                        <option value="">Select gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group  col-md-6">
                                <label for="date_of_birth" class="required">Date of Birth</label>
                                <input placeholder="ie: 22/06/2023" class="form-control datepicker" type="text"
                                    id="date_of_birth" required>
                            </div>

                            <div class="form-group  col-md-6">
                                <label for="qualification" class="required">Qualification</label>
                                <div class="select-box">
                                    <select class="text-capitalize selectpicker form-control required"
                                        name="qualification" data-style="g-select" data-width="100%">
                                        <option value="">Select qualification</option>
                                        <option value="mmed">M.med.</option>
                                        <option value="mmed_subspeciality">M.med. affiliated subspeciality</option>
                                        <option value="both">Both M.med. and Subspeciality</option>
                                        <option value="md_training">MD in training</option>
                                        <option value="md_interest">MD with interest and working in internal
                                            medicine</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group  col-md-6 ">
                                <label for="qualified_year" class="">Year qualified as physician (if
                                    physician)</label>
                                <input placeholder="ie: 22/06/2023" class="form-control datepicker" type="text"
                                    id="qualified_year">
                            </div>

                            <div class="form-group  col-md-6">
                                <label for="sub_speciality_qualification" class="">Sub-speciality qualification
                                    <small>(write none if you don't have a sub-speciality)</small>
                                </label>
                                <input type="text" class="form-control" id="sub_speciality_qualification"
                                    placeholder="Enter Sub-speciality qualification">
                            </div>

                            <div class="form-group  col-md-12">
                                <label for="college_attained" class="">University/College
                                    <small>list of your colleges and qualification attained may be outlined</small>
                                </label>

                                <textarea name="college_attained" class="form-control textarea required"
                                    placeholder="Enter a list of universities/colleges...."></textarea>

                            </div>
                            <div class="form-group  col-md-6">
                                <label for="qualification" class="required">Type of Membership being applied </label>
                                <div class="select-box">
                                    <select class="text-capitalize selectpicker form-control required"
                                        name="qualification" data-style="g-select" data-width="100%">
                                        <option value="">Select membership</option>
                                        <option value="Member">Member</option>
                                        <option value="Associate Member">Associate Member</option>

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div>
                                <h4 class="card-title">Acknowledgment and Certification</h4>
                                <p class="card-text mt-4">
                                    I have filled the form correctly and I hereby certify that the information contained in this application is true, complete, and correct to the best of my knowledge and belief.
                                </p>
                                <p class="card-text mt-4">
                                    I declare to abide by the Constitution of the Association and uphold APHYTA’s code of conduct.
                                </p>
                                <p class="card-text mt-4">
                                    I consent to the publishing of my name as a member of the Association of Physicians in Tanzania.
                                </p>
                                <div class="checkbox-inline" style="padding-left: 0px;">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="agreeCheck" required> I agree to all the above statements
                                    </label>
                                </div>
                            </div>
                            <div class="form-group center">

                                <button class="thm-btn" type="submit" data-loading-text="Please wait...">submit
                                    now</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
    </section>
</x-web-layout>
