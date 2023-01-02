<?php

namespace App\Http\Controllers;

use App\Models\Livestream;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
class LivestreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Livestream = Livestream::select('id','date','live_id','server_id','title','photo','detail' )->latest()->get();
        return view('admin/livestream/index', compact('Livestream'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/livestream/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'photo'       => 'required',
        ]);
        if ($request->photo) {
            $photo = time() .'-' .$request->photo->getClientOriginalName();
            $request->photo->move('upload', $photo);
        }
        Livestream::create([
            'photo'       => $photo ?? '',
            'date'  =>date('Y-m-d H:i:s' , strtotime($request->date)),
            'title'       => $request->title,
            'live_id'     => $request->live_id,
            'server_id'   => $request->server_id,
            'detail'      => $request->detail,
        ]);

        Alert::success('Create Livestream Successful');
        return redirect('/livestream');
    }
    public function question($id)
    {
        alert()->question('Delete Livestream !', 'Are you sure?')
        ->showConfirmButton('<a href="/livestream/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()
        ->showCancelButton('Back', '#aaa')->reverseButtons();

        return redirect('/livestream');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livestream  $livestream
     * @return \Illuminate\Http\Response
     */
    public function show(Livestream $livestream)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livestream  $livestream
     * @return \Illuminate\Http\Response
     */
    public function edit(Livestream $livestream,$id)
    {
        $Livestream = Livestream::select('id','date','title','live_id','server_id','photo','detail')->whereId($id)->firstOrFail();
        return view('admin/livestream/edit', compact('Livestream'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livestream  $livestream
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livestream $livestream , $id)
    {
        $livestream = Livestream::select('photo', 'id')->whereId($id)->first();
        $data = [
            'date'  =>date('Y-m-d H:i:s' , strtotime($request->date)),
            'photo'    => $request->photo,
            'title'     => $request->title,
            'live_id'     => $request->live_id,
            'server_id'   => $request->server_id,
            'detail'   => $request->detail,
        ];
        if (!$request->photo) {
            $data['photo'] = $livestream->photo;
        }
        elseif ($request->photo) {
            File::delete('upload/' .$livestream->photo);
            $photo = time() . '-' . $request->photo->getClientOriginalName();
            $request->photo->move('upload', $photo);
            $data['photo'] = $photo;
        }
        $livestream->update($data);
        Alert::success('Successful', 'Livestream is Edited');
        return redirect('/livestream');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livestream  $livestream
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livestream = Livestream::select('photo', 'id')->whereId($id)->firstOrFail();
        File::delete('upload' . $livestream->photo);
        $livestream->delete();
        Alert::success('Successful', 'Livestream is Deleted');
        return redirect('/livestream');
    }
}
