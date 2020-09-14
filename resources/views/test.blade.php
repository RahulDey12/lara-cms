@extends('layouts.base')
@section('body')
<div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">
    <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>
    <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
        <div class="flex items-center justify-center mt-8">
            <div class="flex items-center">
                <svg class="h-12 w-12" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z" fill="#4C51BF" stroke="#4C51BF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z" fill="white"/>
                </svg>
                <span class="text-white text-2xl mx-2 font-semibold">Dashboard</span>
            </div>
        </div>
        <nav class="mt-10">
            <a class="flex items-center mt-4 py-2 px-6 block border-l-4 bg-gray-600 bg-opacity-25 text-gray-100 border-gray-100" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5">
                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                </svg>
                <span class="mx-4">Dashboard</span>
            </a>
            <a class="flex items-center mt-4 py-2 px-6 block border-l-4 border-gray-900 text-gray-500 hover:bg-gray-600 hover:bg-opacity-25 hover:text-gray-100" href="/ui-elements">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5">
                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span class="mx-4">UI Elements</span>
            </a>
            <a class="flex items-center mt-4 py-2 px-6 block border-l-4 border-gray-900 text-gray-500 hover:bg-gray-600 hover:bg-opacity-25 hover:text-gray-100" href="/tables">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5">
                    <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                </svg>
                <span class="mx-4">Tables</span>
            </a>
            <a class="flex items-center mt-4 py-2 px-6 block border-l-4 border-gray-900 text-gray-500 hover:bg-gray-600 hover:bg-opacity-25 hover:text-gray-100" href="/forms">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                </svg>
                <span class="mx-4">Forms</span>
            </a>
        </nav>
    </div>
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-600">
            <div class="flex items-center">
                <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="relative mx-4 lg:mx-0">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input class="form-input w-32 sm:w-64 rounded-md pl-10 pr-4 focus:border-indigo-600" type="text" placeholder="Search">
                </div>
            </div>
            <div class="flex items-center">
                <button class="flex mx-4 text-gray-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                      </svg>
                </button>
                <div x-data="{ dropdownOpen: false }"  class="relative">
                    <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                    <img class="h-full w-full object-cover" src="https://images.unsplash.com/photo-1528892952291-009c663ce843?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=296&q=80" alt="Your avatar">
                    </button>
                    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>
                    <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Products</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Logout</a>
                    </div>
                </div>
            </div>
        </header>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="w-full mx-auto px-6 py-8">
                <h1 class=" text-3xl text-gray-700 font-medium mb-4">Table</h1>

                <div class="rounded-md overflow-hidden shadow-md">
                    <table class="w-full border-collapse">
                        <thead class="bg-gradient-to-r from-indigo-800 to-indigo-600 text-white p-3 uppercase text-left border-b">
                            <tr>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Income</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr class=" hover:bg-gray-200">
                                <td class="px-5 py-4 text-lg text-cool-gray-700 border-b">Rahul</td>
                                <td class="px-5 py-4 text-lg text-cool-gray-700 border-b">rahul900day@gmail.com</td>
                                <td class="px-5 py-4 text-lg text-cool-gray-700 border-b">8000</td>
                            </tr>

                            <tr class=" hover:bg-gray-200">
                                <td class="px-5 py-4 text-lg text-cool-gray-700 border-b">Rahul</td>
                                <td class="px-5 py-4 text-lg text-cool-gray-700 border-b">rahul900day@gmail.com</td>
                                <td class="px-5 py-4 text-lg text-cool-gray-700 border-b">8000</td>
                            </tr>

                            <tr class=" hover:bg-gray-200">
                                <td class="px-5 py-4 text-lg text-cool-gray-700 border-b">Rahul</td>
                                <td class="px-5 py-4 text-lg text-cool-gray-700 border-b">rahul900day@gmail.com</td>
                                <td class="px-5 py-4 text-lg text-cool-gray-700 border-b">8000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection