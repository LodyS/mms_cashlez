<?php

namespace App\Http\Controllers;
use DB;
use DataTables;
use App\Models\Kategori;
use App\Http\Requests\KategoriRequest;
use Auth;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index (Request $request)
    {
        if($request->ajax()):

            $data = DB::table('kategori')->select('*');

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                
                $actionBtn = button_edit('kategori.edit', $row->id);
                $actionBtn .= button_delete(route('kategori.destroy', [$row->id]),'', '');

                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);

        endif;

        return view ('kategori/index');
    }

    public function create()
    {
        return view('kategori/form');
    }

    public function store(KategoriRequest $request)
    {
        $req = $request->validated();
        $data = Kategori::create($req);

        return redirect('/kategori')->with('success', 'Berhasil tambah Kategori');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori/form', compact('kategori'));
    }

    public function update(KategoriRequest $request, Kategori $Kategori)
    {
        $Kategori->update($request->validated());

        return redirect('/kategori')->with('success', 'Kategori berhasil di update');
    }

    public function destroy (Kategori $kategori)
    {
        $kategori->delete();

        return response()->json(['success'=>"Delete Data Successfly."]);
    }
}
