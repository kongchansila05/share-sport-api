<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Highlight;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Popular;
use App\Models\Article;
use App\Models\Livestream;
use Carbon\Carbon;
class ApiController extends Controller
{
    public function getPopular(Request $request)
    {
       $Popular = Popular::latest()->paginate(10);
       return response()->json($Popular);
    }
    public function getPopularWhere(Request $request,$id)
    {
       $Popular =  Popular::Where('id',$id)->get();
       return response()->json($Popular);
    }
    public function getHighlight(Request $request)
    {
       $Highlight = Highlight::latest()->paginate(10);
       return response()->json($Highlight);
    }
    public function getHighlightWhere(Request $request,$id)
    {
       $Highlight =  Highlight::Where('id',$id)->get();
       return response()->json($Highlight);
    }
    public function getArticle(Request $request)
    {
      $Article = Article::latest()->paginate(10);
       return response()->json($Article);
    }
    public function getArticleWhere(Request $request,$id)
    {
       $Article =  Article::Where('id',$id)->get();
       return response()->json($Article);
    }
    public function getCategory(Request $request)
    {
       $category = Category::get();
       return response()->json($category);
    }
    public function getBanner(Request $request)
    {
       $Banner = Banner::get();
       return response()->json($Banner);
    }
    public function getHighlightCategory(Request $request,$id)
    {
        $HighlightCategory =  Highlight::Where('category',$id)->get();
        return response()->json($HighlightCategory);
    }
    public function getLivestream(Request $request)
    {
       $Livestream = Livestream::select('id','date','title','live_id','server_id','photo','detail' )
       ->whereDate('created_at', Carbon::today())->get();
      // $Livestream = Livestream::select('id','date','title','photo','detail' )->get();
       if($Livestream != '[]'){
         $response =[
            'status' => true,
            'data' => $Livestream,
         ];
       }
      else{
         $response =[
            'status' => false,
            'data' => null
         ];
      }
          
       return response()->json($response);
    }
    public function getLiveWhere(Request $request,$id)
    {
       $Livestream =  Livestream::Where('id',$id)->get();
       return response()->json($Livestream);
    }
}
