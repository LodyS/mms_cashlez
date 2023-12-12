<?php

namespace App\Http\Controllers;
use DataTables;
use DB;
use Auth;
use App\Models\DokumenApplicant;
use App\Http\Requests\DokumenApplicantRequest;
use Illuminate\Http\Request;

class DokumenApplicantController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()):
            $data = DB::table('t_document_applicant')->select('*');

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
              
                $actionBtn = button_edit('dokumen-applicant.edit', $row->id);
                $actionBtn .= button_delete(route('dokumen-applicant.destroy', [$row->id]));

                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        endif;

        return view('dokumen-applicant/index');
    }

    public function create()
    {
        return view('dokumen-applicant/form');
    }

    public function store(DokumenApplicantRequest $request)
    {
        $req = $request->validated();
        $data = DokumenApplicant::create($req);

        return redirect('/dokumen-applicant')->with('success', 'Berhasil tambah data');
    }

    public function edit(DokumenApplicant $dokumenApplicant)
    {
        return view('dokumen-applicant/form', compact('dokumenApplicant'));
    }

    public function update(DokumenApplicantRequest $request, DokumenApplicant $dokumenApplicant)
    {
        $dokumenApplicant->update($request->validated());

        return redirect('/dokumen-applicant')->with('success', 'Data berhasil di update');
    }

    public function destroy (DokumenApplicant $dokumenApplicant)
    {
        $dokumenApplicant->delete();

        return response()->json(['success'=>"Delete Data Successfly."]);
    }
}
