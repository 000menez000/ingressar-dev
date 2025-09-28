@extends('layouts.app')

@section('content')
    <section class="pt-20">
        <div class="p-8 mx-auto max-w-2xl rounded-lg shadow dark:border dark:bg-gray-800 dark:border-gray-700">
            <h1 class="text-3xl font-bold dark:text-white mb-10 ">Editar Filme</h1>
            <form method="POST" action="{{ route('hubflix.movies.update', $movie->movie_id) }}">
                @method('PUT')
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título</label>
                        <input 
                            type="text" 
                            name="title" 
                            id="name" 
                            class="
                                @error('title')
                                    @include('partials.ui.input.styles.input-error')
                                @else
                                    @include('partials.ui.input.styles.input-normal')
                                @enderror
                                block w-full p-2.5 
                                text-sm rounded-lg 
                            " 
                            placeholder="Título do filme aqui" 
                            required=""
                            value="{{ old('title', $movie->title) }}"
                        >
                        @error('title')
                            @include('partials.ui.input.input-msg-error', ["message" => $message])
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="duration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duração</label>
                        
                        <div class="relative">
                            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <input 
                                type="time" 
                                name="duration" 
                                id="price" 
                                class="
                                    @error('duration')
                                        @include('partials.ui.input.styles.input-error')
                                    @else
                                        @include('partials.ui.input.styles.input-normal')
                                    @enderror 
                                    block w-full p-2.5 
                                    text-sm 
                                    rounded-lg 
                                    border
                                    leading-none
                                "  
                                required=""
                                max="05:00"
                                value="{{ old('duration', $movie->formatted_duration) ?? '00:00' }}"
                            >
                        </div>

                        
                        @error('duration')
                            @include('partials.ui.input.input-msg-error', ["message" => $message])
                        @enderror

                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
                        <select 
                            id="category" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            name="category"
                        >
                            @foreach ($categories as $category)
                                <option {{ old('category', $movie->categories[0]->category_id) == $category->category_id ? "selected" : "" }} value="{{ $category->category_id }}">{{ $category->description }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="w-full max-w-[16rem]">
                        <div class="relative">
                            <label for="npm-install-copy-button" class="sr-only">Label</label>
                            <input id="npm-install-copy-button" type="text" class="col-span-6 bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="npm install flowbite" disabled readonly>
                            <button data-copy-to-clipboard-target="npm-install-copy-button" data-tooltip-target="tooltip-copy-npm-install-copy-button" class="absolute end-2 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg p-2 inline-flex items-center justify-center">
                                <span id="default-icon">
                                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"/>
                                    </svg>
                                </span>
                                <span id="success-icon" class="hidden">
                                    <svg class="w-3.5 h-3.5 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                    </svg>
                                </span>
                            </button>
                            <div id="tooltip-copy-npm-install-copy-button" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                <span id="default-tooltip-message">Copy to clipboard</span>
                                <span id="success-tooltip-message" class="hidden">Copied!</span>
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="sm:col-span-2">
                        <label for="image_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL da Imagem</label>
                        <input 
                            type="text" 
                            name="image_url" 
                            id="item-weight" 
                            class=" 
                                @error('image_url')
                                    @include('partials.ui.input.styles.input-error')
                                @else
                                    @include('partials.ui.input.styles.input-normal')
                                @enderror
                                text-sm rounded-lg 
                                block w-full p-2.5 
                                " 
                            placeholder="https://example.com/image.pnp" 
                            value="{{ old('image_url', $movie->image_url) }}"
                            required=""
                        >

                        @error('image_url')
                            @include('partials.ui.input.input-msg-error', ["message" => $message])
                        @enderror
                    </div> 
                    <div class="sm:col-span-2">
                        <label for="description" name="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
                        <textarea 
                            name="description" 
                            maxlength="2000" 
                            id="description" 
                            rows="8" 
                            class="
                                @error('image_url')
                                    @include('partials.ui.input.styles.input-error')
                                @else
                                    @include('partials.ui.input.styles.input-normal')
                                @enderror
                                block 
                                rounded-lg border 
                                p-2.5 w-full text-sm 
                            " 
                            placeholder="Sua descrição aqui...">{{ old('description', $movie->description) }}</textarea>
                        
                        @error('description')
                            @include('partials.ui.input.input-msg-error', ["message" => $message])
                        @enderror
                    </div>
                </div>
                
                <div class="flex gap-4">
                    <button 
                        type="submit" 
                        class="
                            inline-flex 
                            items-center 
                            px-5 
                            py-2.5 
                            mt-4 
                            sm:mt-6 
                            text-sm 
                            font-medium 
                            text-center 
                            text-white 
                            bg-primary-700 
                            rounded-lg 
                            focus:ring-4 
                            focus:ring-primary-200 
                            dark:focus:ring-primary-900 
                            hover:bg-primary-800"
                        >
                        Salvar
                    </button>
                    <button 
                        type="button" 
                        onclick="window.location='{{ route('hubflix.movies.index') }}?page={{ $pagePrevious }}'"
                        class="
                            inline-flex 
                            items-center 
                            px-5 
                            py-2.5 
                            mt-4 
                            sm:mt-6 
                            text-sm 
                            font-medium 
                            text-center 
                            text-white 
                            bg-red-700 
                            rounded-lg 
                            focus:ring-4 
                            focus:ring-red-200 
                            dark:focus:ring-red-900 
                            hover:bg-red-800"
                        >
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection


{{-- @php
    dd($movie->categories[0]->category_id)
@endphp --}}