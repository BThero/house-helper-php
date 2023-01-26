<div>
    <div class="flex flex-row gap-4 mb-8">
        <button
            class="inline-flex items-center justify-center h-14 box-border px-8 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-transparent font-semibold bg-blue-700 text-white hover:bg-blue-600 focus:ring-blue-200 transition-colors duration-200 w-full xl:w-60 xl:order-1"
            wire:click.prevent="setSelected('login')"
        >Login
        </button>
        <button
            class="inline-flex items-center justify-center h-14 box-border px-8 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-transparent font-semibold bg-red-700 text-white hover:bg-red-600 focus:ring-red-200 transition-colors duration-200 w-full xl:w-60 xl:order-1"
            wire:click.prevent="setSelected('register')"
        >Register
        </button>
    </div>
    @if($selected === 'login')
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input-label class="text-gray-50 text-[20px] mb-2" for="username" :value="__('Username')"/>

                <x-text-input id="username" class="block mt-1 w-full text-gray-700 bg-gray-200" type="text"
                              name="username"
                              :value="old('username')" required autofocus/>

                <x-input-error :messages="$errors->get('username')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label class="text-gray-50 text-[20px] mb-2" for="password" :value="__('Password')"/>

                <x-text-input id="password" class="block mt-1 w-full text-gray-700 bg-gray-200"
                              type="password"
                              name="password"
                              required autocomplete="current-password"/>

                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                           name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    @endif

    @if($selected === 'register')
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-input-label class="text-gray-50 text-[20px] mb-2" for="username" :value="__('Username')"/>

                <x-text-input id="username" class="block mt-1 w-full text-gray-700 bg-gray-200" type="text"
                              name="username"
                              :value="old('username')" required autofocus/>

                <x-input-error :messages="$errors->get('username')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label class="text-gray-50 text-[20px] mb-2" for="email" :value="__('Email')"/>

                <x-text-input id="email" class="block mt-1 w-full text-gray-700 bg-gray-200" type="email" name="email"
                              :value="old('email')"
                              required/>

                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label class="text-gray-50 text-[20px] mb-2" for="password" :value="__('Password')"/>

                <x-text-input id="password" class="block mt-1 w-full text-gray-700 bg-gray-200"
                              type="password"
                              name="password"
                              required autocomplete="new-password"/>

                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label class="text-gray-50 text-[20px] mb-2" for="password_confirmation"
                               :value="__('Confirm Password')"/>

                <x-text-input id="password_confirmation" class="block mt-1 w-full text-gray-700 bg-gray-200"
                              type="password"
                              name="password_confirmation" required/>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    @endif
</div>
