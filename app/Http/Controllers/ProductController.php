<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Session;
use File;
use Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $products = Product::all();
        return view('product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $categories = array();

        // foreach (Category::all() as $category) {
        //     $categories[$category->id] = $category->name;
        // }

        return view('product.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20|min:3',
            'photo' => 'required|mimes:jpg,jpeg,png,gif',
            'price' => 'required',
            'description' => 'required|max:1000',
        ]);
        if ($validator->fails()) {
            return redirect('product/create')
                ->withInput()
                ->withErrors($validator);
        }

        $image = $request->file('photo');
        $upload = 'img/products/';
        $filename = time() . $image->getClientOriginalName();
        $path = move_uploaded_file($image->getPathName(), $upload . $filename);

        // Create The Product
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->photo = $filename;
        $product->save();
        Session::flash('product_create', 'New product is created');
        return redirect('product/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit')->with('product', $product);
        // $categories = array();

        // foreach (Category::all() as $category) {
        //     $categories[$category->id] = $category->name;
        // }
        // $posts = Post::findOrFail($id);


        // return view('post.edit')->with('posts', $posts)->with('categories', $categories);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20|min:3',
            'description' => 'required|max:20|min:3',
            'photo' => 'mimes:jpg,jpeg,png,gif',
            'price' => 'required|max:11',
        ]);



        if ($validator->fails()) {
            return redirect('product/' . $id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }

        // Create The Post
        if ($request->file('photo') != "") {
            $image = $request->file('photo');
            $upload = 'img/products/';
            $filename = time() . $image->getClientOriginalName();
            move_uploaded_file($image->getPathName(), $upload . $filename);
        }

        $product = Product::find($id);
        $product->name = $request->Input('name');
        $product->description = $request->Input('description');
        if (isset($filename)) {
            $product->photo = $filename;
        }
        $product->price = $request->Input('price');
        $product->save();

        Session::flash('product_update', 'Product is Updated');

        return redirect('product');
        // $validator = Validator::make($request->all(), [
        //     'category_id' => 'required|integer',
        //     'title' => 'required|max:20|min:3',
        //     'author' => 'required|max:20|min:3',
        //     'image' => 'mimes:jpg,jpeg,png,gif',
        //     'short_desc' => 'required|max:50|min:4',
        //     'description' => 'required|max:1000|min:4',
        //     // 'short_desc' => 'required|max:50|min:10',
        //     // 'description' => 'required|max:1000|min:50',
        // ]);



        // if ($validator->fails()) {
        //     return redirect('post/' . $id . '/edit')
        //         ->withInput()
        //         ->withErrors($validator);
        // }

        // // Create The Post
        // if ($request->file('image') != "") {
        //     $image = $request->file('image');
        //     $upload = 'img/posts/';
        //     $filename = time() . $image->getClientOriginalName();
        //     move_uploaded_file($image->getPathName(), $upload . $filename);
        // }

        // $post = Post::find($id);
        // $post->category_id = $request->category_id;
        // $post->title = $request->Input('title');
        // $post->author = $request->Input('author');
        // if (isset($filename)) {
        //     $post->image = $filename;
        // }
        // $post->short_desc = $request->Input('short_desc');
        // $post->description = $request->Input('description');
        // $post->save();

        // Session::flash('post_update', 'Post is Updated');

        // return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $image_path = 'img/products/' . $product->photo;
        File::delete($image_path);

        $product->delete();

        Session::flash('product_delete', 'Product is Delete');

        return redirect('product');
    }
}
