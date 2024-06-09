<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Dosen') }}
        </h2>
    </x-slot>


    <div class="py-6">
        <div class="max-w-sm mx-auto sm:px-6 lg:px-8">

            <x-success-status class="mb-4" :status="session('message')" />
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ url('/export') }}" class="btn btn-primary btn-sm" style="margin-bottom: 10px;"><i class="fas fa-edit"></i> Download Excel</a>
                <a href="{{ url('/export-pdf') }}" class="btn btn-danger btn-sm" style="margin-bottom: 10px;"><i class="fas fa-edit"></i> Download PDF</a>
                <table class="table table-bordered">
                    <thead>
                        <tr style="background-color: #082564; color: white;">
                            <th class="text-xs w-5" style="text-align: center;">ID</th>
                            <th class="text-xs w-10" style="text-align: center;">NIDN</th>
                            <th class="text-xs w-10" style="text-align: center;">Status</th>
                            <th class="text-xs w-15" style="text-align: center;">Nama Dosen</th>
                            <th class="text-xs w-10" style="text-align: center;">Tempat Lahir</th>
                            <th class="text-xs w-10" style="text-align: center;">Tanggal Lahir</th>
                            <th class="text-xs w-10" style="text-align: center;">Jenis Kelamin</th>
                            <th class="text-xs w-15" style="text-align: center;">Alamat</th>
                            <th class="text-xs w-15" style="text-align: center;">Email</th>
                            <th class="text-xs w-10" style="text-align: center;">Nomor Telepon</th>
                            <th class="text-xs w-15" style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dosens as $dosen)
                        <tr>
                            <td class="text-xs w-5">{{ $dosen->id }}</td>
                            <td class="text-xs w-10">{{ $dosen->nid }}</td>
                            <td class="text-xs w-10">{{ $dosen->status->status }}</td>
                            <td class="text-xs w-15">{{ $dosen->nama_dosen }}</td>
                            <td class="text-xs w-10">{{ $dosen->tempat_lahir }}</td>
                            <td class="text-xs w-10">{{ $dosen->tanggal_lahir }}</td>
                            <td class="text-xs w-10">{{ $dosen->jenis_kelamin }}</td>
                            <td class="text-xs w-15">{{ $dosen->alamat_dosen }}</td>
                            <td class="text-xs w-15">{{ $dosen->email_dosen }}</td>
                            <td class="text-xs w-10">{{ $dosen->nomor_telepon }}</td>
                            <td class="text-xs w-15">
                                <div style="display: flex; justify-content: center; align-items: center;">
                                    <a href="{{ url('/edit-dosen/'.$dosen->id) }}" class="btn btn-primary btn-sm " style="margin-right: 5px;"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="{{ url('/view-dosen/'.$dosen->id) }}" class="btn btn-primary btn-sm btn-success" style="color: #fff; margin-right: 5px;">View</a>
                                    <form id="delete-form-{{$dosen->id}}" action="{{url('delete-dosen/'.$dosen->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="button" class="btn btn-danger btn-sm delete-confirm" data-id="{{$dosen->id}}" style="background-color: #d33; border-color: #d33;"><i class="fas fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" style="text-align: left;"> No Record Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- SweetAlert Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        // Script to handle delete confirmation with SweetAlert
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-confirm');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    const dosenId = e.target.dataset.id;
                    Swal.fire({
                        title: 'Serius Arep DiHapus?',
                        text: "Data akan dihapus permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form-' + dosenId).submit();
                        }
                    });
                });
            });
        });
    </script>

    <!-- Footer -->
    <footer class="py-4 bg-gray-200 text-center absolute bottom-0 w-full">
        <div class="container">
            <p style="color: blue;">
                <!-- Tautan di sekitar teks -->
                <a href="https://yourwebsite.com" style="color: rgb(55, 55, 207); text-decoration: none;">Copyright © 2024 Kelompok 4 | 2024</a>
            </p>
        </div>
    </footer>




</x-app-layout>
