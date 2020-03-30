<?php

namespace App\Http\Controllers;

use App\RaffleSetting;
use Illuminate\Http\Request;

class RaffleSettingsController extends Controller
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
        $raffleSetting = RaffleSetting::updateOrCreate([
            'prize_id' => $request->prize_id],
            [
                'roulette_one' => $request->roulette_one,
                'roulette_two' => $request->roulette_two,
                'roulette_three' => $request->roulette_three,
                'roulette_four' => $request->roulette_four,
                'prize_id' => $request->prize_id,
            ]
        );

        return response()->json($raffleSetting, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RaffleSetting  $raffleSetting
     * @return \Illuminate\Http\Response
     */
    public function show(RaffleSetting $raffleSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RaffleSetting  $raffleSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(RaffleSetting $raffleSetting)
    {
        //
    }

    public function getByPrizeId($prizeId)
    {
        $raffleSetting = RaffleSetting::where('prize_id','=', $prizeId)->first();
        return response()->json($raffleSetting, 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RaffleSetting  $raffleSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RaffleSetting $raffleSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RaffleSetting  $raffleSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(RaffleSetting $raffleSetting)
    {
        //
    }
}
