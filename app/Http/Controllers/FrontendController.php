<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('frontend.index')->with('products', $products);
        // $products = Product::all();
        // return view('frontend.index')->with('posts', $products);
        // return view("frontend.index");
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        return view('frontend.show')->with('post', Post::find($id))->with('categories', $categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getByCategory($id = 1)
    {
        $categories = Category::all();
        if (isset($id)) {
            $post = DB::table('posts')->where('category_id', $id)->paginate(3);
        } else {
            $post = Post::orderBy('created_at', 'DESC')->paginate(3);
        }
        return view('frontend.category')->with('posts', $post)->with('categories', $categories);
    }

    public function getBySearch(Request $request)
    {

        $keyword = $request->input('keyword');
        $categories = Category::all();
        if ($keyword != "") {
            return view('frontend.search')
                ->with('posts', Post::where('title', 'LIKE', '%' . $keyword . '%')->paginate(3))
                ->with('keyword', $keyword)
                ->with('categories', $categories);
        } else {
            return redirect('/');
        }
    }
}
