<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = DB::select('select id,username,name,created_at,is_admin,is_activated from users');

        if (request()->ajax()) {
            return Datatables::of($users)
                    ->addColumn('action', function($row){
                        $btn = '';
                        // $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-toggle="modal" data-target="#editModal"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-md editUser">Edit</a>';

                        if ($row->is_admin == 0) {
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-md deleteUser">Delete</a>';
                            if ($row->is_activated == 0) {

                                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'"  data-original-title="Register" class="btn btn-warning btn-md activate">Activate</a>';
                            } else {
                                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'"  data-original-title="Register"  class="btn btn-success btn-md deactivate">Deactivate</a>';
                            }
                        }

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }

        return view('users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $user = User::find($id)->delete();

        return response()->json($user);
    }

    public function activate($id)
    {
        $user = User::find($id);
        $user->is_activated = 1;
        $user->update();

        return response()->json($user);
    }


    public function deactivate($id)
    {
        $user = User::find($id);
        $user->is_activated = 0;
        $user->update();

        return response()->json($user);
    }
}
