<x-guest-layout>
    <div class="">
        <div class="mb-3 text-center">
            <img src="{{ asset('assets/images/alliance.png') }}" width="200" alt="">
        </div>
        <div class="text-center mb-4">
            <h5 class="">{{ config('app.name') }}</h5>
            <p class="mb-0">Reset Your Password</p>
        </div>
        <div class="form-body">

            <form action="{{ route('password.update') }}" method="POST" class="row g-3">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email" value="{{ old('email', $request->email) }}" required autofocus
                        autocomplete="username">
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
                            name="password" id="inputChoosePassword" placeholder="Enter Password"  required autocomplete="new-password"> <a
                            href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group" id="show_hide_password">
                        <input type="password"
                            class="form-control border-end-0"
                            name="password_confirmation" id="password_confirmation" placeholder="Enter Password"
                            required autocomplete="new-password"> <a href="javascript:;" class="input-group-text bg-transparent"><i
                                class="bx bx-hide"></i></a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                    </div>
                </div>

            </form>
        </div>


    </div>
</x-guest-layout>
