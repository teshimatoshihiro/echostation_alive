<x-guest-layout>
    <!-- 以下を追加 -->
@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </div>
@endif
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="username" :value="__('名前')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- is_requester -->
        <div class="mt-4">
            <x-input-label for="is_requester" :value="__('依頼する方はチェックを入れる、受託側は入れない')" />
            <input id="is_requester" type="checkbox" name="is_requester" :value="old('is_requester')">
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('再確認用password入力')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <!-- Speciality -->
        <div class="mt-4">
            <x-input-label for="speciality" :value="__('補助診断可能領域')" />
            <a>※複数選択はctrlやcmdキーを押しながら選んでください</a>
            <select id="speciality" name="speciality[]" class="block mt-1 w-full" multiple>
                <option value="心臓" @if(is_array(old('speciality')) && in_array('心臓', old('speciality'))) selected @endif>心臓</option>
                <option value="上腹部" @if(is_array(old('speciality')) && in_array('上腹部', old('speciality'))) selected @endif>上腹部</option>
                <option value="下腹部" @if(is_array(old('speciality')) && in_array('下腹部', old('speciality'))) selected @endif>下腹部</option>
            </select>
            <x-input-error :messages="$errors->get('speciality')" class="mt-2" />
        </div>


        <!-- Notes -->
    <div class="mt-4">
        <x-input-label for="notes" :value="__('資格')" />
        <select id="notes" name="notes" class="block mt-1 w-full">
            <option value="超音波専門医" {{ old('notes') == '超音波専門医' ? 'selected' : '' }}>超音波専門医</option>
            <option value="超音波検査士" {{ old('notes') == '超音波検査士' ? 'selected' : '' }}>超音波検査士</option>
            <option value="医師" {{ old('notes') == '医師' ? 'selected' : '' }}>医師</option>
            <option value="臨床検査技師" {{ old('notes') == '臨床検査技師' ? 'selected' : '' }}>臨床検査技師</option>
            <option value="放射線技師" {{ old('notes') == '放射線技師' ? 'selected' : '' }}>放射線技師</option>
            <option value="看護師" {{ old('notes') == '看護師' ? 'selected' : '' }}>看護師</option>
            <option value="その他" {{ old('notes') == 'その他' ? 'selected' : '' }}>その他</option>
        </select>
        <x-input-error :messages="$errors->get('notes')" class="mt-2" />
    </div>


        <!-- Skyway URL -->
        <div class="mt-4">
            <x-input-label for="skyway_url" :value="__('Skyway URL')" />
            <x-text-input id="skyway_url" class="block mt-1 w-full" type="text" name="skyway_url" :value="old('skyway_url')" />
            <x-input-error :messages="$errors->get('skyway_url')" class="mt-2" />
        </div>

        <!-- Region -->
<div class="mt-4">
    <x-input-label for="region" :value="__('居住区')" />
    <select id="region" name="region" class="block mt-1 w-full">
        <option value="北海道" {{ old('region') == '北海道' ? 'selected' : '' }}>北海道</option>
        <option value="東北" {{ old('region') == '東北' ? 'selected' : '' }}>東北</option>
        <option value="関東" {{ old('region') == '関東' ? 'selected' : '' }}>関東</option>
        <option value="中部" {{ old('region') == '中部' ? 'selected' : '' }}>中部</option>
        <option value="近畿" {{ old('region') == '近畿' ? 'selected' : '' }}>近畿</option>
        <option value="中国" {{ old('region') == '中国' ? 'selected' : '' }}>中国</option>
        <option value="四国" {{ old('region') == '四国' ? 'selected' : '' }}>四国</option>
        <option value="九州" {{ old('region') == '九州' ? 'selected' : '' }}>九州</option>
    </select>
    <x-input-error :messages="$errors->get('region')" class="mt-2" />
</div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
