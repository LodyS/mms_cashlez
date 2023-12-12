<?php

namespace App\Http\Controllers;
use App\Models\Alasan;
use DataTables;
use Illuminate\Http\Request;
use App\Http\Requests\AlasanRequest;

class AlasanController extends Controller
{
    public function index (Request $request)
    {
        if($request->ajax()):

            $data = Alasan::query();

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
            
                $actionBtn = button_edit('alasan.edit', $row->id);
                $actionBtn .= button_delete(route('alasan.destroy', [$row->id]));

                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);

        endif;

        return view ('alasan/index');
    }

    public function create()
    {
        return view('alasan/form');
    }

    public function store(AlasanRequest $request)
    {
        $req = $request->validated();
        $data = Alasan::create($req);

        return redirect('/alasan')->with('success', 'Berhasil tambah data alasan');
    }

    public function edit(Alasan $alasan)
    {
        return view('alasan/form', compact('alasan'));
    }

    public function update(alasanRequest $request, Alasan $alasan)
    {
        $alasan->update($request->validated());

        return redirect('/alasan')->with('success', 'alasan berhasil di update');
    }

    public function destroy (Alasan $alasan)
    {
        $alasan->delete();

        return response()->json(['success'=>"Delete Data Successfly."]);
    }
}
