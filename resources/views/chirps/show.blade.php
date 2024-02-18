<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chirp Details') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{--                    Creacion de card para cuando no hayan chirps en la BD    --}}

                    <div class="flex items-center justify-center">
                        <div class="w-full max-w-7xl p-4 bg-white border border-gray-200 rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700
                    text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600
                    hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600
                    focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none
                    focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]
                    motion-reduce:transition-none dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)]
                    dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]
                    dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]
                    dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">

                            <div class="flow-root">

                                    <span
                                        class="flex justify-end text-xs font-normal text-gray-500 hover:text-gray-700 dark:text-gray-400">
                                        {{ $chirp->created_at->diffForHumans() }}
                                    </span>


                                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                                <img class="w-8 h-8 rounded-full"
                                                     src="{{ asset('img/man.png') }}"
                                                     alt="Neil image">

                                            </div>
                                            <div class="flex-1 min-w-0 ms-4">
                                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                    {{ $chirp->users->name }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                    {{ $chirp->users->email }}
                                                </p>
                                            </div>
                                            @if(auth()->user()->id === $chirp->users->id)

                                                <div
                                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                    <div class="relative" data-te-dropdown-ref>
                                                        <button
                                                            class="flex items-center whitespace-nowrap rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] motion-reduce:transition-none dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                                            type="button"
                                                            id="dropdownMenuButton1"
                                                            data-te-dropdown-toggle-ref
                                                            aria-expanded="false"
                                                            data-te-ripple-init
                                                            data-te-ripple-color="light">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                 viewBox="0 0 24 24" stroke-width="1.5"
                                                                 stroke="currentColor"
                                                                 class="w-6 h-6 hover:cursor-pointer">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                      d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75"/>
                                                            </svg>

                                                        </button>
                                                        <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                                                            aria-labelledby="dropdownMenuButton1"
                                                            data-te-dropdown-menu-ref>
                                                            <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                                               href="#" data-te-dropdown-item-ref>Action</a>
                                                            <form action="{{ route('chirps.delete', $chirp->id ) }}"
                                                                  method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <li class="justify-end m-5">


                                                                    <a href="/chirps/{{ $chirp->id }}/edit">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             fill="none"
                                                                             viewBox="0 0 24 24" stroke-width="1.5"
                                                                             stroke="currentColor"
                                                                             class="w-6 h-6 hover:text-green-600 dark:hover:text-green-400">
                                                                            <path stroke-linecap="round"
                                                                                  stroke-linejoin="round"
                                                                                  d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                                                        </svg>
                                                                    </a>
                                                                </li>
                                                                <li class="justify-end m-5">
                                                                    <button type="submit">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             fill="none"
                                                                             viewBox="0 0 24 24" stroke-width="1.5"
                                                                             stroke="currentColor"
                                                                             class="w-6 h-6 hover:text-red-600 dark:hover:text-red-500">
                                                                            <path stroke-linecap="round"
                                                                                  stroke-linejoin="round"
                                                                                  d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                                                        </svg>
                                                                    </button>
                                                                </li>

                                                            </form>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif


                                        </div>
                                    </li>
                                    <li class="py-3 sm:py-4">
                                        <div class="items-center">
                                            <div class="flex-1 min-w-0 ms-4">
                                                <p>
                                                    🔥 {{ $chirp->message }}
                                                </p>
                                            </div>
                                        </div>
                                        {{--DIV PARA MOSTRAR LOS COMENTARIOS--}}
                                        <div class="overflow-auto hover:overflow-scroll grid max-h-52 grid-cols-1 gap-x-8 gap-y-8 border-t border-gray-200 mt-8">
                                            @foreach($chirp->comments as $comment)
                                            <figure class="max-w-screen-md mx-auto text-center">
                                                <figcaption class="flex items-center justify-center mt-6 space-x-3 rtl:space-x-reverse">
                                                    <img class="w-6 h-6 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png" alt="profile picture">
                                                    <div class="flex items-center divide-x-2 rtl:divide-x-reverse divide-gray-500 dark:divide-gray-700">
                                                        <cite class="pe-3 font-medium text-gray-900 dark:text-white">{{ $comment->users->name }}</cite>
                                                        <cite class="ps-3 pe-3 text-sm text-gray-500 dark:text-gray-400">{{ $comment->users->email }}</cite>
                                                        <cite class="ps-3 text-sm text-gray-500 dark:text-gray-200"> {{ $comment->created_at->diffForHumans() }}</cite>
                                                    </div>
                                                </figcaption>
                                                <svg class="w-5 h-5 mx-auto mb-3 text-gray-400 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                                                    <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
                                                </svg>
                                                <blockquote>
                                                    <p class="text-sm italic font-medium text-gray-900 dark:text-white">"{{ $comment->msj }}"</p>
                                                </blockquote>
                                            </figure>
                                            @endforeach
                                        </div>

                                       {{--DIV PARA MOSTRAR LOS COMENTARIOS--}}

                                    </li>
                                    <li class="pb-3 sm:pb-4">
                                        <div class="items-center mt-3">
                                            {{--Area de comentarios por post--}}

                                            <form action="{{ route('comments.store') }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div
                                                    class="w-full border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600 shadow-blue-100">
                                                    <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                                                        <label for="msj" class="sr-only">Your comment</label>
                                                        <textarea id="msj" name="msj" rows="4"
                                                                  class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                                                  placeholder="Write a comment..." required>{{old('msj')}}</textarea>
                                                        <input type="hidden" name="user_id" value="{{$user_comment}}">
                                                        <input type="hidden" name="chirp_id" value="{{$chirp->id}}">
                                                    </div>

                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    <div
                                                        class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                                                        <button type="submit"
                                                                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                                            Post comment
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                            {{--Area de comentarios por post--}}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
