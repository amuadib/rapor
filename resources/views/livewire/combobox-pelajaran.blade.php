<div>
    <div class="grid gap-y-2">

        <div class="grid auto-cols-fr gap-y-2">
            <div class="flex flex-col gap-2" wire:ignore="">
                <div class="flex w-full">
                    <div class="w-1/2">
                        <div class="flex items-center justify-between gap-x-3">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-3">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Pelajaran yang tersedia
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="w-20"></div>
                    <div class="w-1/2">
                        <div class="flex items-center justify-between gap-x-3">
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-3">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Pelajaran terpilih
                                </span>
                            </label>
                        </div>
                    </div>

                </div>

                {{-- <div class="flex w-full">
                    <div class="w-1/2">
                        <div
                            class="fi-input-wrp [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input mb-2 flex rounded-lg bg-white shadow-sm ring-1 ring-gray-950/10 transition duration-75 dark:bg-white/5 dark:ring-white/20">
                            <div class="min-w-0 flex-1">
                                <input
                                    class="fi-input block w-full border-none bg-white/0 py-1.5 pe-3 ps-3 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] sm:text-sm sm:leading-6 dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)]"
                                    placeholder="Search..."
                                    x-on:keydown.debounce.100ms="search('options', $event.target.value)">
                            </div>
                        </div>
                    </div>
                    <div class="w-20"></div>
                    <div class="w-1/2">
                        <div
                            class="fi-input-wrp [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-2 [&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&amp;:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input mb-2 flex rounded-lg bg-white shadow-sm ring-1 ring-gray-950/10 transition duration-75 dark:bg-white/5 dark:ring-white/20">
                            <div class="min-w-0 flex-1">
                                <input
                                    class="fi-input block w-full border-none bg-white/0 py-1.5 pe-3 ps-3 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] sm:text-sm sm:leading-6 dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)]"
                                    placeholder="Search..."
                                    x-on:keydown.debounce.100ms="search('selected', $event.target.value)">
                            </div>
                        </div>
                    </div>

                </div> --}}

                <div class="flex min-h-36 w-full" style="height: 144px">
                    <div class="h-full w-1/2">
                        <div
                            class="h-full overflow-y-auto rounded-lg border border-gray-200 bg-white/60 dark:border-gray-600 dark:bg-neutral-800/70">

                            <ul class="py-1 text-base text-gray-950 sm:text-sm sm:leading-6 dark:text-white">
                                @foreach ($options as $k => $v)
                                    <li>
                                        {{ $v }}
                                        <button wire:click="move({{ $k }},'selected')"
                                            class="size-8 cursor-pointer rounded border border-gray-200 px-2 py-1 hover:bg-slate-100 disabled:opacity-40 dark:border-gray-500 dark:hover:bg-slate-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                            </svg>
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="flex w-20 flex-col items-center justify-center gap-1 p-2">
                        <button type="button"
                            class="size-8 cursor-pointer rounded border border-gray-200 px-2 py-1 hover:bg-slate-100 disabled:opacity-40 dark:border-gray-500 dark:hover:bg-slate-800"
                            x-on:click="moveToRightAll">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M13.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L11.69 12 4.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                    clip-rule="evenodd"></path>
                                <path fill-rule="evenodd"
                                    d="M19.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06L17.69 12l-6.97-6.97a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <button type="button"
                            class="size-8 cursor-pointer rounded border border-gray-200 px-2 py-1 hover:bg-slate-100 disabled:opacity-40 dark:border-gray-500 dark:hover:bg-slate-800"
                            x-on:click="moveToLeftAll">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M10.72 11.47a.75.75 0 0 0 0 1.06l7.5 7.5a.75.75 0 1 0 1.06-1.06L12.31 12l6.97-6.97a.75.75 0 0 0-1.06-1.06l-7.5 7.5Z"
                                    clip-rule="evenodd"></path>
                                <path fill-rule="evenodd"
                                    d="M4.72 11.47a.75.75 0 0 0 0 1.06l7.5 7.5a.75.75 0 1 0 1.06-1.06L6.31 12l6.97-6.97a.75.75 0 0 0-1.06-1.06l-7.5 7.5Z"
                                    clip-rule="evenodd"></path>
                            </svg>

                        </button>
                    </div>
                    <div class="h-full w-1/2">
                        <div
                            class="h-full overflow-y-auto rounded-lg border border-gray-200 bg-white/60 dark:border-gray-600 dark:bg-neutral-800/70">
                            <ul class="py-1 text-base text-gray-950 sm:text-sm sm:leading-6 dark:text-white">
                                @foreach ($selected as $k => $v)
                                    <li>
                                        <button wire:click="move({{ $k }},'options')"
                                            class="size-8 cursor-pointer rounded border border-gray-200 px-2 py-1 hover:bg-slate-100 disabled:opacity-40 dark:border-gray-500 dark:hover:bg-slate-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 19.5 8.25 12l7.5-7.5" />
                                            </svg>

                                        </button>
                                        {{ $v }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
