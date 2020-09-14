@section('title', 'Add New Post')

<div class=" flex flex-row -mx-3">
    <div class="w-4/5 px-3">
        <div class="mb-4">
            <input wire:model="title" type="text" placeholder="Add Title" class="w-full form-input focus:border-indigo-600 mb-1">
            @error('title')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        
        <div wire:ignore>
            <livewire:common.editor :data="$body" />
        </div>
        @error('body')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>
    
    <div class="w-1/5 px-3">
        <div class="w-full shadow-sm bg-white mb-10">
            <div class="w-full border-b border-gray-200 px-3 py-2">
                <p class=" font-bold text-gray-500">Publish</p>
            </div>

            <div class="py-3 px-4">
                <ul>
                    <li x-data="{editOpen: false}">
                        <div class="flex flex-row align-middle items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-cool-gray-500 mr-2">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Visibility: <strong>{{ $visibility }}</strong> <a x-show="!editOpen" href="#" class="text-sm text-blue-500 underline" @click.prevent="editOpen = true">Edit</a></span>
                        </div>

                        <div x-show.transition="editOpen">
                            <label class="inline-flex items-center">
                                <input type="radio" name="visibility" value="Public" class="form-radio h-5 w-5 text-indigo-600" wire:model="visibility"><span class="ml-2 text-gray-700">Public</span>
                            </label>
                            <br>
                            <label class="inline-flex items-center">
                                <input type="radio" name="visibility" value="Private" class="form-radio h-5 w-5 text-indigo-600" wire:model="visibility"><span class="ml-2 text-gray-700">Private</span>
                            </label>
                            <br>
                            <a href="#" @click.prevent="editOpen = false" class="text-sm text-blue-500 underline">Close</a>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="py-3 px-4 bg-gray-100">
                <button wire:offline.attr="disabled" class="flex ml-auto w-auto px-3 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out" wire:click="publish">Publish</button>
            </div>
        </div>

        <div class="w-full shadow-sm bg-white">
            <div class="w-full border-b border-gray-200 px-3 py-2">
                <p class=" font-bold text-gray-500">Feture Image</p>
            </div>
    
            <div class="py-3 px-5">
                @if ($photo && in_array($photo->guessExtension(), ['jpeg', 'png', 'gif', 'bmp', 'svg', 'webp']))
                    <img src="{{ $photo->temporaryUrl() }}" class="w-full mb-2">
                @endif

                <p wire:loading wire:target='photo' class="text-gray-500 text-xs italic mb-2 w-full">Uploading...</p>

                @error('photo')
                    <p class="text-red-500 text-xs italic mb-2">{{ $message }}</p>
                @enderror

                <a href="#" class="text-blue-500 underline text-sm" @click.prevent="document.querySelector('#ImageInput').click()">@if($photo) Select Different Image @else Set feture image @endif</a>
                <input type="file" wire:model='photo' class="hidden" id="ImageInput">
            </div>
        </div>
    </div>
</div>
