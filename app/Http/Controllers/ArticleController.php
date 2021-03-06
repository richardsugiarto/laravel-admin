<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Validator;
use Auth;

class ArticleController extends Controller
{
    //
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
    	$validator = Validator::make($request->all(), [
        'title' => 'required',
        'content' => 'required',
        ]);
        if($validator->fails())
        {
            return redirect('/post_article')->withErrors($validator);
        }
        else
        {
            $article = new Article;
            $article->title = $request->title;
            $article->content = $request->content;
            $article->id_users = $request->id_users;
            $article->save();
         
            return redirect('/post_article')->with('success','You have post an Article.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showall()
    {
        //
        //if(Auth::user())
		//{
	    	$articles = Article::orderBy('created_at', 'asc')->get();
 
		    return view('all_article', [
		        'articles' => $articles
		    ]);
		/*}
		else
		{
			return redirect('/');
		}*/

        
    }

    public function showmyarticle()
    {
        //
        if(Auth::user())
		{
	    	$my_article = Article::where('id_users','=',Auth::user()->id)->orderBy('created_at', 'asc')->get();
 
		    return view('my_article', [
		        'my_articles' => $my_article
		    ]);
		}
		else
		{
			return redirect('/');
		}

        
    }
    public function update_form($id)
    {
        //
        if(Auth::user())
		{
			$my_article = Article::find($id);
		    return view('update_article',[
		    	'my_articles'=>$my_article
		    ]);
		}
		else
		{
			return redirect('/');
		}

        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update_action(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
        'title' => 'required',
        'content' => 'required',
        ]);
        if($validator->fails())
        {
            return redirect('/update_article/'.$request->id)->withErrors($validator);
        }
        else
        {
        	Article::where('id','=',$request->id)->update([
        		'title'=>$request->title,
        		'content'=>$request->content
        	]);
	        return redirect('/my_article')->with('update','Update success');
	    }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Auth::user())
		{
			echo $id;
 			Article::findOrFail($id)->delete();
		    return redirect('/my_article')->with('delete','Delete success');
		}
		else
		{
			return redirect('/');
		}
    }
}
