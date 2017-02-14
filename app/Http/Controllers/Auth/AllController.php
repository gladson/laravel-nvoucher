<?php

namespace App\Http\Controllers\Auth;

use DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_auth()
    {
        $user_all = User::all();
        return view('auth.list_all', compact('user_all'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function user_update_status(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user->status == 0) {
            DB::table('users')
            ->where('id', $id)
            ->update([
                'status' => '1'
            ]);
        } else {
            DB::table('users')
            ->where('id', $id)
            ->update([
                'status' => '0'
            ]);
        }

        #return back()->with('success','Status atualizado com sucesso!');
        return redirect()->route('user_list')->with('success','Status do usuário atualizado com sucesso!');
    }
}
