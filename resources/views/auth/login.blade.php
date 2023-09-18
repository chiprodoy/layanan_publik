<x-auth-layout>
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>
    <!-- Loader ends-->
    <!-- error page start //-->
    <section>
        <div class="container-fluid">
            <div class="row">
                {{-- <div class="col-xl-5">
                    <img class="bg-img-cover bg-center" src="http://localhost/viho/theme/public/assets/images/login/3.jpg" alt="looginpage" />
                </div> --}}
                {{-- <div class="col-xl-7 p-0"> --}}
                <div class="col-12">
                    <x-viho::login-card>
                        <form method="POST" class="theme-form login-form" id="loginform" action="{{ route('login') }}">
                            <x-auth-validation-errors class="alert-light" :errors="$errors" />

                            @csrf
                            <h4>Login</h4>
                            <h6>Welcome back! Log in to your account.</h6>

                            <x-viho::form-group>
                                <label>User Name</label>
                                <x-viho::form.input-email name="email" id="email" required placeholder="Test@gmail.com" />
                            </x-viho::form-group>
                            <x-viho::form-group>
                                <label>Password</label>
                                <x-viho::form.input-password name="password" id="password" required placeholder="Password" />
                            </x-viho::form-group>
                            <x-viho::form-group>
                                {{-- <div class="checkbox">
                                    <input type="checkbox" name="remember" id="remember_me" />
                                    <label class="text-muted" for="remember_me">{{ __('Remember me') }}</label>
                                </div> --}}



                            </x-viho::form-group>
                            <x-viho::form-group>
                                <div class="row">
                                <button type="submit" class="btn btn-primary" >{{ __('Log in') }}</button>
                                </div>
                            </x-viho::form-group>
                            @if (Route::has('register'))
                                <p>Belum Punya Akun?<a class="ms-2" href="{{ route('register')}}">Silahkan Mendaftar</a></p>
                            @endif

                            @if (Route::has('password.request'))
                                <p><a class="link" href="{{ route('password.request')}}">{{ __('Lupa password?') }}</a></p>
                            @endif
                        </form>
                    </x-viho::login-card>
                </div>
            </div>
        </div>
    </section>

</x-auth-layout>
