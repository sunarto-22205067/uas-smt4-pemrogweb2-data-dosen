<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Dosen') }}
        </h2>
    </x-slot>

    <div class="py-12">


        <x-success-status class="mb-4" :status="session('message')" />

        <x-validation-errors class="mb-4" :erorrs=$errors />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ url('add-dosen') }}" method="POST">
                    @csrf

                    <!-- SweetAlert Nid sudah ada -->
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div>
                        <x-input-label for="nid" :value="__('Nomor Induk Dosen')" />
                        <x-text-input id="nid" class="block mt-1 w-full" type="text" name="nid"
                            :value="old('nid')" autofocus />
                    </div>

                    <div>

                        <x-input-label for="nama_dosen" :value="__('Nama')" />
                        <x-text-input id="nama_dosen" class="block mt-1 w-full" type="text" name="nama_dosen"
                            :value="old('nama_dosen')" autofocus />
                    </div>

                    <div>
                        <x-input-label for="tempat_lahir" :value="__('Tempat Lahir')" />
                        <x-text-input id="tempat_lahir" class="block mt-1 w-full" type="text" name="tempat_lahir"
                            :value="old('tempat_lahir')" autofocus />
                    </div>

                    <div>
                        <x-input-label for="tanggal_lahir" :value="__('Tanggal lahir')" />
                        <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir"
                            :value="old('tanggal_lahir')" autofocus />
                    </div>

                    <div>
                        <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                        <select id="jenis_kelamin" class="block mt-1 w-full rounded-md " name="jenis_kelamin" autofocus>
                            <option value="laki-laki" {{ old('jenis_kelamin') === 'laki-laki' ? 'selected' : '' }}>Pilih
                            </option>
                            <option value="laki-laki" {{ old('jenis_kelamin') === 'laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="perempuan" {{ old('jenis_kelamin') === 'perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <x-input-label for="status_id" :value="__('Status')" />
                        <select id="status_id" class="block mt-1 w-full rounded-md " name="status_id" autofocus>
                            <option value="1" {{ old('status_id') === '1' ? 'selected' : '' }}>Pilih</option>
                            <option value="1" {{ old('status_id') === '1' ? 'selected' : '' }}>Aktif</option>
                            <option value="2" {{ old('status_id') === '2' ? 'selected' : '' }}>Cuti</option>
                            <option value="3" {{ old('status_id') === '3' ? 'selected' : '' }}>Pensiun</option>
                        </select>
                    </div>

                    <div>
                        <x-input-label for="alamat_dosen" :value="__('Alamat')" />
                        <x-text-input id="alamat_dosen" class="block mt-1 w-full" type="text" name="alamat_dosen"
                            :value="old('alamat_dosen')" autofocus />
                    </div>

                    <div>
                        <x-input-label for="nomor_telepon" :value="__('Nomor Telepon')" />
                        <x-text-input id="nomor_telepon" class="block mt-1 w-full" type="text" name="nomor_telepon"
                            :value="old('nomor_telepon')" autofocus />
                    </div>
                    <div>
                        <x-input-label for="email_dosen" :value="__('Email')" />
                        <x-text-input id="email_dosen" class="block mt-1 w-full" type="text" name="email_dosen"
                            :value="old('email_dosen')" autofocus />
                    </div>

                    <div class="flex justify-between items-center mt-4">
                        <button type="button" onclick="window.history.back()"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 active:bg-gray-400 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M11.293 4.293a1 1 0 011.414 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            Back
                        </button>

                        <button type="reset" onclick="resetForm()"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 active:bg-gray-400 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M13.5 15a.5.5 0 01-.5.5h-7a.5.5 0 010-1h7a.5.5 0 01.5.5zm-3.405-7.521a4.462 4.462 0 00-1.156.152 6.473 6.473 0 00-1.4.5 1.458 1.458 0 00-.448.27c-.128.112-.275.258-.396.425a.5.5 0 00.828.564c.1-.14.205-.272.317-.393.11-.12.23-.238.354-.344a6.233 6.233 0 011.342-.677 4.94 4.94 0 011.138-.305c-.055-.064-.118-.132-.183-.206a.5.5 0 10-.683.732zm-1.532 1.907a.5.5 0 01-.71-.703A3.496 3.496 0 009 8c0-1.925-1.575-3.5-3.5-3.5S2 6.075 2 8s1.575 3.5 3.5 3.5c.55 0 1.069-.128 1.532-.355a.5.5 0 01.375.924z"
                                    clip-rule="evenodd" />
                                <path d="M11.922 7.002a.5.5 0 00-.492-.41H5.57a.5.5 0 000 1h5.86a.5.5 0 00.492-.59z" />
                            </svg>
                            Reset
                        </button>

                        <x-primary-button class="ms-3">
                            {{ __('Simpen') }}
                        </x-primary-button>
                    </div>

                    <script>
                        function resetForm() {
                            document.getElementById("add-dosen-form").reset();
                        }
                    </script>

                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="py-4 pt-0 bg-gray-200 text-center relative bottom-0 w-full z-1">
        <div class="container mt-0">
            <p class="text-gray-600">Copyright © 2024 Kelompok | 4</p>
        </div>
    </footer>
</x-app-layout>
