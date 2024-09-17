<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Your Note') }}
            </h2>
        </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-5 text-gray-900 max-w-4xl mx-auto flex flex-col">
                    @if ($errors -> any())
                        <div class="text-center pb-2 text-red-500">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> {{$error}} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('notes.update', $note)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <textarea 
                            id="note"
                            name="note" 
                            class="rounded-lg border w-full min-h-40">{{ $note->note }}</textarea>
                        <div class="flex justify-between mt-2">
                            <div class="mr-auto">
                                <x-danger-button form="deleteNote">
                                    Delete
                                </x-danger-button>
                            </div>
                            <div>
                                <x-secondary-button onclick="document.getElementById('note').value=''">
                                    Clear
                                </x-secondary-button>
                                <x-primary-button type="submit">
                                    Update
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                    <form id="deleteNote" action="{{route('notes.destroy', $note)}}" method="POST">
                        @csrf 
                        @method('DELETE')
                        <input name="noteId" type="hidden" value="{{$note->id}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>