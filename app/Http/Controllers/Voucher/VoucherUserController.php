<?php

namespace App\Http\Controllers\Voucher;

use App\Voucher;
use App\VoucherUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class VoucherUserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_voucher_keys()
    {
        if (Auth::check() && Auth::user()->IsAdmin()) {
            $keys = VoucherUser::orderBy('created_at', 'DESC')->get();
        } else {
            $id_user = Auth::user()->getId();
            //echo $id_user;
            $keys = VoucherUser::where('user_id', '=', $id_user)->orderBy('created_at', 'DESC')->get();
            //dd($keys);
            //echo $keys;
        }
        return view('voucher.list_keys', compact('keys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_create_voucher_keys()
    {

        $keys = Voucher::orderBy('created_at', 'DESC')->get();

        return view('voucher.list_keys_all', compact('keys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_voucher_keys(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VoucherUser  $voucherUser
     * @return \Illuminate\Http\Response
     */
    public function show(VoucherUser $voucherUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VoucherUser  $voucherUser
     * @return \Illuminate\Http\Response
     */
    public function edit(VoucherUser $voucherUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VoucherUser  $voucherUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoucherUser $voucherUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VoucherUser  $voucherUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoucherUser $voucherUser)
    {
        //
    }
}
