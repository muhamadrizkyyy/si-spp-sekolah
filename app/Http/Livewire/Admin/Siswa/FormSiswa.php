<?php

namespace App\Http\Livewire\Admin\Siswa;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Carbon\Carbon;
use Livewire\Component;

class FormSiswa extends Component
{
    public $siswa;

    //untuk menampilkan data kelas,jurusan,tahun ajaran
    public $data_kelas, $data_jurusan, $data_thn_ajaran;

    // property untuk simpan data form sesuai wire:model
    public $nisn, $nama, $gender, $tgl_lahir, $alamat, $kelas, $jurusan, $thn_ajaran, $thn_ajaran_masuk;

    public function mount($siswa = null)
    {
        $this->siswa = $siswa;

        //set data
        $this->data_kelas = Kelas::all();
        $this->data_jurusan = Jurusan::all();
        $this->data_thn_ajaran = TahunAjaran::all();

        // set data ke form untuk edit
        if ($siswa != null) {
            //konversi format tanggal SQL to m/d/Y
            $set_tanggal = Carbon::createFromFormat('Y-m-d', $siswa->tgl_lahir)->format('m/d/Y');

            $this->nisn = $siswa->nisn;
            $this->nama = $siswa->nama;
            $this->gender = $siswa->gender;
            $this->tgl_lahir = $set_tanggal;
            $this->alamat = $siswa->alamat;
            $this->kelas = $siswa->kelas_id;
            $this->jurusan = $siswa->jurusan_id;
            $this->thn_ajaran = $siswa->thn_ajaran;
            $this->thn_ajaran_masuk = $siswa->thn_ajaran_masuk;
        }
    }

    public function store()
    {
        // Konversi input tanggal
        $tanggal = Carbon::createFromFormat('m/d/Y', $this->tgl_lahir)->format('Y-m-d');
        $this->tgl_lahir = $tanggal;

        $this->validate([
            'nisn' => 'required|min:10|unique:siswa,nisn',
            'nama' => 'required',
            'gender' => 'required',
            'tgl_lahir' => 'required|date|date_format:Y-m-d',
            'alamat' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'thn_ajaran' => 'required',
        ]);

        //simpan data
        $siswa = Siswa::create([
            'nisn' => $this->nisn,
            'nama' => $this->nama,
            'gender' => $this->gender,
            'tgl_lahir' => $this->tgl_lahir,
            'alamat' => $this->alamat,
            'kelas_id' => $this->kelas,
            'jurusan_id' => $this->jurusan,
            'thn_ajaran' => $this->thn_ajaran,
            'thn_ajaran_masuk' => $this->thn_ajaran,
        ]);

        if ($siswa) {
            return redirect()->route('siswa.index')->with("status", "success")->with('msg', 'Data berhasil disimpan');
        } else {
            return redirect()->back();
        }
    }

    public function update($id)
    {
        // Konversi input tanggal to format SQL
        $tanggal = Carbon::createFromFormat('m/d/Y', $this->tgl_lahir)->format('Y-m-d');
        $this->tgl_lahir = $tanggal;

        $this->validate([
            'nisn' => 'required|min:10|unique:siswa,nisn,' . $id,
            'nama' => 'required',
            'gender' => 'required',
            'tgl_lahir' => 'required|date|date_format:Y-m-d',
            'alamat' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'thn_ajaran' => 'required',
            'thn_ajaran_masuk' => 'required',
        ]);

        $siswa = Siswa::find($id);
        $siswa->update([
            'nisn' => $this->nisn,
            'nama' => $this->nama,
            'gender' => $this->gender,
            'tgl_lahir' => $this->tgl_lahir,
            'alamat' => $this->alamat,
            'kelas_id' => $this->kelas,
            'jurusan_id' => $this->jurusan,
            'thn_ajaran' => $this->thn_ajaran,
            'thn_ajaran_masuk' => $this->thn_ajaran_masuk,
        ]);

        if ($siswa) {
            return redirect()->route('siswa.index')->with("status", "success")->with('msg', 'Data berhasil diupdate');
        } else {
            return redirect()->back();
        }
    }

    public function render()
    {
        return view('livewire.admin.siswa.form-siswa');
    }
}
