<x-guest-layout>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $("#show_hide_password_confirmation a").on('click', function(event) {
                    event.preventDefault();
                    if ($('#show_hide_password_confirmation input').attr("type") == "text") {
                        $('#show_hide_password_confirmation input').attr('type', 'password');
                        $('#show_hide_password_confirmation i').addClass("bx-hide");
                        $('#show_hide_password_confirmation i').removeClass("bx-show");
                    } else if ($('#show_hide_password_confirmation input').attr("type") == "password") {
                        $('#show_hide_password_confirmation input').attr('type', 'text');
                        $('#show_hide_password_confirmation i').removeClass("bx-hide");
                        $('#show_hide_password_confirmation i').addClass("bx-show");
                    }
                });
            });
        </script>
    @endpush
    <div class="">
        <div class="mb-3 text-center">
            <img src="{{ asset('assets/images/alliance.png') }}" width="200" alt="">
        </div>
        <div class="text-center mb-4">
            <h5 class="">{{ config('app.name') }}</h5>
            <p class="mb-0">Please fill the below details to create your account</p>
        </div>
        <div class="form-body">
            <form method="POST" action="{{ route('register') }}" class="row g-3">
                @csrf
                <div class="col-12">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" id="first_name" name="first_name"
                        class="form-control @error('first_name') is-invalid @enderror" placeholder="First name"
                        value="{{ old('first_name') }}" required>
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="middle_name" class="form-label">Middle Name</label>
                    <input type="text" id="middle_name" name="middle_name"
                        class="form-control @error('middle_name') is-invalid @enderror" placeholder="Middle name"
                        value="{{ old('middle_name') }}">
                    @error('middle_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" id="last_name" name="last_name"
                        class="form-control @error('last_name') is-invalid @enderror" placeholder="Last name"
                        value="{{ old('last_name') }}">
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" id="phone" name="phone"
                        class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number"
                        value="{{ old('phone') }}" required>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email"
                        class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group" id="show_hide_password">
                        <input type="password"
                            class="form-control border-end-0  @error('password') is-invalid @enderror" id="password"
                            name="password" placeholder="Enter Password"> <a href="javascript:;"
                            class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group" id="show_hide_password_confirmation">
                        <input type="password" class="form-control border-end-0 " id="password_confirmation"
                            name="password_confirmation" placeholder="Enter Password"> <a href="javascript:;"
                            class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>

                    </div>
                </div>
                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Sign up</button>
                    </div>
                </div>
                <div class="col-12">
                    <div class="text-center ">
                        <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Sign in here</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
