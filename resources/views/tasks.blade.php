@extends('layouts.app')

@section('content')

    <h1 class="py-6 text-5xl text-center">Simple Todo List</h1>

    <div class="w-11/12 mx-auto">

        {{-- add a new task --}}

        <form action="/add" method="post" class="flex">
            @csrf
            <input type="text" name="task" class="w-10/12 h-10 rounded-sm">
            <button type="submit" class="w-2/12 mx-auto bg-blue-400 rounded-sm">Add Task</button>
        </form>

        {{-- show error messages --}}

        @if (count($errors) > 0)
            <div x-data="{ messageVisible: true }">
                <div x-show="messageVisible" x-transition x-init="setTimeout(() => messageVisible = false, 3000)"
                    class="flex flex-row justify-between w-full px-5 py-2 mt-3 bg-red-400 rounded-sm">
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li><strong>{{ $error }}</strong></li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <button @click="messageVisible = false"><sup><strong>×</strong></sup></button>
                    </div>
                </div>
            </div>
        @endif

        {{-- show success messages --}}

        @if ($message = Session::get('success'))
            <div x-data="{ messageVisible: true }">
                <div x-show="messageVisible" x-transition x-init="setTimeout(() => messageVisible = false, 3000)"
                    class="flex flex-row justify-between w-full px-5 py-2 mt-3 bg-green-500 rounded-sm">
                    <div>
                        <strong>{{ $message }}</strong>
                    </div>
                    <div>
                        <button @click="messageVisible = false"><sup><strong>×</strong></sup></button>
                    </div>
                </div>
            </div>
        @endif

    </div>

    <table class="w-full mt-3 text-center table-fixed">
        <thead>
            <tr>
                <th class="w-10">#</th>
                <th class="">Task</th>
                <th class="w-10 ">Edit</th>
                    <th class="w-10 ">[x]</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)

                <tr class="hover:bg-gray-800 hover:text-gray-200">
                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td class="text-left">{{ $task->task }}</td>

                    <td>

                        {{-- Update a Task --}}

                        <div x-data="{ open: false }">
                            <button @click="open = !open" class="px-1 py-1 text-gray-800 bg-yellow-400 rounded-sm">
                                Edit
                            </button>


                            <div x-show="open" x-cloak=""
                                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75">
                                <div @click.away="open = false"
                                    class="relative p-8 mb-24 text-gray-800 bg-gray-200 rounded shadow-lg">
                                    <button class="absolute top-0 right-0 px-3 py-1" @click="open = false">x</button>

                                    <form action="/edit" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $task->id }}">
                                        <input type="text" name="editedTask" placeholder="{{ $task->task }}" required>
                                        <button type="submit" class="text-gray-800 bg-yellow-400 rounded-sm">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td>

                        {{-- Delete a Task --}}

                        <form action="/delete" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $task->id }}">
                            <button type="submit" class="px-1 py-1 text-gray-800 bg-red-600 rounded-sm">[x]</button>
                        </form>
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>


@endsection
