<x-slot name="title">All Posts</x-slot>

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
                    <th class="px-4 py-3">Create At</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($posts as $post)
                    <tr class=" hover:bg-gray-200">
                        <td class="px-5 py-4 text-lg text-cool-gray-700 border-b">{{ $post->short_title }}</td>
                        <td class="px-5 py-4 text-lg text-cool-gray-700 border-b">
                            <div class="inline-flex items-center">
                                {{ $post->user->name }}
                            </div>
                        </td>
                        <td class="px-5 py-4 text-lg text-cool-gray-700 border-b">{{ $post->created_at->format('d/m/Y') }}</td>
                        <td class="px-5 py-4 text-lg border-b">
                            <div class="inline-flex align-middle">
                                <a href="#" class="bg-indigo-500 text-white inline-block p-2 rounded-sm focus:outline-none hover:bg-indigo-700 transition ease-in duration-100 mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                </a>

                                <button class="bg-red-500 text-white p-2 rounded-sm focus:outline-none hover:bg-red-700 transition ease-in duration-100 mr-2" wire:click="$emit('postDelete', {{ $post->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <a href="#" class="bg-green-500 text-white inline-block p-2 rounded-sm focus:outline-none hover:bg-green-700 transition ease-in duration-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
