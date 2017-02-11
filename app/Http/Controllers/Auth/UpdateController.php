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
    #protected function validator(array $data)
    #{
    #    return Validator::make($data, [
    #        'name' => 'required|max:255',
    #        'email' => 'required|email|max:255',
    #    ]);
    #}

    public function update(Request $request, $id)

    {
        // get the user
        //User::findOrFail($id)->update($request->all());

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed'
		]);
        $user = User::findOrFail($id);
        $input = $request->input();

        if ($input['password'] != "") {

           $input['password'] = bcrypt($input['password']);
        }
        $user->fill($input)->save();

        #return back()->with('success','Usuário atualizado com sucesso!');
        return redirect()->route('user_edit', ['id' => $id])->with('success','Usuário atualizado com sucesso!');
    }

}
