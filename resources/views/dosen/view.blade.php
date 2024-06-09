<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Dosen') }}
        </h2>
    </x-slot>

    <div class="py-13">

        <x-validation-errors class="mb-4" :erorrs=$errors />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg white overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <x-input-label for="nid" :value="__('Nomor Induk Dosen')" />
                    <x-text-input id="nid" class="block mt-1 w-full" type="text" name="nid" :value="$dosens->nid"
                        disabled readonly autofocus />
                </div>

                <div>
                    <x-input-label for="nama_dosen" :value="__('Nama')" />
                    <x-text-input id="nama_dosen" class="block mt-1 w-full" type="text" name="nama_dosen"
                        :value="$dosens->nama_dosen" disabled readonly autofocus />
                </div>

                <div>
                    <x-input-label for="tempat_lahir" :value="__('Tempat Lahir')" />
                    <x-text-input id="tempat_lahir" class="block mt-1 w-full" type="text" name="tempat_lahir"
                        :value="$dosens->tempat_lahir" disabled readonly autofocus />
                </div>

                <div>
                    <x-input-label for="tanggal_lahir" :value="__('Tanggal lahir')" />
                    <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir"
                        :value="$dosens->tanggal_lahir" disabled readonly autofocus />
                </div>

                <div>
                    <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                    <select id="jenis_kelamin" class="block mt-1 w-full rounded-md " name="jenis_kelamin"
                        value="$dosens->jenis_kelamin" disabled readonly >
                        <option value="laki-laki" {{ old('jenis_kelamin') === 'laki-laki' ? 'selected' : '' }}>Laki-laki
                        </option>
                        <option value="perempuan" {{ old('jenis_kelamin') === 'perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
                </div>

                <div>
                    <x-input-label for="status_id" :value="__('Status')" />
                    <select id="status_id" class="block mt-1 w-full rounded-md " name="status_id" disabled readonly>
                        <option value="1" {{ old('status_id') === '1' ? 'selected' : '' }}>Aktif</option>
                        <option value="2" {{ old('status_id') === '2' ? 'selected' : '' }}>Cuti</option>
                        <option value="3" {{ old('status_id') === '3' ? 'selected' : '' }}>Pensiun</option>
                    </select>
                </div>

                <div>
                    <x-input-label for="alamat_dosen" :value="__('Alamat')" />
                    <x-text-input id="alamat_dosen" class="block mt-1 w-full" type="text" name="alamat_dosen"
                        :value="$dosens->alamat_dosen" disabled readonly autofocus />
                </div>

                <div>
                    <x-input-label for="email_dosen" :value="__('Email')" />
                    <x-text-input id="email_dosen" class="block mt-1 w-full" type="text" name="email_dosen"
                        :value="$dosens->email_dosen" disabled readonly autofocus />
                </div>

                <div>
                    <x-input-label for="nomor_telepon" :value="__('Nomor Telepon')" />
                    <x-text-input id="nomor_telepon" class="block mt-1 w-full" type="text" name="nomor_telepon"
                        :value="$dosens->nomor_telepon" disabled readonly autofocus />
                </div>

                <div class="flex items-center mt-4">
                    <x-secondary-button type="button" onclick="window.history.back()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M11.293 4.293a1 1 0 011.414 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        Back
                    </x-secondary-button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-4 bg-gray-200 text-center relative bottom-0 w-full z-1">
        <div class="container mt-4">
            <p class="text-gray-600">Copyright © 2024 Kelompok | 4</p>
        </div>
    </footer>


</x-app-layout>
