<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('pages.suppliers.index')->withSuppliers($suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = [
            'active' => Supplier::where('status', 'active')->count(),
            'inactive' => Supplier::where('status', 'inactive')->count(),
            'total' => Supplier::all()->count(),
        ];
        return view('pages.suppliers.create')->withSuppliers($suppliers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $suppliers = new Supplier();
        $suppliers->name = $request->get('name');
        $suppliers->alamat = $request->get('alamat');
        $suppliers->email = $request->get('email');
        $suppliers->nomor_telepon = $request->get('nomor_telepon');
        $suppliers->status = $request->get('status');
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatar_name = $avatar->getClientOriginalName();
            $avatar->move(public_path('supplier-avatars'), $avatar_name);
            $suppliers->avatar = $avatar_name;
        }
        $suppliers->save();

        if ($suppliers) {
            Session::flash('status', 'Supplier berhasil di tambahkan');
            Alert::success('Berhasil', Session::get('status'));
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
        $supplier = Supplier::find($id);
        return view('pages.suppliers.edit')->withSupplier($supplier);
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
        $suppliers = Supplier::find($id);
        $suppliers->name = $request->get('name');
        $suppliers->alamat = $request->get('alamat');
        $suppliers->email = $request->get('email');
        $suppliers->nomor_telepon = $request->get('nomor_telepon');
        $suppliers->status = $request->get('status');
        if ($request->hasFile('avatar')) {
            if ($suppliers->avatar && file_exists(public_path('supplier-avatars', $suppliers->avatar))) {
                File::delete('supplier-avatars');
            }
            $avatar = $request->file('avatar');
            $avatar_name = $avatar->getClientOriginalName();
            $avatar->move(public_path('supplier-avatars'), $avatar_name);
            $suppliers->avatar = $avatar_name;
        }else{
            $suppliers->avatar = $suppliers->avatar;
        }
        $suppliers->save();

        if ($suppliers) {
            Session::flash('status', 'Supplier berhasil diupdate');
            Alert::success('Berhasil', Session::get('status'));
            return redirect()->route('suppliers.index');;
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
        $suppliers = Supplier::find($id);
        $suppliers->delete();
        if ($suppliers) {
            Session::flash('status', 'Data supplier berhasil dihapus');
            Alert::success('Berhasil', 'Data berhasil dihapus ');
        }
        return redirect()->route('suppliers.create');
    }
}
