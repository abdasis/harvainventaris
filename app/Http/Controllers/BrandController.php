<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('pages.brands.index')->withBrands($brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brands = new Brand();
        $brands->name = $request->get('name');
        $brands->status = $request->get('status');
        if ($request->hasFile('logo_brand')) {
            $images = $request->file('logo_brand');
            $images_name = Str::slug($request->get('name'), '-') . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('brand-logos'), $images_name);
            $brands->logo_brand = $images_name;
        }
        $brands->save();
        if ($brands) {
            Session::flash('status', 'Data brand berhasil di tambahkan');
            Alert::success('Berhasil', 'Data berhasil di tambahkan');
            return redirect()->back();
        }
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
        $brand = Brand::find($id);
        return view('pages.brands.edit')->withBrand($brand);
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
        $brands = Brand::find($id);
        $brands->name = $request->get('name');
        $brands->status = $request->get('status');
        if ($request->hasFile('logo_brand')) {
            if ($brands->logo_brand && file_exists(public_path('brand-logos', $brands->logo_brand))) {
                File::delete(public_path('brand-logos', $brands->logo_brand));
            }
            $images = $request->file('logo_brand');
            $images_name = Str::slug($request->get('name'), '-') . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('brand-logos'), $images_name);
            $brands->logo_brand = $images_name;
        }else{
            $brands->logo_brand = $brands->logo_brand;
        }
        $brands->save();
        if ($brands) {
            Session::flash('status', 'Data brand berhasil di tambahkan');
            Alert::success('Berhasil', 'Data berhasil di tambahkan');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        if ($brand) {
            Session::flash('status', 'Data berhasil dihapus');
            Alert::success('Berhasil', 'Data berhasil di hapus');
            return redirect()->back();
        }
    }
}
