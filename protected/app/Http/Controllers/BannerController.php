<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use DataTables;
use App\Models\Banner;
use App\Traits\UploadFile;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    use UploadFile;
    
    public function index(Request $request)
    {
        if ($request->ajax()):

            $data = DB::table('banner_ads');

            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('banner', function($row){
                $img = '<img src="'.url('protected/storage/banner/'.$row->banner_images).'" width="100px"></img>';
                $img .= '<div style="height:20px"></div>';
                $img .= lihat_foto('protected/storage/banner', $row->banner_images);

                return $img;
            })
            ->addColumn('action', function($row){
                $actionBtn = button_edit('banner.edit', $row->id);
                $actionBtn .= button_delete(route('banner.destroy', [$row->id]));

                return $actionBtn;
            })
            ->escapeColumns([])
            ->rawColumns(['action'])
            ->make(true);

        endif;

        return view('banner/index');
    }

    public function create ()
    {
        return view('banner/form');
    }

    public function store (BannerRequest $request)
    {
        if ($request->hasFile('banner_images')):
            $banner_file = $this->upload($request->file('banner_images'), '', 'banner', 'Tambah');
        endif;

        $req = $request->validated();
        $req['banner_images'] = $banner_file ?? '';
   
        Banner::create($req);

        return redirect('/banner')->with('success', 'Berhasil tambah Banner');
    }

    public function edit(Banner $banner)
    {
        return view('banner/form', compact('banner'));
    }

    public function update (Request $request, Banner $banner)
    {
        if ($request->hasFile('banner_images')):
            $banner_file = $this->upload($request->file('banner_images'), $banner->banner_images, 'banner', 'Edit');
        endif;

        $req = $request->except('_token');
        $req['banner_images'] = $banner_file ?? $banner->banner_images;

        $banner->update($req); 

        return redirect('/banner')->with('success', 'Berhasil update Banner');
    }

    public function destroy (Banner $banner)
    {
        $hapus_foto = $this->upload($banner->banner_images, '', 'banner', 'Hapus');
        $banner->delete();

        return response()->json(['success'=>"Data berhasil di hapus."]);
    }
}
