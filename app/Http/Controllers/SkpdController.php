<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Skpd;

class SkpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Skpd::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'skpd' => ['required'],
        ]);

        $skpd = new Skpd();
        $skpd->skpd = $request->skpd;
        $skpd->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Skpd::findOrFail($id);
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
        $skpd = Skpd::findOrFail($id);

        $request->validate([
            'skpd' => ['required'],
        ]);

        $skpd->skpd = $request->skpd;
        $skpd->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Skpd::findOrFail($id)->delete();
    }
}
