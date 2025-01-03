<?php

namespace App\Http\Livewire\Admin\Setting;

use App\Models\identitasWeb;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormSetting extends Component
{
    use WithFileUploads;

    public $logo, $file_logo;
    public $nama_institusi, $motto, $old_logo, $alamat, $deskripsi, $no_telp, $email, $usn_ig, $usn_fb, $usn_tiktok;

    public function mount()
    {
        $setting = identitasWeb::first();
        if ($setting) {
            $this->nama_institusi = $setting->nama_institusi;
            $this->motto = $setting->motto;
            $this->old_logo = $setting->logo;
            $this->alamat = $setting->alamat;
            $this->deskripsi = $setting->deskripsi;
            $this->no_telp = $setting->no_telp;
            $this->email = $setting->email;
            $this->usn_ig = $setting->usn_ig;
            $this->usn_fb = $setting->usn_fb;
            $this->usn_tiktok = $setting->usn_tiktok;
        }
    }

    public function updated($propertyName)
    {
        $this->validate([
            "nama_institusi" => "required",
            "motto" => "required",
            "alamat" => "required",
            "deskripsi" => "required",
            "no_telp" => "required",
            "email" => "required",
            "usn_ig" => "required",
            "usn_fb" => "required",
            "usn_tiktok" => "required",
        ]);

        if ($this->logo) {
            $this->validate(["logo" => "image|mimes:jpeg,png,jpg,webp"]);
        }
    }

    public function update()
    {
        try {
            // Pengecekan upload logo
            if ($this->logo != $this->old_logo) {
                $filename = "logo" . now()->format("dmy") . random_int(100, 999) . "." . $this->logo->extension();
                $this->logo->storeAs('assets/logo', $filename);
                $this->file_logo = $filename;

                // Hapus file logo lama (use storage:link yang dihapus file di folder storagenya)
                $old_file_path = storage_path("app\public\assets\logo\\" . $this->old_logo);
                if (file_exists($old_file_path)) {
                    unlink($old_file_path);
                }

                //clear al temporary file
                $this->clearTemporaryFiles();
            }



            $setting = identitasWeb::first();
            $setting->nama_institusi = $this->nama_institusi;
            $setting->motto = $this->motto;
            $setting->logo = $this->file_logo;
            $setting->alamat = $this->alamat;
            $setting->deskripsi = $this->deskripsi;
            $setting->no_telp = $this->no_telp;
            $setting->email = $this->email;
            $setting->usn_ig = $this->usn_ig;
            $setting->usn_fb = $this->usn_fb;
            $setting->usn_tiktok = $this->usn_tiktok;
            $setting->save();

            return redirect()->route("setting")->with('status', 'success')->with('msg', 'Berhasil mengubah data');
        } catch (\Exception $e) {
            // Tangkap error dan log
            logger()->error('Image upload error: ' . $e->getMessage());

            $this->clearTemporaryFiles();

            return redirect()->route("setting")->with('status', 'error')->with('msg', 'Gagal mengubah data, silakan coba lagi ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.setting.form-setting');
    }

    // Fungsi untuk menghapus file sementara
    public function clearTemporaryFiles()
    {
        $tmpFiles = glob(storage_path('app\public\livewire-tmp\*'));

        //hapus seluruh file temporary yang ada
        foreach ($tmpFiles as $tmpFile) {
            if (is_file($tmpFile)) {
                unlink($tmpFile); // Hapus file sementara
            }
        }
    }
}
