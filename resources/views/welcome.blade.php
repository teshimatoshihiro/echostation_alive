<x-guest-layout>
    <!-- タイトル「ECHO STATION」を追加 -->
    <h1 class="text-center text-20xl font-bold mb-6">ECHO STATION 登録画面</h1>

    

    <!-- 依頼医用のregisterとloginボタン -->
    <div class="mb-4">
        {{-- <span class="text-lg">依頼医用　　　　：</span>
      
        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-500 text-black rounded mr-2">新規登録</a> --}} 
        {{-- <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-500 text-black rounded">Log in</a> --}}


    </div>

    <!-- 受託医（技師）用のregisterとloginボタン -->
    <div class="mb-4">
         <span class="text-lg"></span> 
       
        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-500 text-black rounded mr-2">新規登録</a>
         
         {{-- <a href="{{ route('login') }}" class="px-4 py-2 bg-red-500 text-black rounded">Log in</a> --}}

    </div> 

    <!-- その他のボタン -->
    <div class="mb-4 grid gap-4">
        <button class="px-4 py-2 bg-blue-500 text-white rounded w-full">検査や補助を依頼したい</button>
        <button class="px-4 py-2 bg-blue-500 text-white rounded w-full">エコーを学習したい</button>
        <button class="px-4 py-2 bg-blue-500 text-white rounded w-full">エコー依頼を受けたい</button>
    </div>
    <div>
        　　登録後は以下にEmailとPasswordを入力して<br>
        　　　　　　　　　　　　　LOG INしてください
    </div>

    <!-- 元のログインフォーム -->
      {{-- <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-500 text-black rounded">Log in</a> --}}
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
