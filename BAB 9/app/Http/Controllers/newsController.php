<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class newsController extends Controller
{
    public function index()
    {
        $berita = news::all();
        return view('news.index', compact('berita'));
    }

    public function create()
    {
        return view('news.news-entry');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|file|mimes:png,jpg,jpeg|max:2048',
            'kategori' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
        ]);

        $gambar = $request->file('foto');
        $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
        $tujuan_upload = 'img_categories';
        $gambar->move($tujuan_upload, $nama_gambar);

        news::create([
            'foto' => $nama_gambar,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
        ]);

        return redirect('/news');
    }

    public function edit($id)
    {
        $berita = news::find($id);
        return view('news.news-edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'foto' => 'nullable|file|mimes:png,jpg,jpeg|max:2048', // Ganti 'required' dengan 'nullable'
            'kategori' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
        ]);

        $berita = news::find($id);

        if ($request->hasFile('foto')) {
            File::delete('img_categories/' . $berita->foto); // Ganti 'gambar' dengan 'foto'
            $gambar = $request->file('foto');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $tujuan_upload = 'img_categories';
            $gambar->move($tujuan_upload, $nama_gambar);
            $berita->foto = $nama_gambar; // Ganti 'gambar' dengan 'foto'
        } else {
            $nama_gambar = $berita->foto; // Gunakan nilai yang sudah ada jika tidak ada file baru yang diunggah
        }

        $berita->update([
            'foto' => $nama_gambar,
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
        ]);

        return redirect('/news');
    }

    public function delete($id)
    {
        $berita = news::find($id);
        return view('news.news-hapus', compact('berita'));
    }

    public function destroy($id)
    {
        $berita = news::find($id);
        File::delete('img_categories/' . $berita->foto); // Ganti 'gambar' dengan 'foto'
        $berita->delete();
        return redirect('/news');
    }
}
