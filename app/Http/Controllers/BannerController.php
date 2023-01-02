<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::select('id','name','photo')->latest()->get();
        return view('admin/banner/index', compact('banner'));
    }
    public function create()
    {
        return view('admin/banner/create');
    }
    public function store(Request $request)
    {
        if ($request->photo) {
            $photo = time() .'-' .$request->photo->getClientOriginalName();
            $request->photo->move('banner', $photo);
        }
        Banner::create([
            'photo'       => $photo ?? '',
            'name'       => $request->name,
        ]);

        Alert::success('Create banner Successful');
        return redirect('/banner');
    }

    public function question($id)
    {
        alert()->question('Delete banner !', 'Are you sure?')
        ->showConfirmButton('<a href="/banner/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()
        ->showCancelButton('Back', '#aaa')->reverseButtons();

        return redirect('/banner');
    }
    public function destroy($id)
    {
        $banner = Banner::select('photo', 'id')->whereId($id)->firstOrFail();
        File::delete('upload' . $banner->photo);
        $banner->delete();
        Alert::success('Successful', 'banner is Deleted');
        return redirect('/banner');
    }
    public function show(banner $banner)
    {
        //
    }
    public function edit(banner $banner , $id)
    {
        $banner = Banner::select('id','name','photo')->whereId($id)->firstOrFail();
        return view('admin/banner/edit', compact('banner'));
    }
    public function update(Request $request, banner $banner ,$id)
    {
        $banner = Banner::select('photo','name', 'id')->whereId($id)->first();
        $data = [
            'photo'    => $request->photo,
            'name'     => $request->name,
        ];
        if (!$request->photo) {
            $data['photo'] = $banner->photo;
        }
        elseif ($request->photo) {
            File::delete('banner/' .$banner->photo);
            $photo = time() . '-' . $request->photo->getClientOriginalName();
            $request->photo->move('banner', $photo);
            $data['photo'] = $photo;
        }
        $banner->update($data);
        Alert::success('Successful', 'banner is Edited');
        return redirect('/banner');
    }
}
