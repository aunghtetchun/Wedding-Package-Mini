<?php

namespace App\Http\Controllers;

use App\PackageDetail;
use Illuminate\Http\Request;

class PackageDetailController extends Controller
{
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
//        return $request;
        $request->validate([
            "title" => "required",
            "cost"=>"required",
            "wedding_package_id"=>"required",
        ]);
        $detial=new PackageDetail();
        $detial->title=$request->title;
        $detial->cost=$request->cost;
        $detial->wedding_package_id=$request->wedding_package_id;
        $detial->save();

        return redirect()->back()->with("toast","Cost Add Successful");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PackageDetail  $packageDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PackageDetail $packageDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PackageDetail  $packageDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageDetail $packageDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PackageDetail  $packageDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackageDetail $packageDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PackageDetail  $packageDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageDetail $packageDetail)
    {
        //
    }
}
