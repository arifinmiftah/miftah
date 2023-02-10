<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Transaksi;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function kategori()
    {
        $kategori = Kategori::all();
        return view('kategori', ['kategori' => $kategori]);
    }

    public function kategori_tambah()
    {
        return view('kategori_tambah');
    }
    
    public function kategori_aksi(Request $data)
    {
        $data->validate([
            'kategori' => 'required'
        ]);
        $kategori = $data->kategori;
        Kategori::insert([
            'kategori' => $kategori
        ]);
        return redirect('kategori')->with("sukses", "Kategori berhasil tersimpan");
    }
    public function kategori_edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori_edit', ['kategori' => $kategori]);
    }
    public function kategori_update($id, Request $data)
    {

        // form validasi
        $data->validate([
            'kategori' => 'required'
        ]);
        $nama_kategori = $data->kategori;

        // update kategori
        $kategori = Kategori::find($id);
        $kategori->kategori = $nama_kategori;
        $kategori->save();

        // alihkan halaman ke halaman kategori
        return redirect('kategori')->with("sukses", "Kategori berhasil diubah");
    }

    public function kategori_hapus($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('kategori')->with("sukses", "Kategori berhasil dihapus");
    }

    public function transaksi()
    {
        // mengambil data transaksi
        $transaksi = Transaksi::with('kategori')->get();
        // passing data transaksi ke view transaksi.blade.php
        return view('transaksi', ['transaksi' => $transaksi]);
    }

    public function transaksi_tambah()
    {
        // mengambil data kategori
        $kategori = kategori::all();
        // passing data kategori ke view transaksi_tambah.blade.php
        return view('transaksi_tambah', ['kategori' => $kategori]);
    }

    public function transaksi_aksi(Request $data)
    {
        // validasi tanggal,jenis,kategori,nominal wajib isi
        $data->validate([
            'tanggal' => 'required',
            'jenis' => 'required',
            'kategori' => 'required',
            'nominal' => 'required'
        ]);
        // insert data ke table transaksi
        Transaksi::insert([
            'tanggal' => $data->tanggal,
            'jenis' => $data->jenis,
            'kategori_id' => $data->kategori,
            'nominal' => $data->nominal,
            'keterangan' => $data->keterangan
        ]);
        // alihkan halaman ke halaman transaksi sambil mengirim session pesan notifikasi
        return redirect('transaksi')->with("sukses", "Transaksi berhasil tersimpan");
    }
}
