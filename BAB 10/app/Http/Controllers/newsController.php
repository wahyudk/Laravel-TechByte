<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;

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
            'foto' => 'nullable|file|mimes:png,jpg,jpeg|max:2048',
            'kategori' => 'required',
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
        ]);

        $berita = news::find($id);

        if ($request->hasFile('foto')) {
            File::delete('img_categories/' . $berita->foto);
            $gambar = $request->file('foto');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $tujuan_upload = 'img_categories';
            $gambar->move($tujuan_upload, $nama_gambar);
            $berita->foto = $nama_gambar;
        } else {
            $nama_gambar = $berita->foto;
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
        File::delete('img_categories/' . $berita->foto);
        $berita->delete();
        return redirect('/news');
    }

    public function view_pdf()
    {
        $berita = news::all();
        $pdf = Pdf::loadView('pdf.news', ['berita' => $berita]);
        return $pdf->download('Berita.pdf');
    }
}
