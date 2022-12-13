<?php

namespace App\Http\Controllers;

use App\Models\showrooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ShowroomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        $mycar = showrooms::where('user_id',$id_user)->get();
        if (count($mycar) == 0) {
            
            return view('ERLANGGA_ADDCAR', compact('mycar'));
        }elseif (count($mycar) != 0){
            return view('ERLANGGA_MYCAR', compact('mycar'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ERLANGGA_ADDCAR');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imgName = $request->foto->getClientOriginalName() . '-' . time()
            . '.' . $request->foto->extension();
        $request->foto->move(public_path('gambar_mobil'), $imgName);

        showrooms::create([
            'user_id' => Auth::user()->id,
            'name' => $request->nama,
            'owner' => $request->pemilik,
            'brand' => $request->merk,
            'purchase_date' => $request->tanggal,
            'description' => $request->deskripsi,
            'image' => $imgName,
            'status' => $request->status_pembayaran,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\showrooms  $showrooms
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_mobil = showrooms::where('id', $id)->firstOrFail();
        return view('ERLANGGA_DETAILCAR', compact('data_mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\showrooms  $showrooms
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_mobil = showrooms::where('id', $id)->firstOrFail();
        return view('ERLANGGA_EDITCAR', compact(''));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\showrooms  $showrooms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $showroom = showrooms::find($id);
        $imgName = "";
        if ($request->foto) {
            $imgName = $request->foto->getClientOriginalName() . '-' . time()
                . '.' . $request->foto->extension();
            $request->foto->move(public_path('gambar_mobil'), $imgName);
        }elseif ($request -> foto == null){
            $imgName = $showroom->image;
        }


        showrooms::find($id)->update([
            'user_id' => Auth::user()->id,
            'name' => $request->nama,
            'owner' => $request->pemilik,
            'brand' => $request->merk,
            'purchase_date' => $request->tanggal,
            'description' => $request->deskripsi,
            'image' => $imgName,
            'status' => $request->status_pembayaran,
        ]);

        return redirect('/showroom');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\showrooms  $showrooms
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        showrooms::find($id)->delete();
        return redirect('/showroom');
    }
}
