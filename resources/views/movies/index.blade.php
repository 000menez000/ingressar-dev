@extends('layouts.app')

@section('title', 'Movies')

@section('content')
<section">
   <div class="mx-auto max-w-screen-2xl px-4 lg:px-12 mt-20">
      <h1 class="text-3xl font-bold dark:text-white mb-10 ">Gerenciador de Filmes</h1>
      <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
         <div
               class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 dark:border-gray-700">
               <form class="w-full md:w-1/2 flex items-center gap-3" method="GET" action="{{ route('hubflix.movies.index') }}">
                  @csrf
                  <div class="w-full md:w-1/2">
                     <label for="simple-search" class="sr-only">Search</label>
                     <div class="relative w-full">
                           <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                              <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                 fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                       d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                              </svg>
                           </div>
                           <input 
                              name="search" 
                              type="text" 
                              id="simple-search" 
                              value="{{ request('search') ?? ''}}"
                              placeholder="Search for products" 
                              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           >
                     </div>
                  </div>
                  <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                     @include('partials.ui.filter-dropdown', ["categories" => $categories])
                  </div>
               </form>
               <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end gap-3 flex-shrink-0">
                  @include('partials.ui.buttons.button-add', ["name" => "Adicionar", "icon" => true])
                  @include('partials.ui.buttons.button-del', ['name' => 'Deletar', 'icon' => true, 'modal' => 'selected'])

                  <!-- Delete Modal -->
                  @include('partials.ui.modals.delete-modal', ["modal" => 'selected'])
               </div>
         </div>
         <div class="overflow-x-auto min-h-[400px]">
            @if ($movies->getCollection()->isEmpty())
               <div class="flex items-center justify-center h-100 dark:text-gray-500 text-2xl">
                  Nenhum resultado encontrado!
               </div>
            @else
               <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                     <tr>
                           <th scope="col" class="p-4">
                              <div class="flex items-center">
                                 <input id="checkbox-all" type="checkbox"
                                       class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                 <label for="checkbox-all" class="sr-only">checkbox</label>
                              </div>
                           </th>
                           <th scope="col" class="p-4">Título</th>
                           <th scope="col" class="p-4">Categoria</th>
                           <th scope="col" class="p-4">Descrição</th>
                           <th scope="col" class="p-4 text-center">Duração</th>
                           <th scope="col" class="p-4"></th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($movies as $movie)
                           <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                              <td class="p-4 w-4">
                                 <div class="flex items-center">
                                       <input id="checkbox-table-search-1" type="checkbox"
                                          onclick="event.stopPropagation()"
                                          class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                       <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                 </div>
                              </td>
                              <th scope="row"
                                 class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                 <div class="flex items-center mr-3">
                                       <img src="{{ $movie->image_url }}" alt="" class="h-8 w-auto mr-3">
                                       {{ $movie->title }}
                                 </div>
                              </th>
                              <td class="px-4 py-3">
                                 <span
                                       class="
                                          bg-primary-100 
                                          text-primary-800 
                                          dark:bg-primary-900 
                                          dark:text-primary-300
                                          text-xs 
                                          font-medium 
                                          px-2 
                                          py-0.5 
                                          rounded 
                                       ">
                                       {{ $movie->categories[0]->description }}
                                 </span>
                              </td>
                              <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                 {{ Str::limit($movie->description, 40) }}
                              </td>
                              <td class="px-4 py-3 text-center">{{ $movie->formatted_duration }}</td>
                              <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                 <div class="flex items-center space-x-4">
                                       @include('partials.ui.buttons.button-edit', ["modal" => $movie->movie_id, "data" => $movie, "name" => "Editar"])
                                       @include('partials.ui.buttons.button-preview', ["modal" => $movie->movie_id, "name" => "Preview"])
                                       @include('partials.ui.buttons.button-del', ["modal" => $movie->movie_id, "name" => "Deletar", "icon" => true])

                                       @include('partials.ui.modals.delete-modal', ["modal" => $movie->movie_id ])

                                 </div>
                              </td>
                           </tr>
                     @endforeach
                  </tbody>
               </table>
            @endif
         </div>
         <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
               aria-label="Table navigation">
               <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                  Mostrando
                  <span class="font-semibold text-gray-900 dark:text-white">{{ $movies->firstItem() }}-{{ $movies->lastItem() }}</span>
                  de
                  <span class="font-semibold text-gray-900 dark:text-white">{{ $movies->total() }}</span>
                  resultados
               </span>
                
               <div class="inline-flex items-stretch -space-x-px">
                  {{ $movies->onEachSide(1)->links('pagination::tailwind')}}
               </div>
         </nav>
      </div>
   </div>
</section>
@endsection

{{-- @php
   dd($movies)
@endphp --}}