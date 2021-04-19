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
                    <p class="text-xl mb-1">{{$item->title}}</p>
                @endforeach
            @else
                <p class="text-xl mb-1">There are no todo items yet. Feel free to add one now!</p>
            @endif
        </div>
    </div>

@endsection
