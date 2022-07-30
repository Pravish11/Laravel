<x-guest-layout>
   
    <x-auth-card >

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        

        <form method="POST" action="{{ route('login') }}" class="formstyle">
            <h1>LOG IN</h1>
            @csrf

            <!-- Email Address -->
            <div>
                <!--x-label for="email" :value="__('Email')" /-->

                <x-input id="email" placeholder="Email address" class="inputstyle" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <!--x-label for="password" :value="__('Password')" /-->

                <x-input id="password" placeholder="Password" class="inputstyle"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
            <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <!-- Remember Me -->
            <!--div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div-->

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <!--a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a-->
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
        <div style="margin-left: 20%;"><h4 style="color: white;">NOT A MEMBER YET?</h4></div>
      <a href="{{url('registration')}}"><button style="margin-left: 18%;">Create an account</button></a>
        
    </x-auth-card>
</x-guest-layout>
