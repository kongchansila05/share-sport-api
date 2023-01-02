<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Article = Article::select('id','date','title','photo','photo1','detail' )->latest()->get();
        return view('admin/article/index', compact('Article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/article/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->photo) {
            $photo = time() .'-' .$request->photo->getClientOriginalName();
            $request->photo->move('upload', $photo);
        }
        if ($request->photo1) {
            $photo1 = time() .'-' .$request->photo1->getClientOriginalName();
            $request->photo1->move('upload', $photo1);
        }
        Article::create([
            'photo'       => $photo ?? '',
            'photo1'       => $photo1 ?? '',
            'date'  =>date('Y-m-d H:i:s' , strtotime($request->date)),
            'title'       => $request->title,
            'detail'      => $request->detail,
        ]);
        Alert::success('Create Article Successful');
        return redirect('/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article,$id)
    {
        $Article = Article::select('id','date','title','photo','photo1','detail')->whereId($id)->firstOrFail();
        return view('admin/article/edit', compact('Article'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article,$id)
    {
        $article = Article::select('photo', 'id')->whereId($id)->first();
        $data = [
            'date'  =>date('Y-m-d H:i:s' , strtotime($request->date)),
            'photo'    => $request->photo,
            'photo1'    => $request->photo1,
            'title'     => $request->title,
            'detail'   => $request->detail,
        ];
        if (!$request->photo1) {
            $data['photo1'] = $article->photo1;
        }
        elseif ($request->photo1) {
            File::delete('upload/' .$article->photo1);
            $photo1 = time() . '-' . $request->photo1->getClientOriginalName();
            $request->photo1->move('upload', $photo1);
            $data['photo1'] = $photo1;
        }

        if (!$request->photo) {
            $data['photo'] = $article->photo;
        }
        elseif ($request->photo) {
            File::delete('upload/' .$article->photo);
            $photo = time() . '-' . $request->photo->getClientOriginalName();
            $request->photo->move('upload', $photo);
            $data['photo'] = $photo;
        }
        $article->update($data);
        Alert::success('Successful', 'Article is Edited');
        return redirect('/article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */

     public function question($id)
     {
         alert()->question('Delete Article !', 'Are you sure?')
         ->showConfirmButton('<a href="/article/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()
         ->showCancelButton('Back', '#aaa')->reverseButtons();
 
         return redirect('/article');
     }
     public function destroy($id)
     {
         $Article = Article::select('photo', 'photo1', 'id')->whereId($id)->firstOrFail();
         File::delete('upload' . $Article->photo);
         File::delete('upload' . $Article->photo1);
         $Article->delete();
         Alert::success('Successful', 'Article is Deleted');
         return redirect('/article');
     }
}
