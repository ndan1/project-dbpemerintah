<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Str;


class BeritaController extends Controller
{
    function BuatBerita(Request $request) {
        $request->validate([
            'judul_berita' => 'required|string',
            'isi_berita' => 'required|string',
            'foto_berita' => 'required|file',
        ]);
        $berita = new Berita();
        $berita->judul_berita = $request->judul_berita;
        $berita->isi_berita = $request->isi_berita;
        $fileName = time().$request->file('foto_berita')->getClientOriginalName();
        $path = $request->file('foto_berita')->storeAs('images/berita', $fileName, 'public');
        $berita->foto_berita ='/storage/'.$path;

        $berita->save();
        return redirect()->route('show.berita')->with('success', 'Pertantaan baru berhasil ditambahkan.');
    }

    public function ShowBeritaAdmin() {
        $berita = Berita::get();
        return view('admin.adminberita')->with('berita', $berita);;
    }

    public function ShowBeritaMasyarakat() {
        $berita = Berita::get();
        return view('berita')->with('berita', $berita);
    }
    public function ShowBeritaDetail($id) {
        $berita = Berita::findOrFail($id);
        return view('detailberita')->with('berita', $berita);
    }

    public function EditBeritaForm($id) {
        $berita = Berita::find($id);
        return view('admin.editBerita', ['berita' => $berita, 'id' => $id]);
    }

    public function EditBerita(Request $request, $id) {
        $berita = Berita::findOrFail($id);
        $berita->judul_berita = $request->judul_berita;
        $berita->isi_berita = $request->isi_berita;
        $fileName = time().$request->file('foto_berita')->getClientOriginalName();
        $path = $request->file('foto_berita')->storeAs('images/berita', $fileName, 'public');
        $berita->foto_berita ='/storage/'.$path;
        $berita->save();

        // Redirect ke halaman tertentu atau kembali ke halaman sebelumnya
        return redirect()->route('show.berita')->with('success', 'berita updated successfully');
    }

    public function DeleteBerita($id) {
        $berita = Berita::find($id);
        $berita->delete();
        return redirect()->route('show.berita')->with('success', 'Berita deleted successfully');
    }
}
