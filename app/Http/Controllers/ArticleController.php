<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(5);
        $deletedCount = Article::onlyTrashed()->count();
        return view('articles_index', compact('articles','deletedCount'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auths = DB::select('SELECT * FROM auths;');
        $categories = DB::select('SELECT * FROM categories;');
        return view('article_add', compact('auths','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $article = new Article;
        $article->tieude = $request->input('title');
        $article->ten_bhat = $request->input('song_name');
        $article->ma_tloai = $request->input('category');
        $article->tomtat = $request->input('summary');
        $article->noidung = $request->input('content');
        $article->ma_tgia = $request->input('auth');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //Storage::disk('public')->putFileAs('images', $image, $filename);
            $image->move(public_path('images'), $filename);
            $article->hinhanh = $filename;
        }

        $article->save();

        return redirect()->route('articles.index')
            ->with('success', 'Articles created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $article = DB::select('SELECT * FROM articles JOIN auths ON articles.ma_tgia = auths.id JOIN categories ON articles.ma_tloai = categories.id WHERE articles.id =  ? ;', [$id]);
        return view('article_detail', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = DB::select('SELECT *,articles.id as article_id FROM articles
      JOIN auths  ON articles.ma_tgia = auths.id
      JOIN categories   ON articles.ma_tloai = categories.id WHERE articles.id = ? ;', [$id]);
          $auths = DB::select('SELECT * FROM auths;');
          $categories = DB::select('SELECT * FROM categories;');
        return view('article_edit', compact('article','auths','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail($id);
        $article->tieude= $request->title;
        $article->ten_bhat= $request->song_name;
        $article->ma_tloai= $request->category;
        $article->tomtat= $request->summary;
        $article->noidung= $request->content;
        $article->ma_tgia= $request->auth;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //Storage::disk('public')->putFileAs('images', $image, $filename);
            $image->move(public_path('images'), $filename);
            $article->hinhanh = $filename;
        }
        $article->save();
        return redirect()->route('articles.index')->with('success', 'Article Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if (Storage::disk('public')->exists('images/' . $article->image)) {
            Storage::disk('public')->delete('images/' . $article->image);
        }

        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Article deleted successfully.');
    }

    public function search(Request $request)
        {
            $query = $request->input('query');
            $articles = Article::where('tieude', 'LIKE', "%$query%")
                        ->orWhere('noidung', 'LIKE', "%$query%")
                        ->orWhere('ten_bhat', 'LIKE', "%$query%")
                        ->paginate(10);
            return view('search', ['articles' => $articles]);
        }
    public function softDeleted()
    {
        $articles = Article::onlyTrashed()->get();
        return view('articles_deleted', compact('articles'));
    }
    public function restore($id){
        $article = Article::withTrashed()->findOrFail($id);
        $article->restore();
        return redirect()->route('articles.deleted')->with('success', 'article has been restored.');
    }
    public function forceDelete($id){
        $article = Article::withTrashed()->findOrFail($id);
        $article->forceDelete();
        return redirect()->route('articles.deleted')->with('success', 'User has been permanently deleted.');
    }
}
