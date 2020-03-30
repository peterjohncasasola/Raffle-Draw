<?php

namespace App\Http\Controllers;

use Validator;
use App\Member;
use App\Winner;
use App\RafflePromo;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class MembersController extends Controller
{
    public function index()
    {
        $members = DB::select('select memberId,client_code,client_name,membership_date,
                            province,contact_no,address,is_registered from members order by updated_at desc');

        if (request()->ajax()) {
            return Datatables::of($members)
                    ->addColumn('action', function($row){
                        $btn = '';
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-toggle="modal" data-target="#editModal"  data-id="'.$row->memberId.'" data-original-title="Edit" class="edit btn btn-primary btn-md editMember">Edit</a>';

                        // $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->memberId.'" data-original-title="Delete" class="btn btn-danger btn-md deleteMember">Delete</a>';
                        // if (Auth::user()->is_admin)
                        if ($row->is_registered == 0) {
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->memberId.'"  data-original-title="Register" class="btn btn-warning btn-md registerMember">Register</a>';
                        } else {
                            $btn = $btn.' <button href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->memberId.'"  data-original-title="Register" disabled="true" class="btn btn-success btn-md unregisterMember">Registered</button>';

                        }

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }

        return view('registration');
    }

    public function getMembers() {
        return Member::latest()->get();
    }

    public function show($id)
    {
        $member = Member::find($id);
        return response()->json($member, 200);

    }



    public function notWinners()
    {
        $registered_members = Member::where([
            ['is_registered','=', '1'],
            ['is_winner','=', '0'],
        ])->get();
        return response()->json($registered_members, 200);

    }
    public function registered()
    {
        $registered_members = Member::where('is_registered','=',1)->latest('updated_at')->get();

        if (request()->ajax()) {
            return Datatables::of($registered_members)
                    ->addColumn('action', function($row){
                        $btn = '';
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-toggle="modal" data-target="#editModal"  data-id="'.$row->memberId.'" data-original-title="Edit" class="edit btn btn-primary btn-md editMember">Edit</a>';

                        // $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->memberId.'" data-original-title="Delete" class="btn btn-danger btn-md deleteMember">Delete</a>';
                        // if (Auth::user()->is_admin)
                        if ($row->is_registered == 0) {
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->memberId.'"  data-original-title="Register" class="btn btn-warning btn-md registerMember">Register</a>';
                        } else {
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->memberId.'"  data-original-title="Register"   disabled="" class="btn btn-success btn-md unregisterMember">Registered</a>';

                        }

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }

        return view('participant');


    }

    public function winners()
    {

        $winners = Winner::latest('updated_at')->get();

        if (request()->ajax()) {
            return Datatables::of($winners)
                    // ->addColumn('action', function($row){
                    //     $btn = '';
                    //     $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-toggle="modal" data-target="#editModal"  data-id="'.$row->memberId.'" data-original-title="Edit" class="edit btn btn-primary btn-md editMember">Edit</a>';

                    //     // $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->memberId.'" data-original-title="Delete" class="btn btn-danger btn-md deleteMember">Delete</a>';
                    //     // if (Auth::user()->is_admin)
                    //     if ($row->is_registered == 0) {
                    //         $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->memberId.'"  data-original-title="Register" class="btn btn-warning btn-md registerMember">Register</a>';
                    //     } else {
                    //         $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->memberId.'"  data-original-title="Register"   disabled="" class="btn btn-success btn-md unregisterMember">Registered</a>';

                    //     }

                    //         return $btn;
                    // })
                    // ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }

        return view('winner');


    }

    public function store(Request $request)
    {

        $member = Member::updateOrCreate([
            'memberId' => $request->memberId,],
            [
                'client_code' => $request->client_code,
                'client_name' => $request->client_name,
                'province' => $request->province,
                'contact_no' => $request->contact_no,
                'address' => $request->address,
            ]
        );

        return response()->json($member, 201);

        // return response()->json(['error'=>$validator->errors()->all()]);

    }

    public function register($id)
    {
        $member = Member::find($id);

        $member->is_registered = 1;
        $member->update();

        return response()->json($member, 201);
    }

    public function tagAsWinner($id)
    {
        $member = Member::find($id);
        $rafflePromo = RafflePromo::where('is_active','=',1)->firstOrFail();

        $member->is_winner = 1;
        $member->update();

        $winner = new Winner();

        $winner->memberId = $member->memberId;
        $winner->province = $member->province;
        $winner->member_name = $member->client_name;
        $winner->prize = $rafflePromo->prize;
        $winner->prize_id = $rafflePromo->id;

        $winner->save();


        $updatedPrize = RafflePromo::find($rafflePromo->id);
        $updatedPrize->claimed_count = $updatedPrize->claimed_count + 1;

        $updatedPrize->save();


        return response()->json($member, 201);
    }

    public function unregister($id)
    {
        $member = Member::find($id);

        $member->is_registered = 0;
        $member->update();

        return response()->json($member, 201);
    }


    public function update(Request $request, Member $member)
    {
        $member->update($request->all());

        return response()->json($member, 200);
    }

    public function delete($id)
    {
        Member::find($id)->delete();
        return response()->json(null, 204);
    }
}
