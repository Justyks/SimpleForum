<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Темы
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-1000">
                    <ul>
                    @if(isset($categories))
                        @foreach($categories as $category)
                        <li><a href="/dashboard/{{$category->id}}">{{$category->name}}</a></li>
                        @endforeach
                    @elseif(isset($posts))
                        @foreach($posts as $post)
                        <li><a href="/dashboard/{{$post->category_id}}/{{$post->id}}">{{$post->title}}</a></li>
                        @endforeach
                       
                        <div class="py-12">
                         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <form class="w-full max-w-sm" action="" method="POST">
                              @csrf
                            <div class="flex items-center border-b border-teal-500 py-2">
                            <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Заголовок" aria-label="Full name" name="title">
                            <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Текст" aria-label="Full name" name="text">
                                <button class="flex-shrink-0 bg-black hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-black py-1 px-2 rounded" type="submit">
                                    Добавить тему
                                </button>
                            </div>
                            </form>
                         </div>
                        </div>
                        {{$posts->links()}}
                    @elseif(isset($user))
                        {{$user->id}}
                        {{$user->name}}
                        {{$user->created_at}}
                    @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
