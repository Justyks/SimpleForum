<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{$post->title}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                {{$post->text}}   
                </div>
            </div>
        </div>
    </div>
    @if(isset($comments))
    @foreach($comments as $comment)
    <div class="pb-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <a href="/user/{{$comment->user_id}}">{{$comment->user->name}} </a>
                </div>
                <div class="p-6 text-gray-900">
                {{$comment->text}}  
                
                <br>
                {{$comment->created_at}} 
                <br>
                @if($comment->user_id==Auth::id())
                    <a href="{{$post->id}}/{{$comment->id}}"><button>Удалить</button></a>
                    <a><button>Редактировать</button></a>
                @elseif(Auth::user()->role==1)
                    <a href="{{$post->id}}/{{$comment->id}}"><button>Удалить</button></a>
                    <a><button>Редактировать</button></a>
                @endif
               
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    <div class="pb-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <form class="w-full max-w-sm" action="" method="POST">
        @csrf
  <div class="flex items-center border-b border-teal-500 py-2">
    <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Комментарий" aria-label="Full name" name="comment">
    <button class="flex-shrink-0 bg-black hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-black py-1 px-2 rounded" type="submit">
      Оставить комментарий
    </button>
  </div>
</form>
    </div>
    </div>
</x-app-layout>
