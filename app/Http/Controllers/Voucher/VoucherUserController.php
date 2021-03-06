<?php

namespace App\Http\Controllers\Voucher;

use App\Voucher;
use App\VoucherUser;
use App\Mail\VoucherUserEmail;

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
            if (Auth::user()->getId() == null) {
                return redirect()->route('login');
            } else {
                $id_user = Auth::user()->getId();
                //echo $id_user;
                $keys = VoucherUser::where('user_id', '=', $id_user)->orderBy('created_at', 'DESC')->get();
                //dd($keys);
                //echo $keys;
            }
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
    public function store_voucher_keys(Request $request, $id)
    {
        if (Auth::check()) {
            $user_id = Auth::user()->getId();
            $voucher_id = Voucher::findOrFail($id);

            $keys_random_php = substr(md5(uniqid(mt_rand(1,6))), 0, 10);
            $keys = VoucherUser::where('chave', '=', $keys_random_php)->count();

            if ($keys > 0) {
                $keys_create = substr(md5(uniqid(mt_rand(1,6))), 0, 10);
            } else {
                $keys_create = $keys_random_php;
            }
            
            $create_voucher_keys = new VoucherUser();
            $create_voucher_keys->chave = $keys_create;
            $create_voucher_keys->user_id = $user_id;
            $create_voucher_keys->voucher_id = $voucher_id->id;
            $create_voucher_keys->status = 1;
            $create_voucher_keys->save();

            if (!$create_voucher_keys->save()) {
                return redirect()->route('voucher_list_keys_create')->with('danger','Ocorreu um erro ao gerar cupom, desculpe!');
            } else {
                #Aqui enviar email apos salvar objeto, logo apos redirecionar com a mensagem de sucesso;
                $voucher_user_key_create = $keys_create;
                $voucher_user_create = Auth::user()->getName();

                \Mail::to($request->user())->send(new VoucherUserEmail($voucher_user_key_create, $voucher_user_create) );

                #Mail::send('emails.offerte_reactie', ['offerte' => $offerte, 'user' => $user, 'message_text' => $message_text], function ($message) use ($user,$offerte)

                $request->session()->flash('success', 'Cupom criado e enviado por email com sucesso!');
                return redirect()->route('voucher_list_keys_create');
            }

            #echo $create_voucher_keys;
            #dd($create_voucher_keys);

            #return redirect()->route('voucher_list_keys_create')->with('success','Cupom criado com sucesso!');
        } else {
            return redirect()->route('login')->with('warning', 'Efetue o Login ou <a href="registrar/">Registre-se</a> para gerar Cupons!');
        }

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
