@extends('layouts.app')

@section('content')

    <div class="flex justify-center">
        <div class="w-8/12 bg-white shadow-md p-6 rounded-lg">
            <h1 class='text-3xl mb-6 text-center'>Todo App</h1>
            <form action="{{ route('todo.store') }}" method="post" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="title" class="sr-only">Body</label>
                    <textarea name="title" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('title') border-red-500 @enderror" placeholder="Type here..."></textarea>

                    @error('title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-green-500 shadow-md focus:outline-none focus:bg-green-600 text-white px-4 py-2 rounded font-medium">Add</button>
                </div>
            </form>
            <h2 class="text-2xl mb-2">List of Todo Items:</h2>

            @if ($todo->count())
                @foreach ($todo as $item)
                <div class="flex items-center w-full">
                    @if ($item->completed == 0)
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <polyline points="9 6 15 12 9 18" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                    @endif
                    <p class="text-xl mb-1 place-self-center pl-5">{{$item->title}}</p>
                </div>
                <div class="flex pb-5 pl-16">
                    @if ($item->completed == 0)

                    <form class="mb-2 mr-2" action="{{ route('todo.update',$item->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <input name='completed' type="text" value="1" hidden>
                        <button class="text-green-500" type="submit">Mark as complete</button>
                    </form>

                    @else

                    <form class="mb-2 mr-2" action="{{ route('todo.update',$item->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <input name='completed' type="text" value="0" hidden>
                        <button class="text-yellow-500" type="submit">Mark as incomplete</button>
                    </form>

                    @endif
                    <form action="{{ route('todo.destroy',$item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="4" y1="7" x2="20" y2="7" />
                                <line x1="10" y1="11" x2="10" y2="17" />
                                <line x1="14" y1="11" x2="14" y2="17" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg>
                        </button>
                    </form>
                </div>
                @endforeach
            @else
                <p class="text-xl mb-1">There are no todo items yet. Feel free to add one now!</p>
            @endif
        </div>
    </div>

@endsection
