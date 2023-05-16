<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Order;
use App\Recommend;
use App\WeddingPackage;
use Illuminate\Http\Request;

class WPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recommendList(){
        return view('recommend');
    }


    public function packageList(){
        $weddingPackages=WeddingPackage::latest()->limit(15)->get();
        return view('package-list',compact('weddingPackages'));
    }
    public function packageFilter(Request $request){
//        return $request;
        $start=$request->start;
        $end=$request->end;
        $request->validate([
            "start" => "required",
            "end" => "required",
        ]);
        $packages=WeddingPackage::get();
//        return $packages;
        $weddingPackages = $packages->whereBetween('price', [$start, $end])->all();
//        return $weddingPackages;
        return view('package-list',compact('weddingPackages'));
    }


    public function blogList(){
        $categories=Category::latest()->get();
        $blogs=Blog::latest()->get();
        return view('show-blog',compact('categories'),compact('blogs'));
    }
    public function blogListFilter($id){
        $categories=Category::latest()->get();
        $blogs=Blog::where('category_id',$id)->get();
        return view('show-blog',compact('blogs'),compact('categories'));
    }
    public function singleBlogList($id){
        $categories=Category::latest()->get();
        $blogs=Blog::where('id',$id)->get();
        return view('show-blog',compact('blogs'),compact('categories'));
    }

    public function orderPackage($id){
        $package=\App\WeddingPackage::where('id',$id)->get();
        foreach ($package as $p){
            $name=$p->title;
        }
        return view('order',compact('id'),compact('name'));
    }

    public function storeOrder(Request $request)
    {
//        return $request;
        $request->validate([
            "wedding_package_id"=> "required|numeric",
            "name"=> "required",
            "phone"=> "required",
            "email"=> "required",
            "date"=> "required|date",
            "start"=> "required",
            "end"=> "required",
            "address"=> "required"
        ]);
        $order=new Order();
        $order->wedding_package_id=$request->wedding_package_id;
        $order->name=$request->name;
        $order->phone=$request->phone;
        $order->email=$request->email;
        $order->date=$request->date;
        $order->start=$request->start;
        $order->end=$request->end;
        $order->address=$request->address;
        $order->save();
        return redirect('/package-list');
    }

    public function storeRecommend(Request $request)
    {
        $request->validate([
            "name" => "required",
            "wedding_package_id"=>"required|numeric",
            "stars"=>"required|numeric",
            "text"=>"required",
        ]);
        $recommend=new Recommend();
        $recommend->name=$request->name;
        $recommend->rating=$request->stars;
        $recommend->wedding_package_id=$request->wedding_package_id;
        $recommend->text=$request->text;
        $recommend->save();

        return redirect()->route('package.packageList');
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
}
