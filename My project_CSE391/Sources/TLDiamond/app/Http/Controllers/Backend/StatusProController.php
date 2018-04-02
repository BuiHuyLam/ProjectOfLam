<?php

namespace App\Http\Controllers\Backend;

use App\Models\statuspro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusProController extends Controller
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
       $this->validate($request,[])
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\statuspro  $statuspro
     * @return \Illuminate\Http\Response
     */
    public function show(statuspro $statuspro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\statuspro  $statuspro
     * @return \Illuminate\Http\Response
     */
    public function edit(statuspro $statuspro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\statuspro  $statuspro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, statuspro $statuspro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\statuspro  $statuspro
     * @return \Illuminate\Http\Response
     */
    public function destroy(statuspro $statuspro)
    {
        //
    }
}
