<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\sepaatuCreateRequest;
use App\Http\Requests\sepatuUpdateRequest;
use App\Models\Brands;
use App\Models\Kategori;
use App\Models\Sepatu;
use App\Models\SepatuFoto;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class sepatuController extends Controller
{
    public function index()
    {

        return view('backend.sepatu.index');
    }

    public function showCreate()
    {
        $sepatu = Sepatu::all();
        $kategori = Kategori::orderby('nama', 'asc')->get();
        $brands = Brands::orderby('nama', 'asc')->get();
        return view('backend.sepatu.create', compact('sepatu', 'kategori', 'brands'));
    }
    public function create(sepaatuCreateRequest $request)
    {

        $data = $request->validated();



        // Simpan data sepatu
        $sepatu = Sepatu::create($data);
        $sepatu->created_at = Carbon::now();
        $sepatu->save();

        //Memproses file foto
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $foto) {
                // Buat nama unik untuk setiap file gambar yang diunggah
                $filename = time() . '_' . $foto->getClientOriginalName();

                // Lokasi penyimpanan file
                $path = 'images/sepatu/' . $filename;

                // Menggunakan Intervention Image untuk mengubah ukuran gambar
                $image = Image::make($foto)->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });

                // Menyimpan gambar ke storage dengan disk 'public'
                Storage::disk('public')->put($path, (string) $image->encode());

                // Simpan path foto ke tabel 'sepatu_fotos'
                SepatuFoto::create([
                    'sepatu_id' => $sepatu->id,
                    'foto' => $path,
                ]);
            }
        }

        // Simpan ukuran sepatu
        if ($request->has('ukuran')) {
            foreach ($request->ukuran as $ukuran) {
                Size::create([
                    'sepatu_id' => $sepatu->id,
                    'ukuran' => $ukuran,
                ]);
            }
        }

        session()->flash('success', 'Sepatu Created Successfully.');

        return redirect()->route('sepatu.all');
    }


    public function showEdit($slug)
    {
        $sepatu = Sepatu::where('slug', $slug)->firstOrFail();
        $kategori = Kategori::orderby('nama', 'asc')->get();
        $brands = Brands::orderby('nama', 'asc')->get();
        $size = Size::where('sepatu_id', $sepatu->id)->get();
        $sepatufoto = SepatuFoto::where('sepatu_id', $sepatu->id)->get();
        return view('backend.sepatu.edit', compact('sepatu', 'kategori', 'brands', 'size', 'sepatufoto'));
    }

    public function sizeDelete($id)
    {
        $size = Size::find($id);

        if ($size) {
            $size->delete();
            session()->flash('success', 'Size Delete Successfully.');
        } else {
            session()->flash('error', 'Size not found.');
        }

        return back();
    }

    public function sepatuFotoDelete($id)
    {
        $foto = SepatuFoto::find($id);

        if ($foto) {
            $foto->delete();
            session()->flash('success', 'Foto Delete Successfully.');
        } else {
            session()->flash('error', 'Foto not found.');
        }

        return back();
    }

    public function update(SepatuUpdateRequest $request)
    {

        $sepatu_id = $request->id;
        $sepatu = Sepatu::findOrFail($sepatu_id);

        // Validasi dan ambil data dari request
        $data = $request->validated();

        // Update sepatu dengan data baru
        $sepatu->fill($data);
        $sepatu->updated_at = Carbon::now(); // Jika perlu
        $sepatu->save(); // Simpan data sepatu



        // Jika ada file foto yang diupload, lakukan proses upload
        if ($request->hasFile('foto') && !empty($request->file('foto'))) {
            foreach ($request->file('foto') as $foto) {
                $filename = time() . '_' . $foto->getClientOriginalName();
                $path = 'images/sepatu/' . $filename;

                $image = Image::make($foto)->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });

                // Simpan gambar ke storage
                Storage::disk('public')->put($path, (string) $image->encode());

                // Simpan path foto ke tabel 'sepatu_fotos'
                SepatuFoto::create([
                    'sepatu_id' => $sepatu->id,
                    'foto' => $path,
                ]);
            }
        }

        // Jika ada ukuran baru yang diinputkan, simpan ukuran tersebut
        if ($request->has('ukuran') && !empty($request->ukuran)) {
            foreach ($request->ukuran as $ukuran) {
                Size::create([
                    'sepatu_id' => $sepatu->id,
                    'ukuran' => $ukuran,
                ]);
            }
        }

        // Flash success message
        session()->flash('success', 'Sepatu berhasil di-update.');

        // Redirect ke halaman sepatu.all
        return redirect()->route('sepatu.all');
    }

    public function sepatuDelete($id)
    {
        // Cari sepatu berdasarkan ID
        $sepatu = Sepatu::find($id);

        // Jika sepatu tidak ditemukan, tampilkan pesan error
        if (!$sepatu) {
            session()->flash('error', 'Sepatu tidak ditemukan.');
            return back();
        }

        // Hapus foto yang terkait dengan sepatu
        $foto = SepatuFoto::where('sepatu_id', $id);
        if ($foto->exists()) {
            $foto->delete();
        }

        // Hapus size yang terkait dengan sepatu
        $size = Size::where('sepatu_id', $id);
        if ($size->exists()) {
            $size->delete();
        }

        // Hapus sepatu itu sendiri
        $sepatu->delete();

        // Tampilkan pesan sukses
        session()->flash('success', 'Sepatu berhasil dihapus.');

        return back();
    }
}
