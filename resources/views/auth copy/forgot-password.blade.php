<x-guest-layout>
    <div class="p-3">
        <div class="text-center">
            <img src="assets/images/icons/forgot-2.png" width="100" alt="" />
        </div>
        <h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
        @if (session('status'))
            <div class=" text-success">
                {{ session('status') }}
            </div>
        @else
            <p class="text-muted">Enter your registered email ID to reset the password</p>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="my-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>





         
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Send</button>
                <a href="{{ route('login') }}" class="btn btn-light"><i class='bx bx-arrow-back me-1'></i>Back to
                    Login</a>
            </div>
        </form>
    </div>
</x-guest-layout>
