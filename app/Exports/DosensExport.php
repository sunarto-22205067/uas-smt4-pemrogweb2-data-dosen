<?php

namespace App\Exports;

use App\Models\Dosen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DosensExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Dosen::all();
        return Dosen::with('status')->get()->map(function($dosen) {
            return [
                'id' => $dosen->id,
                'nid' => $dosen->nid, // Sesuaikan dengan kolom yang ada di tabel dosens
                'status' => $dosen->status->status,
                'name' => $dosen->nama_dosen,
                'tempat_lahir' => $dosen->tempat_lahir,
                'tanggal_lahir' => $dosen->tanggal_lahir,
                'jenis_kelamin' => $dosen->jenis_kelamin,
                'alamat_dosen' => $dosen->alamat_dosen,
                'email_dosen' => $dosen->email_dosen,
                'nomor_telepon' =>$dosen->nomor_telepon
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'NIDN',
            'Status',
            'Nama Dosen',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Alamat',
            'Email',
            'Nomor Telepon',
        ];
    }
}
