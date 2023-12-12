<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Models\Bank;
use DataTables;
use App\Http\Requests\BankRequest;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index (Request $request)
    {
        if($request->ajax()):

            $data = DB::table('t_bank_slik_data')->select('*');

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
            
                $actionBtn = button_edit('bank.edit', $row->id);
                $actionBtn .= button_delete(route('bank.destroy', [$row->id]));

                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);

        endif;

        return view ('bank/index');
    }

    public function create()
    {
        return view('bank/form');
    }

    public function store(BankRequest $request)
    {
        $req = $request->validated();
        $data = Bank::create($req);

        return redirect('/bank')->with('success', 'Berhasil tambah Bank');
    }

    public function edit(Bank $bank)
    {
        return view('bank/form', compact('bank'));
    }

    public function update(BankRequest $request, Bank $bank)
    {
        $bank->update($request->validated());

        return redirect('/bank')->with('success', 'Bank berhasil di update');
    }

    public function destroy (Bank $bank)
    {
        $bank->delete();

        return response()->json(['success'=>"Delete Data Successfly."]);
    }
}
