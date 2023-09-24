<x-app-layout>

    <!-- バリデーションエラーの表示に使用 -->
     <x-errors id="errors" class="bg-blue-500 rounded-lg mx-auto mt-4 w-1/2">{{$errors}}</x-errors> 

    <!--全エリア[START]-->
        <!--中央エリア[START]--> 
        <div class="text-gray-700 text-center px-4 py-4 m-2 w-1/2">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-blue-500 font-bold">
                    検査依頼画面
                </div>
            </div>

            <!-- 本のタイトル -->
          
                @csrf

             <div class="flex flex-wrap justify-center mt-4">
   

                   {{-- 心臓ボタン --}}
 <div class="m-2">
    <x-button class="bg-blue-500" onclick="window.location.href='/matches/心臓'">{{ __('心臓') }}</x-button>
</div>

<!-- 上腹部ボタン -->
<div class="m-2">
    <x-button class="bg-blue-500" onclick="window.location.href='/matches/上腹部'">{{ __('上腹部') }}</x-button>
</div>

<!-- 下腹部ボタン -->
<div class="m-2">
    <x-button class="bg-blue-500" onclick="window.location.href='/matches/下腹部'">{{ __('下腹部') }}</x-button> 
</div>

                 
                </div>

                
                <div class="flex flex-col mt-4">
                    <div class="text-gray-700 text-center px-4 py-2 m-2">
                        <x-button class="bg-blue-500 rounded-lg">依頼</x-button>
                    </div>
                </div>

                <!-- 戻るボタン -->
                <div class="flex flex-col mt-4 mb-2">
                    <form action="{{ route('dashboard') }}" method="GET" class="w-full max-w-lg mx-auto">
                        <x-button class="bg-blue-100 text-red-900">{{ __('戻る') }}</x-button>
                    </form>
                </div>
            </form>
        </div>
        <!--中央エリア[END]--> 

    </div>
    <!--全エリア[END]-->

</x-app-layout>
