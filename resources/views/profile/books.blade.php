<!-- resources/views/books.blade.php -->
<x-app-layout>

    <!--ヘッダー[START]-->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <form action="{{ route('book_index') }}" method="GET" class="w-full max-w-lg">
                <x-button class="bg-gray-100 text-gray-900">{{ __('Dashboard') }}</x-button>
            </form>
        </h2>
    </x-slot>
    <!--ヘッダー[END]-->
            
        <!-- バリデーションエラーの表示に使用-->
       <x-errors id="errors" class="bg-blue-500 rounded-lg">{{$errors}}</x-errors>
        <!-- バリデーションエラーの表示に使用-->
    
    <!--全エリア[START]-->
    <div class="flex bg-gray-100">

        <!--左エリア[START]--> 
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.webrtc.ecl.ntt.com/skyway-latest.js"></script>
      <!-- Include the following line to use Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <body class="bg-gray-100">
  <div class="container mx-auto py-10">
    <div class="grid grid-cols-3 gap-6">
      <div class="col-span-2">
        <div class="bg-white p-4 rounded shadow h-screen">
          <video id="my-video" class="w-full rounded" autoplay muted playsinline></video>
          <p id="my-id" class="mt-2 font-semibold"></p>
          <input id="their-id" class="w-full p-2 mt-2 border rounded" placeholder="相手のID">
          <button id="make-call"
            class="block w-full mt-4 bg-blue-500 text-white rounded p-2 hover:bg-blue-600">発信</button>
          <button id="share-screen"
            class="block w-full mt-2 bg-green-500 text-white rounded p-2 hover:bg-green-600">画面共有</button>
          <button id="stop-screen"
            class="block w-full mt-2 bg-red-500 text-white rounded p-2 hover:bg-red-600">共有停止</button>
        </div>
      </div>
      <div class="col-span-1">
        <div class="bg-white p-4 rounded shadow h-screen">
          <video id="their-video" class="w-full rounded" autoplay muted playsinline></video>
          <ul id="output" class="mt-4 h-96 overflow-y-auto space-y-2"></ul>
        </div>
      </div>
    </div>

    <script>
    const peer = new Peer({
      key: '36ea4af8-1f7c-4547-9ea9-76ab725c2959',
      debug: 3
    });

    peer.on('open', () => {
      document.getElementById('my-id').textContent = `Your ID: ${peer.id}`;
    });

    let localStream;
    let screenStream;

    navigator.mediaDevices.getUserMedia({ video: true, audio: true })
      .then(stream => {
        const videoElm = document.getElementById('my-video');
        videoElm.srcObject = stream;
        videoElm.play();
        localStream = stream;
      }).catch(error => {
        console.error('mediaDevice.getUserMedia() error:', error);
        return;
      });

    document.getElementById('make-call').onclick = () => {
      const theirID = document.getElementById('their-id').value;
      const mediaConnection = peer.call(theirID, localStream);
      setEventListener(mediaConnection);
    };

    document.getElementById('share-screen').onclick = async () => {
      try {
        screenStream = await navigator.mediaDevices.getDisplayMedia({ video: true });
        const videoElm = document.getElementById('my-video');
        videoElm.srcObject = screenStream;
        videoElm.play();
      } catch (error) {
        console.error('getDisplayMedia() error:', error);
      }
    };

    document.getElementById('stop-screen').onclick = () => {
      if (screenStream) {
        const tracks = screenStream.getTracks();
        tracks.forEach(track => track.stop());
        const videoElm = document.getElementById('my-video');
        videoElm.srcObject = localStream;
        videoElm.play();
      }
    };

    const setEventListener = mediaConnection => {
      mediaConnection.on('stream', stream => {
        const videoElm = document.getElementById('their-video');
        videoElm.srcObject = stream;
        videoElm.play();
      });
    }

    peer.on('call', mediaConnection => {
      mediaConnection.answer(localStream);
      setEventListener(mediaConnection);
    });

    peer.on('error', err => {
      alert(err.message);
    });

    peer.on('close', () => {
      alert('通信が切断しました。');
    });
</script>

        <div class="text-gray-700 text-left px-4 py-4 m-2">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-500 font-bold">
                    本を管理する
                </div>
            </div>


            <!-- 本のタイトル -->
            <form action="{{ url('books') }}" method="POST" class="w-full max-w-lg">
                @csrf
                  <div class="flex flex-col px-2 py-2">
                   <!-- カラム１ -->
                    <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                       Book Name
                      </label>
                      <input name="item_name" class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">
                    </div>
                    <!-- カラム２ -->
                    <div class="w-full md:w-1/1 px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        金額
                      </label>
                      <input name="item_amount" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    </div>
                    <!-- カラム３ -->
                    <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        数
                      </label>
                      <input name="item_number" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    </div>
                    <!-- カラム４ -->
                    <div class="w-full md:w-1/1 px-3 mb-6 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        発売日
                      </label>
                      <input name="published" type="date" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    </div>
                  </div>
                  <!-- カラム５ -->
                  <div class="flex flex-col">
                      <div class="text-gray-700 text-center px-4 py-2 m-2">
                             <x-button class="bg-blue-500 rounded-lg">送信</x-button>
                      </div>
                   </div>
            </form>
        </div>
        <!--左エリア[END]--> 
    
    
       <!--右側エリア[START]-->
               <div>
            {{ $books->links()}}
        </div>
    <div class="flex-1 text-gray-700 text-left bg-blue-100 px-4 py-2 m-2">
         <!-- 現在の本 -->
        @if (count($books) > 0)
            @foreach ($books as $book)
                <x-collection id="{{ $book->id }}">{{ $book->item_name }}</x-collection>
            @endforeach
        @endif
    </div>
    <!--右側エリア[[END]-->          

</div>
 <!--全エリア[END]-->

</x-app-layout>