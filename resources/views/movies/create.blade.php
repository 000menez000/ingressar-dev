@extends('layouts.app')

@section('content')
    <section class="pt-20">
        <div class="p-8 mx-auto max-w-2xl rounded-lg shadow dark:border dark:bg-gray-800 dark:border-gray-700">
            <h1 class="text-3xl font-bold dark:text-white mb-10 ">Cadastrar Filme</h1>
            <form method="POST" action="{{ route('hubflix.movies.store') }}">
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
                                    bg-red-50 border 
                                    border-red-500 
                                    text-red-900 
                                    dark:text-red-400 
                                    placeholder-red-700 
                                    dark:placeholder-red-500
                                    focus:ring-red-500 
                                    focus:border-red-500
                                    dark:bg-gray-700 
                                    dark:border-red-500
                                @else
                                    bg-gray-50 border 
                                    border-gray-300 
                                    text-gray-900 
                                    focus:ring-primary-600 
                                    focus:border-primary-600 
                                    dark:bg-gray-700 
                                    dark:border-gray-600 
                                    dark:placeholder-gray-400 
                                    dark:text-white 
                                    dark:focus:ring-primary-500 
                                    dark:focus:border-primary-500
                                @enderror
                                block w-full p-2.5 
                                text-sm rounded-lg 
                            " 
                            placeholder="Título do filme aqui" 
                            required=""
                            value="{{ old('title') }}"
                        >
                        @error('title')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="duration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duração</label>
                        

                        @error('duration')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                        @enderror

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
                                        bg-red-50 border 
                                        border-red-500 
                                        text-red-900 
                                        dark:text-red-400 
                                        placeholder-red-700 
                                        dark:placeholder-red-500
                                        focus:ring-red-500 
                                        focus:border-red-500
                                        dark:bg-gray-700 
                                        dark:border-red-500
                                    @else
                                        bg-gray-50 
                                        border-gray-300 
                                        text-gray-900 
                                        focus:ring-primary-600 
                                        focus:border-primary-600 
                                        dark:bg-gray-700 
                                        dark:border-gray-600 
                                        dark:placeholder-gray-400 
                                        dark:text-white 
                                        dark:focus:ring-primary-500 
                                        dark:focus:border-primary-500
                                    @enderror 
                                    block w-full p-2.5 
                                    text-sm 
                                    rounded-lg 
                                    border
                                    leading-none
                                "  
                                required=""
                                max="05:00"
                                value="{{ old('duration') ?? '00:00' }}"
                            >
                        </div>

                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select 
                            id="category" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            name="category"
                        >
                            @foreach ($categories as $category)
                                <option {{ old('category') == $category->category_id ? "selected" : "" }} value="{{ $category->category_id }}">{{ $category->description }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="image_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL da Imagem</label>
                        <input 
                            type="text" 
                            name="image_url" 
                            id="item-weight" 
                            class=" 
                                @error('description')
                                    bg-red-50 border 
                                    border-red-500 
                                    text-red-900 
                                    dark:text-red-400 
                                    placeholder-red-700 
                                    dark:placeholder-red-500
                                    focus:ring-red-500 
                                    focus:border-red-500
                                    dark:bg-gray-700 
                                    dark:border-red-500
                                @else
                                    bg-gray-50 border 
                                    border-gray-300 
                                    text-gray-900 
                                    dark:bg-gray-700 
                                    dark:border-gray-600 
                                    dark:placeholder-gray-400 
                                    dark:text-white 
                                    dark:focus:ring-primary-500 
                                    dark:focus:border-primary-500
                                    focus:ring-primary-600 
                                    focus:border-primary-600 
                                @enderror
                                text-sm rounded-lg 
                                block w-full p-2.5 
                                " 
                            placeholder="https://example.com/image.pnp" 
                            value="{{ old('image_url') }}"
                            required=""
                        >

                        @error('image_url')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                        @enderror
                    </div> 
                    <div class="sm:col-span-2">
                        <label for="description" name="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
                        <textarea name="description" maxlength="2000" value="{{ old('description') }}" id="description" rows="8" 
                            class="
                                @error('image_url')
                                    bg-red-50 border 
                                    border-red-500 
                                    text-red-900 
                                    dark:text-red-400 
                                    placeholder-red-700 
                                    dark:placeholder-red-500
                                    focus:ring-red-500 
                                    focus:border-red-500
                                    dark:bg-gray-700 
                                    dark:border-red-500
                                @else
                                    text-gray-900 
                                    bg-gray-50 
                                    border-gray-300 
                                    focus:ring-primary-500 
                                    focus:border-primary-500 
                                    dark:bg-gray-700 
                                    dark:border-gray-600 
                                    dark:placeholder-gray-400 
                                    dark:text-white
                                    dark:focus:ring-primary-500 
                                    dark:focus:border-primary-500
                                @enderror
                                block 
                                rounded-lg border 
                                p-2.5 w-full text-sm 
                            " 
                            placeholder="Sua descrição aqui..."></textarea>
                        
                        @error('description')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Cadastrar
                </button>
            </form>
        </div>
    </section>
@endsection