<?php

namespace App\Http\Controllers;

use App\model\Transaksi;
use App\User;
use Illuminate\Http\Request;
use App\Pegawai;

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

        public function index(){
            $pegawai=Pegawai::paginate(3);
            return view('home', compact('pegawai'));
        }
        public function post(Request $request){
           $request->validate([
               'nama'=>'required',
               'umur'=>'required',
          ]);

          Pegawai::create([
              'nama'=>request('nama'),
              'umur'=>request('umur'),
          ]);
          return back()->with('success','berhasil tambah data');
        }
        public function edit(Pegawai $pegawai){
            return view('edit', compact('pegawai'));
          }
          public function update(Pegawai $pegawai){
            request()->validate([
                'nama'=>'required',
                'umur'=>'required',

           ]);
           $pegawai->update([
            'nama'=>request('nama'),
            'umur'=>request('umur'),

           ]);
           return redirect(route('home'))->with('success', 'data pegawai berhasil diupdate');
          }

        public function destroy(Pegawai $pegawai)
        {
            $pegawai->delete();
            return back()->with('success', 'data pegawai  berhasil dihapus');
        }

        public function cari(Request $request){
            $cari = $request->cari;
            $pegawai = Pegawai::where('nama','like',"%".$cari."%")->paginate(3);
            return view('home', compact('pegawai'));
        }



}
