<?php

namespace App\Http\Controllers;
use DB;
use DataTables;
use App\Models\Region;
use App\Http\Requests\RegionRequest;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index (Request $request)
    {
        if($request->ajax()):

            $data = DB::table('regionlisting')->select('*');

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = button_edit('region.edit', $row->id);
                $actionBtn .= button_delete(route('region.destroy', [$row->id]));

                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);

        endif;

        return view ('region/index');
    }

    public function create()
    {
        return view('region/form');
    }

    public function store(RegionRequest $request)
    {
        $req = $request->validated();
        $data = Region::create($req);

        return redirect('/region')->with('success', 'Berhasil tambah region');
    }

    public function edit(Region $region)
    {
        return view('region/form', compact('region'));
    }

    public function update(regionRequest $request, Region $region)
    {
        $region->update($request->validated());

        return redirect('/region')->with('success', 'region berhasil di update');
    }

    public function destroy (Region $region)
    {
        $region->delete();

        return response()->json(['success'=>"Delete Data Successfly."]);
    }
}
