<?php

namespace App\Http\Controllers;

use App\Models\Popular;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
class PopularController extends Controller
{
    public function index()
    {
        $Popular = Popular::latest()->get();
        return view('admin/popular/index', compact('Popular'));
    }
    public function create()
    {
        return view('admin/popular/create');
    }
    public function store(Request $request)
    {
        if ($request->photo) {
            $photo = time() .'-' .$request->photo->getClientOriginalName();
            $request->photo->move('upload', $photo);
        }
        Popular::create([
            'photo'       => $photo ?? '',
            'date'  =>date('Y-m-d H:i:s' , strtotime($request->date)),
            'title'       => $request->title,
            'detail'       => $request->detail,
        ]);

        Alert::success('Create Popular Successful');
        return redirect('/popular');
    }

    public function question($id)
    {
        alert()->question('Delete Popular !', 'Are you sure?')
        ->showConfirmButton('<a href="/popular/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()
        ->showCancelButton('Back', '#aaa')->reverseButtons();

        return redirect('/popular');
    }
    public function destroy($id)
    {
        $popular = Popular::select('photo', 'id')->whereId($id)->firstOrFail();
        File::delete('upload' . $popular->photo);
        $popular->delete();
        Alert::success('Successful', 'popular is Deleted');
        return redirect('/popular');
    }
    public function show(popular $popular)
    {
        //
    }
    public function edit(popular $popular , $id)
    {
        $popular = Popular::whereId($id)->firstOrFail();
        return view('admin/popular/edit', compact('popular'));
    }
    public function update(Request $request, popular $popular ,$id)
    {
        $popular = Popular::select('photo', 'id')->whereId($id)->first();
        $data = [
            'date'  =>date('Y-m-d H:i:s' , strtotime($request->date)),
            'photo'    => $request->photo,
            'title'     => $request->title,
            'detail'     => $request->detail,
        ];
        if (!$request->photo) {
            $data['photo'] = $popular->photo;
        }
        elseif ($request->photo) {
            File::delete('upload/' .$popular->photo);
            $photo = time() . '-' . $request->photo->getClientOriginalName();
            $request->photo->move('upload', $photo);
            $data['photo'] = $photo;
        }
        $popular->update($data);
        Alert::success('Successful', 'Popular is Edited');
        return redirect('/popular');
    }
}
