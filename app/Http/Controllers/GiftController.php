<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiftController extends Controller
{
    public function allGifts() {
        $gifts = Gift::join('users', 'gifts.user_id', '=', 'users.id')
            ->select('gifts.id', 'gifts.name', 'gifts.expected_value', 'gifts.spent_value', 'users.name as user_name')
            ->get();

        // dd( $gifts);
        return view('gifts.allgifts', compact('gifts'));
    }

    public function addGifts() {
        // lista de users p/o select do formulário
        $users = User::select('id', 'name')->get();
        //dd($users);

        return view('gifts.addgift', compact('users'));
    }

    public function storeGifts(Request $request) {
        //validar os dados no servidor
        $request->validate([
            'name'           => 'required|string|max:50',
            'expected_value' => 'required|numeric|min:0',
            'user_id'        => 'required|exists:users,id',
            'spent_value'    => 'nullable|numeric|min:0',
        ]);

        // depois de validados, inserir na bd
        Gift::insert([
            'name'           => $request->name,
            'expected_value' => $request->expected_value,
            'spent_value'    => $request->spent_value,
            'user_id'        => $request->user_id,
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        return redirect()->route('gifts.all')->with('message', 'Prenda adicionada com sucesso!');
    }

    public function editGifts(int $id) {
        // Na tabela Gift, procura 1registo cujo campo id seja = ao valor de $id.
        $gift = Gift::where('id', $id)->first();
        $users = User::select('id', 'name')->get();

        return view('gifts.editgift', compact('gift', 'users'));
    }

    //Request $request: recebe os dados enviados pelo formulário.
    public function updateGifts(Request $request) {
        $request->validate([
            'name'           => 'required|string|max:50',
            'expected_value' => 'required|numeric|min:0',
            'user_id'        => 'required|exists:users,id',
            'spent_value'    => 'nullable|numeric|min:0',
        ]);

        Gift::where('id', $request->id)->update([
            'name'           => $request->name,
            'expected_value' => $request->expected_value,
            'spent_value'    => $request->spent_value,
            'user_id'        => $request->user_id,
            'updated_at'     => now(),
        ]);

        return redirect()->route('gifts.all')->with('message', 'Prenda atualizada com sucesso!');
    }

    public function deleteGifts($id) {
        Gift::where('id', $id)->delete();

        return back();
    }
}
