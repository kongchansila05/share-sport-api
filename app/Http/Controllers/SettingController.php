<?php



namespace App\Http\Controllers;

use App\Models\Bot;

use App\Models\Category;
use App\Models\Banner;

use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\File;

use Illuminate\Support\Str;

class SettingController extends Controller

{

    //  * Category 

    public function category()

    {

        $Category = Category::select('id', 'name','code','photo')->latest()->get();

        return view('admin/setting/category', compact('Category'));

    }
    public function add_banner()
    {
        return view('admin/setting/add_banner');
    }
    public function category_store(Request $request)

    {

        $request->validate([

            'name'       => 'required',

            'code'       =>  ['required', 'unique:category'],

        ]);

        Category::create([

            'name'        => $request->name,

            'code'        => $request->code,

            'slug'        => Str::slug($request->code, '-')

        ]);

        Alert::success('Create Category Successful');

        return redirect('/category');

    }

    public function category_update(Request $request, Category $category)

    {

        $id = $request->id;

        $category = Category::select('photo', 'id','code','name')->whereId($id)->first();

    

        $request->validate([

            'name' => 'required',

            'code' => 'required',

        ]);

        $data = [

            'name'        => $request->name   ?? $category->name,

            'code'        => $request->code   ?? $category->code,

        ];

        $category->update($data);

        Alert::success('Successful', 'Category is Edited');

        return redirect('/category');

    }

    public function category_destroy(Category $category ,$id)

    {

        $category = Category::select('photo', 'id')->whereId($id)->firstOrFail();

        File::delete('upload/' . $category->photo);

        $category->delete();

        Alert::success('Successful', 'Category is Deleted');

        return redirect('/category');

    }

    public function category_question($id)
    {

        alert()->question('Delete Category !', 'Are you sure?')

        ->showConfirmButton('<a href="/category/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()

        ->showCancelButton('Back', '#aaa')->reverseButtons();



        return redirect('/category');

    }

    //  * Banner 
    public function banner()
    {

        $banner = Banner::select('id', 'name','video','photo')->latest()->get();

        return view('admin/setting/banner', compact('banner'));

    }
    public function banner_store(Request $request)
    {
        if ($request->photo) {
            $photo = time() .'-' .$request->photo->getClientOriginalName();
            $request->photo->move('banner', $photo);
        }
        if ($request->video) {
            $video = time() .'-' .$request->video->getClientOriginalName();
            $request->video->move('banner', $video);
        }
        Banner::create([
            'photo'       => $photo ?? '',
            'video'       => $video ?? '',
            'name'       => $request->name,
        ]);
        Alert::success('Create Banner Successful');

        return redirect('/banner');

    }
    public function banner_update(Request $request, Banner $Banner)
    {
        $id = $request->id;

        $Banner = Banner::select('photo', 'id')->whereId($id)->first();
        $data = [
            'name'     => $request->name,
            'photo'    => $request->photo,
        ];
        if (!$request->photo) {
            $data['photo'] = $Banner->photo;
        }
        elseif ($request->photo) {
            File::delete('banner/' .$Banner->photo);
            $photo = time() . '-' . $request->photo->getClientOriginalName();
            $request->photo->move('banner', $photo);
            $data['photo'] = $photo;
        }
        $Banner->update($data);

        Alert::success('Successful', 'Banner is Edited');

        return redirect('/banner');

    }
    public function banner_question($id)
    {

        alert()->question('Delete Banner !', 'Are you sure?')

        ->showConfirmButton('<a href="/banner/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()

        ->showCancelButton('Back', '#aaa')->reverseButtons();



        return redirect('/banner');

    }
    public function banner_destroy(Banner $banner ,$id)
    {
        $banner = Banner::select('photo','video', 'id')->whereId($id)->firstOrFail();
        File::delete('banner/' . $banner->photo);
        File::delete('banner/' . $banner->video);
        $banner->delete();
        Alert::success('Successful', 'Banner is Deleted');
        return redirect('/banner');
    }


    public function bot()

    {

        $bot = Bot::select('id','chat_id','bot_id','token')->get();

        return view('admin/setting/bot', compact('bot'));

    }

    public function bot_store(Request $request)

    {

        Bot::create([

            'bot_id'    => $request->bot_id,

            'token'     => $request->token,

            'chat_id'   => $request->chat_id,

        ]);

        Alert::success('Create Bot Successful');

        return redirect('/bot');

    }

    public function bot_update(Request $request, Bot $bot)

    {

        $id = $request->id;

        $bot = Bot::select('id','chat_id','bot_id','token')->whereId($id)->first();

        $data = [

            'bot_id'    => $request->bot_id,

            'token'     => $request->token,

            'chat_id'   => $request->chat_id,

        ];

        $bot->update($data);

        Alert::success('Successful', 'Bot is Edited');

        return redirect('/bot');

    }

    public function bot_question($id)

    {

        alert()->question('Delete Bot !', 'Are you sure?')

        ->showConfirmButton('<a href="/bot/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()

        ->showCancelButton('Back', '#aaa')->reverseButtons();



        return redirect('/bot');

    }

    public function bot_destroy(Bot $bot ,$id)

    {

        $bot = Bot::select('id')->whereId($id)->firstOrFail();

        $bot->delete();

        Alert::success('Successful', 'bot is Deleted');

        return redirect('/bot');

    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        //

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        //

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        //

    }



    /**

     * Display the specified resource.

     *

     * @param  \App\Models\Setting  $setting

     * @return \Illuminate\Http\Response

     */

    public function show(Setting $setting)

    {

        //

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Models\Setting  $setting

     * @return \Illuminate\Http\Response

     */

    public function edit(Setting $setting)

    {

        //

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Models\Setting  $setting

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Setting $setting)

    {

        //

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Models\Setting  $setting

     * @return \Illuminate\Http\Response

     */

    public function destroy(Setting $setting)

    {

        //

    }

}

