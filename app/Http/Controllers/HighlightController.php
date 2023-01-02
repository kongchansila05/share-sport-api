<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Highlight;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
class HighlightController extends Controller
{
    public function index()
    {
        $Highlight = Highlight::select('id','date','title','category','photo','detail' )->latest()->get();
        return view('admin/highlight/index', compact('Highlight'));
    }
    public function create()
    {
        $category = Category::select('id', 'name')->get();
        return view('admin/highlight/create', compact('category'));
    }
    public function store(Request $request)
    {
        if ($request->photo) {
            $photo = time() .'-' .$request->photo->getClientOriginalName();
            $request->photo->move('upload', $photo);
        }
        if ($request->video) {
            $video = time() .'-' .$request->video->getClientOriginalName();
            $request->video->move('upload', $video);
        }
        Highlight::create([
            'video'       => $video ?? '',
            'photo'       => $photo ?? '',
            'date'  =>date('Y-m-d H:i:s' , strtotime($request->date)),
            'title'       => $request->title,
            'category'    => $request->category,
            'detail'      => $request->detail,
        ]);

        Alert::success('Create HighLight Successful');
        return redirect('/highlight');
    }

    public function question($id)
    {
        alert()->question('Delete HighLight !', 'Are you sure?')
        ->showConfirmButton('<a href="/highlight/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()
        ->showCancelButton('Back', '#aaa')->reverseButtons();

        return redirect('/highlight');
    }
    public function destroy($id)
    {
        $Highlight = Highlight::select('photo', 'id')->whereId($id)->firstOrFail();
        File::delete('upload' . $Highlight->photo);
        $Highlight->delete();
        Alert::success('Successful', 'HighLight is Deleted');
        return redirect('/highlight');
    }
    public function show(Highlight $highlight)
    {
        //
    }
    public function edit(Highlight $highlight , $id)
    {
        $category = Category::select('id', 'name')->get();
        $highlight = Highlight::select('id','date','title','category','photo','detail')->whereId($id)->firstOrFail();
        return view('admin/highlight/edit', compact('category','highlight'));
    }
    public function update(Request $request, Highlight $highlight ,$id)
    {
        $Highlight = Highlight::select('photo','video', 'id')->whereId($id)->first();
        $data = [
            'date'  =>date('Y-m-d H:i:s' , strtotime($request->date)),
            'category' => $request->category,
            'photo'    => $request->photo,
            'video'    => $request->video,
            'title'    => $request->title,
            'detail'   => $request->detail,
        ];
        if (!$request->photo) {
            $data['photo'] = $Highlight->photo;
        }
        elseif ($request->photo) {
            File::delete('upload/' .$Highlight->photo);
            $photo = time() . '-' . $request->photo->getClientOriginalName();
            $request->photo->move('upload', $photo);
            $data['photo'] = $photo;
        }
        if (!$request->video) {
            $data['video'] = $Highlight->video;
        }
        elseif ($request->video) {
            File::delete('upload/' .$Highlight->video);
            $video = time() . '-' . $request->video->getClientOriginalName();
            $request->video->move('upload', $video);
            $data['video'] = $video;
        }
        $Highlight->update($data);
        Alert::success('Successful', 'HighLight is Edited');
        return redirect('/highlight');
    }
}
