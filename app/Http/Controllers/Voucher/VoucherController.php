<?php

namespace App\Http\Controllers\Voucher;

use DB;
use App\Voucher;
use App\VoucherUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index()
    {
        if (Auth::check() && Auth::user()->IsAdmin()) {
            $vouchers = Voucher::all();
        } else {
            $id_user = Auth::user()->getId();
            //echo $id_user;
            //$vouchers = DB::table('voucher')->where('user_id', '=', $id_user)->get();
            $vouchers = Voucher::where('user_id', '=', $id_user)->get();
            //dd($vouchers);
            //echo $vouchers;
        }
        return view('voucher.list_all', compact('vouchers'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list_keys()
    {
        if (Auth::check() && Auth::user()->IsAdmin()) {
            $keys = VoucherUser::all();
        } else {
            $id_user = Auth::user()->getId();
            //echo $id_user;
            $keys = VoucherUser::where('user_id', '=', $id_user)->get();
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
    public function create_voucher()
    {
        return view('voucher.list_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_voucher(Request $request)
    {
        $this->validate($request, [
            'desconto_valor' => 'required|max:255',
            'desconto_tipo' => 'nullable',
            'desconto_descricao' => 'required',
            'user_id' => 'required',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date'
        ]);

        dd($request);

        $create_voucher = new Voucher;
        $create_voucher->desconto_valor = $request->desconto_valor;
        $create_voucher->desconto_tipo = $request->desconto_tipo;
        $create_voucher->desconto_descricao = $request->desconto_descricao;
        $create_voucher->user_id = $request->user_id;
        $create_voucher->data_inicio = $request->data_inicio;
        $create_voucher->data_fim = $request->data_fim;
        $create_voucher->save();

        return view('voucher.list_add');
        #return redirect()->route('voucher_list_add_post')->with('success','Voucher criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Voucher $voucher)
    {
        return view('voucher.list_edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voucher $voucher)
    {
        //
    }
}
