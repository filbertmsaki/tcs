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
                        <li>Ordinary Membership- 100, 000/= </li>
                        <li>Associate Membership 50,000/=</li>
                        <li>International Membership  USD $ 250.00</li>
                    </ul>
                    <div class="section-title1 mt-3">
                        <h3>Instructions</h3>
                    </div>
                    <ol>
                        <li>Fill this form - COMPLETELY</li>
                        <li>Payment option
                            <ul>
                                <li>
                                    <strong>Crdb bank Tsh A/C - 015083222800 Branch Oysterbay Branch code 3397</strong>
                                </li>
                                <li>
                                    <strong>Crdb bank dollar A/C 025083222800. Branch Oysterbay. Branch Code
                                        3397</strong>
                                </li>
                                <li>
                                    <strong>NMB bank Tsh A/C 20910038054 Muhimbili Branch. Branch code</strong>
                                </li>
                                <li>
                                    <strong>LIPA Number (M-Pesa ) - 542-932-77</strong>
                                </li>
                            </ul>
                        </li>
                        <li>Send the deposit slip (Evidence of transaction) electronically via <a
                                href="mailto:info@tcs.or.tz">info@tcs.or.tz</a>. Subject should be your
                            name and phone number</li>
                        <li>You should receive an acknowledgment of payment (receipt and membership number)</li>
                    </ol>
                </div>
                <div class="section-title2 center mt-5">
                    <h3>Membership Application Form</h3>
                </div>
                <div class="default-form-area">
                    <form class="default-form" action="{{ route('member_registration_store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="fullname" class="required">Your Name *(First name, middle and
                                    surname)</label>
                                <input type="text" class="form-control @error('fullname') is-invalid @enderror"
                                    id="fullname" name="fullname" placeholder="Enter your Name"
                                    value="{{ old('fullname') }}" required>
                                @error('fullname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone" class="required">Phone number * (format to use
                                    255755xxxxxx)</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" placeholder="Enter your phone number"
                                    value="{{ old('phone') }}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email" class="required">Email Address *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Enter your email address"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mct_number" class="required">MCT number</label>
                                <input type="text" class="form-control @error('mct_number') is-invalid @enderror"
                                    id="mct_number" name="mct_number" placeholder="Enter your MCT number"
                                    value="{{ old('mct_number') }}">
                                @error('mct_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender" class="required">Gender *</label>
                                <div class="select-box">
                                    <select
                                        class="text-capitalize selectpicker form-control required @error('gender') is-invalid @enderror"
                                        id="gender" name="gender" data-style="g-select" data-width="100%" required>
                                        <option value="">Select gender</option>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date_of_birth" class="required">Date of Birth *</label>
                                <input placeholder="ie: 22/06/2023"
                                    class="form-control datepicker @error('date_of_birth') is-invalid @enderror"
                                    type="text" id="date_of_birth" name="date_of_birth"
                                    value="{{ old('date_of_birth') }}" required>
                                @error('date_of_birth')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="qualification" class="required">Qualification *</label>
                                <div class="select-box">
                                    <select
                                        class="text-capitalize selectpicker form-control required @error('qualification') is-invalid @enderror"
                                        id="qualification" name="qualification" data-style="g-select" data-width="100%"
                                        required>
                                        <option value="">Select qualification</option>
                                        <option value="Diplomas"
                                            {{ old('qualification') == 'Diplomas' ? 'selected' : '' }}>Diplomas
                                        </option>
                                        <option value="Advances Diploma"
                                            {{ old('qualification') == 'Advances Diploma' ? 'selected' : '' }}>Advances
                                            Diploma</option>
                                        <option value="1st Degree"
                                            {{ old('qualification') == '1st Degree' ? 'selected' : '' }}>1st Degree
                                        </option>
                                        <option value="2nd Degree"
                                            {{ old('qualification') == '2nd Degree' ? 'selected' : '' }}>2nd Degree
                                        </option>
                                        <option value="3rd Fellowships"
                                            {{ old('qualification') == '3rd Fellowships' ? 'selected' : '' }}>3rd
                                            Fellowships</option>
                                    </select>
                                    @error('qualification')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="qualified_year" class="">Year qualified as physician (if
                                    physician)</label>
                                <input placeholder="ie: 22/06/2023"
                                    class="form-control datepicker @error('qualified_year') is-invalid @enderror"
                                    type="text" id="qualified_year" name="qualified_year"
                                    value="{{ old('qualified_year') }}">
                                @error('qualified_year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sub_speciality_qualification" class="">Sub-speciality qualification
                                    <small>(write none if you don't have a sub-speciality)</small>
                                </label>
                                <input type="text"
                                    class="form-control @error('sub_speciality_qualification') is-invalid @enderror"
                                    id="sub_speciality_qualification" name="sub_speciality_qualification"
                                    placeholder="Enter Sub-speciality qualification"
                                    value="{{ old('sub_speciality_qualification') }}">
                                @error('sub_speciality_qualification')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="college_attained" class="">University/College *
                                    <small>list of your colleges and qualification attained may be outlined</small>
                                </label>
                                <textarea name="college_attained"
                                    class="form-control textarea required @error('college_attained') is-invalid @enderror"
                                    placeholder="Enter a list of universities/colleges...." required>{{ old('college_attained') }}</textarea>
                                @error('college_attained')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="membership_type" class="required">Type of Membership being applied
                                    *</label>
                                <div class="select-box">
                                    <select
                                        class="text-capitalize selectpicker form-control required @error('membership_type') is-invalid @enderror"
                                        id="membership_type" name="membership_type" data-style="g-select"
                                        data-width="100%" required>
                                        <option value="">Select membership</option>
                                        <option value="Ordinary Members"
                                            {{ old('membership_type') == 'Ordinary Members' ? 'selected' : '' }}>
                                            Ordinary Members</option>
                                        <option value="Associate Members"
                                            {{ old('membership_type') == 'Associate Members' ? 'selected' : '' }}>
                                            Associate Members</option>
                                        <option value="Honorary Members"
                                            {{ old('membership_type') == 'Honorary Members' ? 'selected' : '' }}>
                                            Honorary Members</option>
                                        <option value="International Members"
                                            {{ old('membership_type') == 'International Members' ? 'selected' : '' }}>
                                            International Members</option>
                                        <option value="Corporate Members"
                                            {{ old('membership_type') == 'Corporate Members' ? 'selected' : '' }}>
                                            Corporate Members</option>
                                    </select>
                                    @error('membership_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div>
                                <h4 class="card-title">Acknowledgment and Certification</h4>
                                <p class="card-text mt-4">
                                    I have filled the form correctly and I hereby certify that the information contained
                                    in this application is true, complete, and correct to the best of my knowledge and
                                    belief.
                                </p>
                                <p class="card-text mt-4">
                                    I declare to abide by the Constitution of the Association and uphold APHYTA’s code
                                    of conduct.
                                </p>
                                <p class="card-text mt-4">
                                    I consent to the publishing of my name as a member of the Association of Physicians
                                    in Tanzania.
                                </p>
                                <div class="checkbox-inline" style="padding-left: 0px;">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="agreeCheck" name="agreeCheck" required> I agree to
                                        all the above statements
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
