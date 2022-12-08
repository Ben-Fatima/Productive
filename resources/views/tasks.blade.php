<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
          href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
          crossorigin="anonymous"/>
    <title>Productive</title>
</head>
<body>
<div class="w-9/12 mx-auto">
    <h1 class="text-3xl font-bold underline text-center py-12">To Do</h1>
    <form
        method="POST"
        action="/create"
        enctype="multipart/form-data"
        class="w-2/3 mx-auto flex"
    >
        @csrf
        <input class="px-4 py-2 border rounded flex-grow" name="title">
        <button class="py-2 px-4 text-center border rounded bg-blue-500" type="submit">
            Add
        </button>
    </form>
    <div class="mx-auto w-2/3">
        @foreach($tasks as $task)
            @if($task->status == 'doing')
                <div class="border px-4 py-2 my-2 rounded flex">
                    <div class="flex-grow">
                        {{$task->title}}
                    </div>
                    <div class="space-x-4">
                        <i class="cursor-pointer fas fa-pen"></i>
                        <form method="POST" action="/delete/{{$task->id}}" class="inline-block">
                            @method('DELETE') @csrf
                            <button class="inline-block" type="submit">
                                <i class="cursor-pointer fas fa-trash"></i>
                            </button>
                        </form>
                        <form method="POST" action="/{{$task->id}}" class="inline-block">
                            @csrf
                            <button class="inline-block" type="submit">
                                <i class="cursor-pointer fas fa-check"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="mx-auto w-2/3">
        @foreach($tasks as $task)
            @if($task->status == 'done')
                <div class="border px-4 py-2 my-2 rounded flex bg-gray-500">
                    <div class="text-gray-800 line-through flex-grow">
                        {{$task->title}}
                    </div>
                    <div class="space-x-4">
                        <form method="POST" action="/delete/{{$task->id}}" class="inline-block">
                            @method('DELETE') @csrf
                            <button class="inline-block" type="submit">
                                <i class="cursor-pointer fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
</body>
</html>
