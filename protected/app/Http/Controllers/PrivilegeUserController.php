<?php

namespace App\Http\Controllers;
use DB;
use DataTables;
use Auth;
use App\Models\PrivilegeUser;
use App\Http\Requests\PrivilegeUserRequest;
use Illuminate\Http\Request;

class PrivilegeUserController extends Controller
{
    public function index (Request $request)
    {
        if($request->ajax()):

            $data = DB::table('privilege_user')->where('id', '<>', 1);

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = button_edit('privilege-user.edit', $row->id);
                $actionBtn .= button_delete(route('privilege-user.destroy', [$row->id]));

                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);

        endif;

        return view ('privilege-user/index');
    }

    public function create()
    {
        return view('privilege-user/form');
    }

    public function store(PrivilegeUserRequest $request)
    {
        $req = $request->validated();
        $data = PrivilegeUser::create($req);

        return redirect('/privilege-user')->with('success', 'Berhasil tambah data');
    }

    public function edit(PrivilegeUser $privilegeUser)
    {
        return view('privilege-user/form', compact('privilegeUser'));
    }

    public function update(PrivilegeUserRequest $request, PrivilegeUser $privilegeUser)
    {
        $privilegeUser->update($request->validated());

        return redirect('/privilege-user')->with('success', 'Data berhasil di update');
    }

    public function destroy (PrivilegeUser $privilegeUser)
    {
        $privilegeUser->delete();

        return response()->json(['success'=>"Delete Data Successfly."]);
    }
}
