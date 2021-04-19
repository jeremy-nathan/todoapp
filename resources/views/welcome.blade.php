@extends('layouts.app')
{{-- {{ action="{{ route('todo.store') }}" --}}
@section('content')

    <div class="flex justify-center">
        <div class="w-8/12 bg-white shadow-md p-6 rounded-lg">
            <h1 class='text-3xl mb-6'>Todo App</h1>
            <form  method="post" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('body') border-red-500 @enderror" placeholder="Type here..."></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-green-500 shadow-md focus:outline-none focus:bg-green-600 text-white px-4 py-2 rounded font-medium">Add</button>
                </div>
            </form>
            <p>There are no todo items yet</p>
        </div>
    </div>

@endsection
