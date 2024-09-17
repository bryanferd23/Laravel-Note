<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Notes') }}
            </h2>
            <a class="text-sm font-semibold" href="{{route('notes.create')}}">
                {{ __('+ New Note') }}
            </a>
        </div>
        
    </x-slot>

    
    @if(Session::has('message'))
        <div class="text-center py-4 lg:px-4">
            <div id="alert" class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex opacity-100 transition-opacity duration-500 ease-in-out" role="alert">
                <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Alert:</span>
                <span class="font-semibold mr-2 text-left flex-auto">{{ session('message') }}</span>
            </div>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table-auto text-center w-full table-bordered">
                    <thead>
                        <tr class="bg-gray-600 text-white">
                            <th>
                                <div>Note</div>
                            </th>
                            <th>
                                <div>Action</div>
                            </th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @foreach ($notes as $note)
                        <tr>
                            <td class="p-4 border-t border-slate-200">
                                <div class="overflow-hidden max-w-4xl">{{ $note->note }}</div>
                            </td>
                            <td class="p-4 border-t border-slate-200">
                                <a
                                    href="notes/{{ $note->id }}"
                                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700"
                                >
                                    Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pt-2">
                {{ $notes->links() }}
            </div>
        </div>
    </div>
    <script>
        // Check if the alert exists in the DOM
        const alertBox = document.getElementById('alert');
    
        // Apply fade-out effect after 5 seconds
        if (alertBox) {
            setTimeout(() => {
                alertBox.classList.add('opacity-0'); // Add class to start fade-out
                alertBox.classList.remove('opacity-100'); // Ensure full opacity is removed
    
                // Optionally, remove the element from the DOM after fade-out
                setTimeout(() => {
                    alertBox.style.display = 'none'; // Hide it completely after the fade-out
                }, 500); // Wait for the fade effect to complete
            }, 5000); // Start the fade-out after 5 seconds
        }
    </script>
</x-app-layout>