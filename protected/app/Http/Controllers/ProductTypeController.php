<?php

namespace App\Http\Controllers;
use DataTables;
use DB;
use Auth;
use App\Models\ProductType;
use App\Http\Requests\ProductTypeRequest;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index (Request $request)
    {
        if($request->ajax()):

            $data = DB::table('t_product_type')->select('*');

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
         
                $actionBtn = button_edit('product-type.edit', $row->id);
                $actionBtn .= button_delete(route('product-type.destroy', [$row->id]));

                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);

        endif;

        return view ('product-type/index');
    }

    public function create()
    {
        return view('product-type/form');
    }

    public function store(ProductTypeRequest $request)
    {
        $req = $request->validated();
        $data = ProductType::create($req);

        return redirect('/product-type')->with('success', 'Berhasil tambah Kategori');
    }

    public function edit(ProductType $productType)
    {
        return view('product-type/form', compact('productType'));
    }

    public function update(ProductTypeRequest $request, ProductType $productType)
    {
        $productType->update($request->validated());

        return redirect('/product-type')->with('success', 'Kategori berhasil di update');
    }

    public function destroy (ProductType $productType)
    {
        $productType->delete();

        return response()->json(['success'=>"Delete Data Successfly."]);
    }
}
