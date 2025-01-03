<div class="fi-ta-content relative divide-y divide-gray-200 overflow-x-auto dark:divide-white/10 dark:border-t-white/10">
    <table class="fi-ta-table w-full table-auto divide-y divide-gray-200 text-start dark:divide-white/5">
        <thead class="divide-y divide-gray-200 dark:divide-white/5">
            <tr class="bg-gray-50 dark:bg-white/5">
                <th rowspan="2"
                    class="fi-ta-header-cell fi-table-header-cell-nama px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                    Nama
                </th>
                <th colspan="{{ count($pelajaran) }}"
                    class="fi-ta-header-cell fi-table-header-cell-nilai px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                    Nilai</th>
                <th rowspan="2"
                    class="fi-ta-header-cell fi-table-header-cell-total px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                    Total</th>
                <th rowspan="2"
                    class="fi-ta-header-cell fi-table-header-cell-peringkat px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                    Peringkat</th>
                <th rowspan="2"
                    class="fi-ta-header-cell fi-table-header-cell-peringkat px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                    Cetak</th>
            </tr>
            <tr class="bg-gray-50 dark:bg-white/5">
                @foreach ($pelajaran as $p)
                    <th
                        class="fi-ta-header-cell fi-table-header-cell-pelajaran px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6">
                        {{ $p }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($nilai as $s => $p)
                @php
                    $peringkat = $loop->index + 1;
                @endphp
                <tr
                    class="fi-ta-row hover:bg-gray-50 dark:hover:bg-white/5 [@media(hover:hover)]:transition [@media(hover:hover)]:duration-75">
                    <td
                        class="fi-ta-cell fi-table-cell-nama p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3">
                        <div class="fi-ta-col-wrp">
                            <div class="flex w-full justify-start text-start disabled:pointer-events-none">
                                <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                                    {{ $santri[$s][0] }}
                                </div>
                            </div>
                        </div>
                    </td>
                    @foreach ($pelajaran as $i => $p)
                        <td
                            class="fi-ta-cell fi-table-cell-nama p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3">
                            <div class="fi-ta-col-wrp">
                                <div class="flex w-full justify-start text-start disabled:pointer-events-none">
                                    <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                                        {{ $nilai[$s][$i] }}
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endforeach
                    <td
                        class="fi-ta-cell fi-table-cell-nama p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3">
                        <div class="fi-ta-col-wrp">
                            <div class="flex w-full justify-start text-start disabled:pointer-events-none">
                                <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                                    {{ $nilai[$s]['total'] }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td
                        class="fi-ta-cell fi-table-cell-nama p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3">
                        <div class="fi-ta-col-wrp">
                            <div class="flex w-full justify-start text-start disabled:pointer-events-none">
                                <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                                    {{ $peringkat }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td
                        class="fi-ta-cell fi-ta-actions-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3">
                        <div class="whitespace-nowrap px-3 py-4">
                            <div class="fi-ta-actions flex shrink-0 items-center justify-end gap-3">
                                <a href="{{ url('cetak/sampul?data=') }}" target="_blank"
                                    class="fi-link group/link fi-size-sm fi-link-size-sm fi-color-gray fi-ac-action fi-ac-link-action relative inline-flex items-center justify-center gap-1 outline-none">
                                    <svg class="fi-link-icon h-6 w-6 text-gray-400 dark:text-gray-500"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                                    </svg>
                                </a>
                                <a href="{{ url(
                                    'cetak/rapor?data=' .
                                        base64_encode(
                                            json_encode([
                                                'santri' => $santri[$s],
                                                'nilai' => $nilai[$s],
                                                'pelajaran' => $pelajaran,
                                                'peringkat' => $peringkat,
                                                'jumlah' => count($nilai),
                                            ]),
                                        ),
                                ) }}"
                                    target="_blank"
                                    class="fi-link group/link fi-size-sm fi-link-size-sm fi-color-gray fi-ac-action fi-ac-link-action relative inline-flex items-center justify-center gap-1 outline-none">
                                    <svg class="fi-link-icon h-6 w-6 text-gray-400 dark:text-gray-500"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <style>
        table {
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid rgba(var(--gray-200), 1);
        }
    </style>
</div>
