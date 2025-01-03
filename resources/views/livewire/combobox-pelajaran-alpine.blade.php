<div>
    {{-- <div class="bg-white px-4 py-5 sm:p-6">
        <div class="grid grid-cols-6 gap-4">
            <div class="col-span-3">
                <label for="radius" class="block font-medium text-gray-700">
                    Pelajaran tersedia
                </label>
                <div
                    class="h-64 overflow-y-auto overflow-x-hidden rounded-b-md border border-t-0 border-gray-300 p-2 text-gray-600">
                    ... </div>
                <div class="flex justify-center"><button type="button"
                        class="mt-2 inline-flex justify-center border border-transparent bg-green-600 px-3 py-1 text-sm font-medium text-white shadow-sm hover:bg-green-700 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        SEMUA &nbsp;
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                            class="svg-inline--fa fa-arrow-right fa-w-14 text-xl">
                            <path fill="currentColor"
                                d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"
                                class=""></path>
                        </svg></button></div>
            </div>
            <div class="col-span-3">
                <label for="radius" class="block font-medium text-gray-700">
                    Pelajaran terpilih</label>
                <div
                    class="h-64 overflow-y-auto overflow-x-hidden rounded-b-md border border-t-0 border-gray-300 p-2 text-gray-600">
                    ... </div>
                <div class="flex justify-center"><button type="button"
                        class="mt-2 inline-flex justify-center border border-transparent bg-red-600 px-3 py-1 text-sm font-medium text-white shadow-sm hover:bg-red-700 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"><svg
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                            class="svg-inline--fa fa-arrow-left fa-w-14 text-xl">
                            <path fill="currentColor"
                                d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"
                                class=""></path>
                        </svg>&nbsp; SEMUA
                    </button>
                </div>
            </div>
        </div>
    </div> --}}

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

                <div class="flex min-h-36 w-full" style="height: 144px" x-data="{ options: @entangle('options'), selected: @entangle('selected') }">
                    <div class="h-full w-1/2">
                        <div
                            class="h-full overflow-y-auto rounded-lg border border-gray-200 bg-white/60 dark:border-gray-600 dark:bg-neutral-800/70">

                            <ul class="py-1 text-base text-gray-950 sm:text-sm sm:leading-6 dark:text-white">
                                <template x-for="(item, index) in options" :key="index">
                                    <li>
                                        <a x-text="item" @click="move(item,index,options,selected)"
                                            class="block cursor-pointer px-1 py-1 hover:bg-gray-100 dark:hover:bg-gray-600">
                                        </a>
                                    </li>
                                </template>
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
                                <template x-for="(item, index) in selected" :key="index">
                                    <li>
                                        <a x-text="item" @click="move(item,index,selected,options)"
                                            class="block cursor-pointer px-1 py-1 hover:bg-gray-100 dark:hover:bg-gray-600">
                                        </a>
                                    </li>
                                </template>
                            </ul>
                        </div>
                        {{ print_r($selected) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function move(item, i, from, to) {
            alert(from.indexOf(item))
            to.push(item);
            from.splice(from[i], 1);
            // updateState();
        }
    </script>
</div>
