<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('マッチング一覧') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-pink-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("ログインしています") }}
                </div>
            </div>
        </div>
    </div>

    <div class="container bg-pink-100 p-6">
        <h1 class="text-pink-600 font-bold text-2xl">マッチング医師・技師一覧</h1>

        <table class="table mt-4 border-collapse w-full">
            <thead>
                <tr class="bg-pink-200">
                    <th class="border p-2 text-pink-700">ユーザー名</th>
                    <th class="border p-2 text-pink-700">専門領域</th>
                    <th class="border p-2 text-pink-700">資格</th>
                    <th class="border p-2 text-pink-700">skyway_url</th>
                </tr>
            </thead>
            <tbody>
                @if(!isset($matches) || $matches->isEmpty())
                    <tr>
                        <td colspan="2" class="border p-2 text-center text-pink-600">マッチしたユーザーはいません。</td>
                    </tr>
                @else
                    @foreach($matches as $user)            
                    <tr class="hover:bg-pink-50">
                       
                        <td class="border p-2">
    <a href="{{ route('skyway.show', $user->id) }}" class="text-blue-500 hover:underline">{{ $user->username }}</a>
</td>

                        <td class="border p-2">{{ $user->speciality }}</td>
                        <td class="border p-2">{{ $user->notes }}</td>
                        <td class="border p-2">{{ $user->skyway_url }}</td>


                        
                        
                        
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

   <a href="{{ route('skyway.show') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    Skywayへ
</a>


</x-app-layout>
