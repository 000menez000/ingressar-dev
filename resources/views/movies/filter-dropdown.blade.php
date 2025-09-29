<button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
    class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
    type="button">
    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-1.5 -ml-1 text-gray-400"
        viewbox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd"
            d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
            clip-rule="evenodd" />
    </svg>
    Opções de Filtros
    <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
        aria-hidden="true">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
    </svg>
</button>


<div id="filterDropdown" class="z-10 hidden px-3 pt-1 bg-white rounded-lg shadow w-80 dark:bg-gray-700 right-0">
    {{-- <form action="{{ route('hubflix.movies.index') }}" method="GET"> --}}
        <div class="flex items-center justify-between pt-2">
            <h6 class="text-sm font-medium text-black dark:text-white">Filtros</h6>
            <div class="flex items-center space-x-3">
                <button 
                    type="submit"
                    class="flex items-center text-sm font-medium rounded-lg px-3 py-1 cursor-pointer text-primary-600 dark:text-white dark:bg-primary-600 hover:bg-primary-700"
                >Filtrar</button>
                <button
                    type="submit" 
                    id="clear-filters"
                    class="flex items-center text-sm font-medium rounded-lg px-3 py-1 text-red-600 dark:text-white dark:bg-red-500 hover:bg-red-700"
                >Limpar</a>
            </div>
        </div>
    
        <div id="accordion-flush" data-accordion="collapse" data-active-classes="text-black dark:text-white"
            data-inactive-classes="text-gray-500 dark:text-gray-400">
            <!-- Category -->
            <h2 id="category-heading">
                <button type="button"
                    class="flex items-center justify-between w-full py-2 px-1.5 text-sm font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700"
                    data-accordion-target="#category-body" aria-expanded="true" aria-controls="category-body">
                    <span>Categoria</span>
                    <svg aria-hidden="true" data-accordion-icon="" class="w-5 h-5 rotate-180 shrink-0" fill="currentColor"
                        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                    </svg>
                </button>
            </h2>
            <div id="category-body" class="hidden" aria-labelledby="category-heading">
                <div class="py-2 font-light border-b border-gray-200 dark:border-gray-600">
                    {{-- <form action=""> --}}
    
                        <ul class="space-y-2">
                            @foreach ($categories as $category)
                                <li class="flex items-center">
                                    <input 
                                        id="{{ $category->name }}" 
                                        type="checkbox" 
                                        name="category[]" 
                                        value={{ $category->category_id }}
                                        {{ in_array($category->category_id, request()->get('category', [])) ? 'checked' : '' }}
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="{{ $category->name }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $category->description }}
                                    </label>
                                </li>
                            @endforeach
                            <button id="all-categories-filter" class="flex items-center text-sm font-medium text-primary-600 dark:text-primary-500 hover:underline">Todos</button>
                    {{-- </form> --}}
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>