<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('pages.barang.index')->withBarangs($barangs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $suppliers = Supplier::all();
        return view('pages.barang.create')->withCategories($categories)->withBrands($brands)->withSuppliers($suppliers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = new Barang();
        $barang->nama = $request->get('name');
        $barang->diskripsi = $request->get('diskripsi');
        $barang->reference = $request->get('diskripsi');
        $barang->spesifikasi = $request->get('spesifikasi');
        $barang->kategori = $request->get('kategori');
        $barang->brand = $request->get('brand');
        $barang->supplier = $request->get('supplier');
        $barang->harga_jual = $request->get('harga_jual');
        $barang->harga_beli = $request->get('harga_beli');
        $barang->stok = $request->get('stok');
        if ($request->hasFile('gambar_produk')) {
            $gambar = $request->file('gambar_produk');
            $nama_gambar = $gambar->getClientOriginalName();
            $gambar->move(public_path('gambar-produk', $nama_gambar));
            $barang->gambar = $nama_gambar;
        }
        $barang->save();
        if ($barang) {
            Session::flash('status','Barang berhasil ditambahkan');
            Alert::success('Berhasil', 'Barang berhasil ditambahkan');
        }

        return redirect()->back();
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('pages.barang.edit')->withBarang($barang);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        if ($barang) {
            Session::flash('status', 'Barang berhasil dihapus');
            Alert::success('Berhasil', 'Barang berhasil dihapus');
        }
        return redirect()->back();
    }
}
