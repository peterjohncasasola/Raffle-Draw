<?php

namespace App\Http\Controllers;

use App\RafflePromo;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
class RafflePromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rafflePromo = DB::select('select id,prize,description, winners_count,claimed_count,(winners_count - claimed_count) as remaining,is_active from raffle_promos');

        if (request()->ajax()) {
            return Datatables::of($rafflePromo)
                    ->addColumn('action', function($row){
                        $btn = '';
                        // $btn = '<a href="javascript:void(0)" data-toggle="tooltip"   data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-md edit">Edit</a>';
                        if ($row->is_active === 0) {
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'"  data-original-title="Delete" class="btn btn-primary btn-md set">Set As Prize</a>';
                        } else {
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'"  disabled data-original-title="Delete" class="btn btn-warning btn-md set">Current Prize</a>';
                        }
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-success btn-md raffle-settings">Settings</a>';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }

        return view('rafflepromo');
    }

    public function rafflePrizeList(Request $request)
    {
        $rafflePromo = DB::select('select id,prize,description, winners_count,claimed_count,(winners_count - claimed_count) as remaining from raffle_promos');

        if (request()->ajax()) {
            return Datatables::of($rafflePromo)
                    ->addColumn('action', function($row){

                        $btn = '<a href="/raffle-draw/'.$row->id.'" data-toggle="tooltip"   data-id="'.$row->id.'" data-original-title="Select" class="edit btn btn-primary btn-md select-prize">Select</a>';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }

        return view('selectprize');
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


    public function setAsActive($id)
    {
        DB::update('update raffle_promos set is_active = 0');

        $rafflePromo = RafflePromo::find($id);

        $rafflePromo->is_active = 1;
        $rafflePromo->update();
        return response()->json($rafflePromo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RafflePromo  $rafflePromo
     * @return \Illuminate\Http\Response
     */
    public function currentPrize()
    {

        // $rafflePromo =  DB::select('select * from raffle_promos where is_active = ?', [1]);
        $rafflePromo = RafflePromo::where('is_active','=',1)->firstOrFail();
        // dd($rafflePromo);
        return response()->json($rafflePromo);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RafflePromo  $rafflePromo
     * @return \Illuminate\Http\Response
     */
    public function edit(RafflePromo $rafflePromo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RafflePromo  $rafflePromo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RafflePromo $rafflePromo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RafflePromo  $rafflePromo
     * @return \Illuminate\Http\Response
     */
    public function destroy(RafflePromo $rafflePromo)
    {
        //
    }
}
