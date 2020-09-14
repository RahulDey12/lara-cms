@section('title', 'All Posts')

<div class="-mx-3">
    <div class=" w-full flex justify-between items-center mb-3">
        <div class="">
            <a href="{{ route('dashboard.post.new') }}" class="bg-indigo-600 duration-150 ease-in-out hover:bg-indigo-500 inline-flex pr-4 px-3 py-2 text-white transition">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                Add New
            </a>
        </div>

        <div class=" inline-flex">
            <input wire:model.lazy='search' placeholder="Search..." class=" form-input placeholder-gray-600 placeholder-opacity-50 text-sm focus:border-indigo-600" wire:keydown.enter='postSearch'>
            <button class="ml-2 w-auto px-3 py-2 text-sm rounded-md font-medium text-white bg-indigo-600 border border-transparent hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out" wire:click='postSearch'>Search</button>
        </div>
    </div>

    <div class="rounded-md overflow-hidden w-full shadow-md">
        <table class="w-full border-collapse">
            <thead class="bg-gradient-to-r from-indigo-800 to-indigo-600 text-white p-3 uppercase text-left border-b">
                <tr>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Author</th>
                    <th class="px-4 py-3">Date</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($posts as $post)
                    <tr class=" hover:bg-gray-200">
                        <td class="px-5 py-4 text-lg text-cool-gray-700 border-b">{{ $post->title }}</td>
                        <td class="px-5 py-4 text-lg text-cool-gray-700 border-b">{{ $post->user->name }}</td>
                        <td class="px-5 py-4 text-lg text-cool-gray-700 border-b">{{ $post->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
