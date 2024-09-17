<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('New Note') }}
            </h2>
        </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-5 text-gray-900 max-w-4xl mx-auto">
                        @if ($errors -> any())
                        <div class="text-center pb-2 text-red-500">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> {{$error}} </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    <form action="{{route('notes.store')}}" method="POST">
                        @csrf
                        <textarea 
                        id="note"
                        name="note" 
                        placeholder="What's on your mind?"
                        class="rounded-lg border w-full min-h-40"></textarea>
                        <div class="flex justify-end mt-2">
                            <x-secondary-button onclick="document.getElementById('note').value=''">
                                Clear
                            </x-secondary-button>

                            <div class="ml-5">
                                <x-primary-button type="submit">
                                    Submit
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>