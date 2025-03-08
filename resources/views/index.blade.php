@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <!-- Header dan Tombol Tambah -->
        <div class="p-6 mb-6 bg-white rounded-lg shadow-md">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold">Data Resiko</h2>
                <button onclick="openModal()"
                    class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600 focus:outline-none">
                    Tambah Resiko
                </button>
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="overflow-hidden bg-white rounded-lg shadow-md">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left uppe-black rcase text">
                                    Kategori</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left uppe-black rcase text">
                                    Sub Kategori</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left uppe-black rcase text">
                                    Kelompok</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left uppe-black rcase text">
                                    Kejadian</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left uppe-black rcase text">
                                    Tipe Sumber</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left uppe-black rcase text">
                                    Penyebab</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left uppe-black rcase text">
                                    Area Dampak</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left uppe-black rcase text">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($risiko_list as $risiko)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $risiko->kategori_risiko->nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $risiko->sub_kategori->nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $risiko->kelompok_risiko->nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $risiko->kejadian_risiko->deskripsi }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $risiko->tipe_sumber_risiko }}</td>
                                    <td class="px-6 py-4">{{ $risiko->penyebab }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $risiko->area_dampak }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <button onclick="editRisiko({{ $risiko->id }})"
                                            class="px-3 py-1 mr-2 text-sm text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                            Edit
                                        </button>
                                        <button onclick="deleteRisiko({{ $risiko->id }})"
                                            class="px-3 py-1 text-sm text-white bg-red-500 rounded hover:bg-red-600">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="formModal" class="hidden overflow-y-auto fixed inset-0 w-full h-full bg-gray-600 bg-opacity-50">
        <div class="relative top-20 p-5 mx-auto w-3/5 bg-white rounded-md border shadow-lg" style="max-width: 1000px;">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Tambah Resiko</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Form existing -->
            <form id="resikoForm" method="POST" action="{{ route('resiko.store') }}">
                @csrf
                <div class="grid gap-6 md:grid-cols-2">
                    <!-- Column 1 -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <label for="kategori_resiko" class="block mb-2 font-bold text-gray-700">Kategori Resiko</label>
                            <select id="kategori_resiko" name="kategori_resiko"
                                class="px-3 py-2 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline">
                                <option value="">Pilih Kategori Resiko</option>
                                @foreach ($kategori_resiko as $kategori)
                                    <option value="{{ $kategori->id }}" @if (old('kategori_resiko') == $kategori->id) selected @endif>
                                        {{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="sub_kategori" class="block mb-2 font-bold text-gray-700">Sub Kategori</label>
                            <select id="sub_kategori" name="sub_kategori"
                                class="px-3 py-2 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline">
                                <option value="">Pilih Sub Kategori</option>
                                @if (old('kategori_resiko'))
                                    @foreach ($sub_kategori as $subKategori)
                                        <option value="{{ $subKategori->id }}"
                                            @if (old('sub_kategori') == $subKategori->id) selected @endif>{{ $subKategori->nama }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="kelompok_resiko" class="block mb-2 font-bold text-gray-700">Kelompok Resiko</label>
                            <select id="kelompok_resiko" name="kelompok_resiko"
                                class="px-3 py-2 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline">
                                <option value="">Pilih Kelompok Resiko</option>
                                @foreach ($kelompok_resiko as $kelompok)
                                    <option value="{{ $kelompok->id }}" @if (old('kelompok_resiko') == $kelompok->id) selected @endif>
                                        {{ $kelompok->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="kejadian_resiko" class="block mb-2 font-bold text-gray-700">Kejadian Resiko</label>
                            <select id="kejadian_resiko" name="kejadian_resiko"
                                class="px-3 py-2 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline">
                                <option value="">Pilih Kejadian Resiko</option>
                                @if (old('kelompok_resiko'))
                                    @foreach ($kejadian_resiko_filtered as $kejadian)
                                        <option value="{{ $kejadian->id }}"
                                            @if (old('kejadian_resiko') == $kejadian->id) selected @endif>{{ $kejadian->nama }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="space-y-4">
                        <div class="mb-4">
                            <label for="tipe_sumber_risiko" class="block mb-2 font-bold text-gray-700">Tipe Sumber
                                Risiko</label>
                            <input type="text" id="tipe_sumber_risiko" name="tipe_sumber_risiko"
                                class="px-3 py-2 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline"
                                placeholder="Masukkan Tipe Sumber Risiko">
                        </div>

                        <div class="mb-4">
                            <label for="penyebab" class="block mb-2 font-bold text-gray-700">Penyebab</label>
                            <textarea id="penyebab" name="penyebab"
                                class="px-3 py-2 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline"
                                rows="3" placeholder="Masukkan Penyebab"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="area_dampak" class="block mb-2 font-bold text-gray-700">Area Dampak</label>
                            <input type="text" id="area_dampak" name="area_dampak"
                                class="px-3 py-2 w-full leading-tight text-gray-700 rounded border shadow appearance-none focus:outline-none focus:shadow-outline"
                                placeholder="Masukkan Area Dampak">
                        </div>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <button type="submit"
                        class="px-6 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">Simpan</button>
                </div>
            </form>
        </div>
    </div>



    <script>
        function openModal() {
            document.getElementById('formModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('formModal').classList.add('hidden');
            $('#resikoForm').trigger('reset');
            $('#resikoForm').attr('action', '{{ route('resiko.store') }}');
            $('input[name="_method"]').remove();
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            var modal = document.getElementById('formModal');
            if (event.target == modal) {
                closeModal();
            }
        }

        // Existing JavaScript
        $(document).ready(function() {
            $('#kategori_resiko').change(function() {
                var kategoriId = $(this).val();
                if (kategoriId) {
                    $.ajax({
                        url: '/getSubKategori/' + kategoriId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#sub_kategori').empty();
                            $('#sub_kategori').append(
                                '<option value="">Pilih Sub Kategori</option>');
                            $.each(data, function(key, value) {
                                $('#sub_kategori').append('<option value="' + value.id +
                                    '">' + value.nama + '</option>');
                            });
                        }
                    });
                } else {
                    $('#sub_kategori').empty();
                    $('#sub_kategori').append('<option value="">Pilih Sub Kategori</option>');
                }
            });

            $('#kelompok_resiko').change(function() {
                var kelompokId = $(this).val();
                if (kelompokId) {
                    $.ajax({
                        url: '/getKejadianRisiko/' + kelompokId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#kejadian_resiko').empty();
                            $('#kejadian_resiko').append(
                                '<option value="">Pilih Kejadian Risiko</option>');
                            $.each(data, function(key, value) {
                                $('#kejadian_resiko').append('<option value="' + value
                                    .id + '">' + value.deskripsi + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            $('#kejadian_resiko').empty();
                            $('#kejadian_resiko').append(
                                '<option value="">Pilih Kejadian Risiko</option>');
                        }
                    });
                } else {
                    $('#kejadian_resiko').empty();
                    $('#kejadian_resiko').append('<option value="">Pilih Kejadian Risiko</option>');
                }
            });
        });

        function editRisiko(id) {
            $.ajax({
                url: `/risiko/${id}/edit`,
                type: 'GET',
                success: function(response) {
                    // Fill form with existing data
                    $('#kategori_resiko').val(response.kategori_risiko_id);
                    $('#kategori_resiko').trigger('change'); // Trigger change to load sub categories
                    setTimeout(() => {
                        $('#sub_kategori').val(response.sub_kategori_id);
                    }, 500);

                    $('#kelompok_resiko').val(response.kelompok_risiko_id);
                    $('#kelompok_resiko').trigger('change'); // Trigger change to load kejadian
                    setTimeout(() => {
                        $('#kejadian_resiko').val(response.kejadian_risiko_id);
                    }, 500);

                    $('#tipe_sumber_risiko').val(response.tipe_sumber_risiko);
                    $('#penyebab').val(response.penyebab);
                    $('#area_dampak').val(response.area_dampak);

                    // Change form action and method for update
                    $('#resikoForm').attr('action', `/risiko/${id}`);
                    $('#resikoForm').append('<input type="hidden" name="_method" value="PUT">');

                    // Show modal
                    openModal();
                }
            });
        }

        function deleteRisiko(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    url: `/risiko/${id}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert('Data berhasil dihapus');
                        location.reload();
                    },
                    error: function(xhr) {
                        alert('Terjadi kesalahan saat menghapus data');
                    }
                });
            }
        }
    </script>

@endsection
