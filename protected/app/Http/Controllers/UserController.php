<?php

namespace App\Http\Controllers;
use DB;
use DataTables;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index (Request $request)
    {
        if($request->ajax()):

            $data = User::with(['jabatan'])->where('privilege_user_id', '<>', 0);

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){

                $actionBtn = button_edit('users.edit', $row->id);
                $actionBtn .= button_delete(route('users.destroy', [$row->id]));

                return $actionBtn;
            })

            ->addColumn('jabatan', function($row){
                return $row->jabatan->privilege_title ?? '';
            })
            ->rawColumns(['action'])
            ->make(true);

        endif;

        return view ('user/index');
    }

    public function create()
    {
        $jabatan = DB::table('privilege_user')->get();

        return view('user/form', compact('jabatan'));
    }

    public function store(UserRequest $request)
    {
        $req = $request->validated();
        $data = User::create($req);

        return redirect('/users')->with('success', 'Berhasil tambah Bank');
    }

    public function edit(User $user)
    {
        $jabatan = DB::table('privilege_user')->get();

        return view('user/form', compact('user', 'jabatan'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();
       
        if (empty($data['password'])):
            unset($data['password']);
            $user->update($data);
        else:
            $user->update($data);
        endif;

        return redirect('/users')->with('success', 'Bank berhasil di update');
    }

    public function destroy (User $user)
    {
        $user->delete();

        return response()->json(['success'=>"Delete Data Successfly."]);
    }
}
