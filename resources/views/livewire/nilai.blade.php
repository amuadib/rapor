<div>
    <form method="post" x-data="{ isProcessing: false }" x-on:submit="if (isProcessing) $event.preventDefault()"
        x-on:form-processing-started="isProcessing = true" x-on:form-processing-finished="isProcessing = false"
        class="fi-form grid gap-y-6" id="form" wire:submit.prevent="simpan">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    @foreach ($rombel->pelajaran as $p)
                        <th width="100px">{{ $p->mapel->nama }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($rombel->anggota as $a)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $a->santri->nama }}</td>
                        @foreach ($rombel->pelajaran as $p)
                            <td>
                                <div wire:key="ns-{{ $p->id }}-{{ $a->santri_id }}"
                                    class="fi-input-wrp [&:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-600 dark:[&:not(:has(.fi-ac-action:focus))]:focus-within:ring-primary-500 fi-fo-text-input flex w-20 overflow-hidden rounded-lg bg-white shadow-sm ring-1 ring-gray-950/10 transition duration-75 dark:bg-white/5 dark:ring-white/20 [&:not(:has(.fi-ac-action:focus))]:focus-within:ring-2">
                                    <input type="text"
                                        wire:model.defer="nilai.{{ $p->id }}.{{ $a->santri_id }}"
                                        class="fi-input block w-full border-none bg-white/0 py-1.5 pe-3 ps-3 text-base text-gray-950 transition duration-75 placeholder:text-gray-400 focus:ring-0 disabled:text-gray-500 disabled:[-webkit-text-fill-color:theme(colors.gray.500)] disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.400)] sm:text-sm sm:leading-6 dark:text-white dark:placeholder:text-gray-500 dark:disabled:text-gray-400 dark:disabled:[-webkit-text-fill-color:theme(colors.gray.400)] dark:disabled:placeholder:[-webkit-text-fill-color:theme(colors.gray.500)]">

                                </div>
                                <span class="error">
                                    @error('nilai.' . $p->id . '.' . $a->santri_id)
                                        Nilai harus berupa angka 0 - 100
                                    @enderror
                                </span>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="fi-ac flex flex-wrap items-center justify-start gap-3">
            <button x-bind:id="$id('key-bindings')" x-mousetrap.global.mod-s="document.getElementById($el.id).click()"
                x-data="{
                    form: null,
                    isProcessing: false,
                    processingMessage: null,
                }" x-init="form = $el.closest('form')
                
                form?.addEventListener('form-processing-started', (event) => {
                    isProcessing = true
                    processingMessage = event.detail.message
                })
                
                form?.addEventListener('form-processing-finished', () => {
                    isProcessing = false
                })"
                x-bind:class="{ 'enabled:opacity-70 enabled:cursor-wait': isProcessing }"
                style="--c-400:var(--primary-400);--c-500:var(--primary-500);--c-600:var(--primary-600);"
                class="fi-btn fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md bg-custom-600 hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action relative inline-grid grid-flow-col items-center justify-center gap-1.5 rounded-lg px-3 py-2 text-sm font-semibold text-white shadow-sm outline-none transition duration-75 focus-visible:ring-2"
                type="submit" wire:loading.attr="disabled" x-bind:disabled="isProcessing" id="key-bindings-1">
                <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    class="fi-btn-icon h-5 w-5 animate-spin text-white transition duration-75"
                    wire:loading.delay.default="" wire:target="create">
                    <path clip-rule="evenodd"
                        d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                        fill-rule="evenodd" fill="currentColor" opacity="0.2"></path>
                    <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor"></path>
                </svg><svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                    class="fi-btn-icon h-5 w-5 animate-spin text-white transition duration-75" x-show="isProcessing"
                    style="display: none;">
                    <path clip-rule="evenodd"
                        d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                        fill-rule="evenodd" fill="currentColor" opacity="0.2"></path>
                    <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor"></path>
                </svg>
                <span x-show="! isProcessing" class="fi-btn-label">
                    Simpan
                </span>
                <span x-show="isProcessing" x-text="processingMessage" class="fi-btn-label"
                    style="display: none;"></span>
            </button>
        </div>
    </form>
</div>
