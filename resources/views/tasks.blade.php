@extends('layouts.app')

@section('content')
    
    <h1 class="text-5xl text-center py-6">Simple Todo List</h1>

    <div class="w-11/12 mx-auto">
        <form action="/add" method="post" class="flex">
            @csrf
            <input type="text" name="task" class="w-10/12 h-10 rounded-sm">
            <button type="submit" class="mx-auto bg-blue-400 w-2/12 rounded-sm">Add Task</button>
        </form>
    </div>

    <table class="table-fixed w-full text-center mt-3">
        <thead>
            <tr>
                <th class="w-10">#</th>
                <th class="">Task</th>
                <th class="w-10">Edit</th>
                <th class="w-10">[x]</th>
            </tr>
        </thead>
        <tbody>

            @php
                $id = 1
            @endphp

            @foreach ($tasks as $task)
            <tr class="hover:bg-gray-800 hover:text-gray-200">
                <td>
                    {{ $id }}
                </td>

                <td class="text-left">{{ $task->task }}</td>
                
                <td>
                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="bg-yellow-400 text-gray-800 rounded-sm px-1 py-1">
                            Edit
                        </button>

                        <div x-show="open" x-cloak="" class="fixed flex justify-center items-center inset-0 z-50 bg-black bg-opacity-75">
                            <div @click.away="open = false" class="bg-gray-200 text-gray-800 rounded shadow-lg p-8 mb-24 relative">
                                <button class="absolute right-0 top-0 px-3 py-1" @click="open = false">x</button>
                                
                                <form action="/edit" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $task->id }}">
                                    <input type="text" name="editedTask" placeholder="{{ $task->task }}" required>
                                    <button type="submit" class="bg-yellow-400 text-gray-800 rounded-sm">Edit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
                
                <td>
                    <a href="delete/{{ $task->id }}" class="bg-red-600 text-gray-800 rounded-sm px-1 py-1">
                        [x]
                    </a>
                </td>
            </tr>
                @php
                    $id++
                @endphp
            @endforeach

        </tbody>
    </table>


@endsection