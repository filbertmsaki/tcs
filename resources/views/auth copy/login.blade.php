<x-guest-layout>
    <div class="">
        <div class="mb-3 text-center">
            <img src="{{ asset('assets/images/alliance.png') }}" width="200" alt="">
        </div>
        <div class="text-center mb-4">
            <h5 class="">{{ config('app.name') }}</h5>
            <p class="mb-0">Please log in to your account</p>
        </div>
        <div class="form-body">

            <form action="{{ route('login') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="inputChoosePassword" class="form-label">Password</label>
                    <div class="input-group" id="show_hide_password">
                        <input type="password" class="form-control border-end-0 @error('password') is-invalid @enderror"
                            name="password" id="inputChoosePassword" placeholder="Enter Password" required> <a
                            href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                </div>
                @if (Route::has('password.request'))
                    <div class="col-md-6 text-end"> <a href="{{ route('password.request') }}">Forgot Password ?</a>
                    </div>
                @endif
                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </div>
                @if (Route::has('register'))
                    <div class="col-12">
                        <div class="text-center ">
                            <p class="mb-0">Don't have an account yet? <a href="{{ route('register') }}">Sign up
                                    here</a>
                            </p>
                        </div>
                    </div>
                @endif
            </form>
        </div>


    </div>
</x-guest-layout>
