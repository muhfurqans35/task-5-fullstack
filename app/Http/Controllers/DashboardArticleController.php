<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use Illuminate\Support\Facades\Storage;
class DashboardArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.articles.index', [
            'articles'=>article::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('dashboard.articles.create',[
            'categories'=>Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData =$request->validate([
            'title'=>'required|max:255',
            'slug'=> 'required|unique:articles',
            'category_id'=> 'required',
            'image'=> 'image|file|max:2048',
            'content'=>'required'
        ]);
        
        if($request->file('image')){
            $validatedData['image'] =$request->file('image')->store('article-images');
        }

        $validatedData['user_id']= auth()->user()->id;
        $validatedData['excerpt']= Str::limit(strip_tags($request->content), 200);

        article::create($validatedData);
        
        return redirect('dashboard/articles')->with('success', 'New article has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(article $article)
    {
        return view('dashboard.articles.show',[
            'article'=> $article
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(article $article)
    {
        return view ('dashboard.articles.edit',[
            'categories'=>Category::all(),
            'article'=> $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, article $article)
    {
        $rules =[
            'title'=>'required|max:255',
            'category_id'=> 'required',
            'image'=> 'image|file|max:2048',
            'content'=>'required'
        ];


        if($request->slug != $article->slug){
            $rules['slug']='required|unique:articles';
        }

        $validatedData =$request->validate($rules);

        if($request->file('image')){
            if ($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] =$request->file('image')->store('article-images');
        }

        $validatedData['user_id']= auth()->user()->id;
        $validatedData['excerpt']= Str::limit(strip_tags($request->content), 200);

        article::where('id', $article->id)
                ->update($validatedData);
        
        return redirect('dashboard/articles')->with('success', 'New article has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(article $article)
    {
        if ($article->image){
            Storage::delete($article->image);
        }
        article::destroy($article->id);
        return redirect('dashboard/articles')->with('success', 'Article has been deleted!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(article::class, 'slug', $request->title);
        return response()->json (['slug'=>$slug]);
    }
}
