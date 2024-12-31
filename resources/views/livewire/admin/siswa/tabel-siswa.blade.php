<div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="datatable">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No.
                </th>
                <th scope="col" class="px-6 py-3">
                    NISN
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Kelas
                </th>
                <th scope="col" class="px-6 py-3">
                    Tahun Ajaran
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $key => $item)
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $key + 1 }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->nisn }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->nama }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->kelas->kode_kelas }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->thn_ajaran }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('siswa.edit', $item->id) }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Edit
                        </a>
                        <a href="{{ route('siswa.show', $item->id) }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <i class="far fa-eye"></i>
                        </a>
                        <button wire:click='delete({{ $item->id }})' onclick="confirm('are you sure?')"
                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                            Hapus
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
