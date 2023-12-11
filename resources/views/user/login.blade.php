<x-layout>
    <div class='hold-transition login-page'>
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <h1>{{ __('messages.Login') }}</h1>
                </div>

                <div class="card-body">
                    <form action="{{ route('user.authenticate') }}" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email"
                                value="{{ old('email') }}" required>

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                                <span class="show-error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control"
                                placeholder="{{ __('messages.Password') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="offset-8 col-4">
                                <button type="submit"
                                    class="btn btn-primary btn-block">{{ __('messages.Sign In') }}</button>
                            </div>
                        </div>
                    </form>

                    @include('components.language-switch')

                </div>
            </div>
        </div>
    </div>
</x-layout>
