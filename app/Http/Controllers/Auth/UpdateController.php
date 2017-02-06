<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Support\Facades\Validator;

class UpdateController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);
    }

    public function update(Request $request, $id)

    {
        // get the user
        User::findOrFail($id)->update($request->all());

        // show the edit form and pass the user
        return back()->with('success','Usuário atualizado com sucesso!');

    }

}
