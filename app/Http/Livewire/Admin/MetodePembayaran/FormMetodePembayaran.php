<?php

namespace App\Http\Livewire\Admin\MetodePembayaran;

use App\Models\MetodePembayaran;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormMetodePembayaran extends Component
{
    use WithFileUploads;

    public $metodePembayaran;
    public $logo, $kode_pembayaran, $jenis_pembayaran, $keterangan, $old_logo;

    public function mount($id = null)
    {
        if ($id) {
            $data_metode = MetodePembayaran::find($id)->first();
            $this->kode_pembayaran = $data_metode->kode_pembayaran;
            $this->jenis_pembayaran = $data_metode->jenis_pembayaran;
            $this->keterangan = $data_metode->keterangan;
            $this->old_logo = $data_metode->logo;

            $this->metodePembayaran = $data_metode;
        }
    }

    public function updatedLogo()
    {
        $this->validate([
            "logo" => "nullable|image|mimes:jpeg,png,jpg,webp",
        ]);
    }

    public function store()
    {
        try {
            $validated = $this->validate([
                "kode_pembayaran" => "required|unique:metode_pembayaran,kode_pembayaran",
                "jenis_pembayaran" => "required",
                "keterangan" => "required"
            ]);

            $payment_system = str_replace(" ", " ", $this->jenis_pembayaran);

            //simpan gambar di storage/app/public
            $filename = $this->storeImg($this->logo, $payment_system);

            $validated["logo"] = $filename;

            //simpan data metode pembayaran di mysql
            MetodePembayaran::create($validated);

            //clear al temporary file
            $this->clearTemporaryFiles();

            return redirect()->route("metodePembayaran.index")->with("status", "success")->with("msg", "Data berhasil disimpan");
        } catch (\Throwable $th) {
            //throw $th;

            //clear al temporary file
            $this->clearTemporaryFiles();
            Log::info("error metode pembayaran store", ["msg" => $th->getMessage()]);
            return redirect()->route("metodePembayaran.index")->with("status", "error")->with("msg", "Data gagal disimpan");
        }
    }

    public function update($id)
    {
        try {
            $validated = $this->validate([
                "kode_pembayaran" => "required|unique:metode_pembayaran,kode_pembayaran,$id",
                "jenis_pembayaran" => "required",
                "keterangan" => "required"
            ]);

            if ($this->old_logo != $this->logo && $this->logo) {
                $payment_system = str_replace(" ", " ", $this->jenis_pembayaran);
                //simpan gambar di storage/app/public
                $filename = $this->storeImg($this->logo, $payment_system);

                // Hapus file logo lama (use storage:link yang dihapus file di folder storagenya)
                $old_file_path = storage_path("app\public\assets\logo\\" . $this->old_logo);
                if (file_exists($old_file_path)) {
                    unlink($old_file_path);
                }

                //clear al temporary file
                $this->clearTemporaryFiles();
                $validated["logo"] = $filename;
            } else {
                $validated["logo"] = $this->old_logo;
            }

            $metode = MetodePembayaran::find($id);
            $metode->kode_pembayaran = $validated["kode_pembayaran"];
            $metode->jenis_pembayaran = $validated["jenis_pembayaran"];
            $metode->keterangan = $validated["keterangan"];
            $metode->logo = $validated["logo"];
            $metode->save();

            return redirect()->route("metodePembayaran.index")->with("status", "success")->with("msg", "Data berhasil diupdate");
        } catch (\Throwable $th) {
            //throw $th;

            //clear al temporary file
            $this->clearTemporaryFiles();
            Log::info("error metode pembayaran store", ["msg" => $th->getMessage()]);
            return redirect()->route("metodePembayaran.index")->with("status", "error")->with("msg", "Data gagal diupdate " . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.metode-pembayaran.form-metode-pembayaran');
    }

    public function storeImg($logo, $keterangan)
    {
        $filename = $keterangan . "." . $this->logo->extension();
        $logo->storeAs('assets/pay-logo', $filename);
        return $filename;
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
