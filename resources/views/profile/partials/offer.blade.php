<x-app-layout>
    <!-- タイトル「ECHO STATION」を追加 -->
    <h1 class="text-center text-6xl font-bold mb-6">ECHO STATION</h1>

    <!--受託アクティブ表示 -->
    <div class="mb-4 grid gap-4">
        <button class="px-4 py-2 bg-red-500 text-white rounded w-full">受託アクティブ　58人</button>
    </div>
<br>
<br>
<br>
<br>

    <!-- その他のボタン -->
    <div class="mb-4 grid gap-4">
    <a href="{{ route('mainoffer.show') }}">
        <button class="px-4 py-2 bg-blue-500 text-white rounded w-full">検査を依頼したい</button>
    </a>
    <!-- 他のボタンも同様に -->
</div>

    <div class="mb-4 grid gap-4">
        {{-- <button class="px-4 py-2 bg-blue-500 text-white rounded w-full">検査や補助を依頼したい</button> --}}
        <button class="px-4 py-2 bg-blue-500 text-white rounded w-full">エコーを学習したい</button>
        <button class="px-4 py-2 bg-blue-500 text-white rounded w-full">エコー依頼を受けたい</button>
    </div>
    <div>
        
    </div>

    {{-- <
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button> --}}
        </div>
    </form>
</x-guest-layout>
