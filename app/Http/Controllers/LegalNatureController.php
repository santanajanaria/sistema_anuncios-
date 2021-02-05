<?php

namespace App\Http\Controllers;

use App\Models\LegalNature;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LegalNatureController extends Controller
{

    private $tN;

    public function __construct()
    {
        $this->tN = new LegalNature();
    }

    public function index()
    {
        //
    }

    public function create()
    {

        $user = Auth::id();
        $result = DB::table('users')->where('id', $user)->first();
        return view('system.legalNature.form', ['user' => $result]);
    }

    public function store(Request $request)
    {
        $perfil = $request->only(['user_id', 'cpf', 'cnpj']);
        $store = $this->tN->cStore($perfil);
        if ($store) {
            $profile = DB::table('profiles')->where('user_id', $request->user_id)->first();
            if (isset($profile)) {
                $categories = DB::table('categories')->get();
                return redirect()->route('adverts.form', ['categories' => $categories, 'profile' => $profile]);
            } else {
                $user = User::find($request->user_id);
                return redirect()->route('perfil.form', $user->id);
            }
        } else {
            DB::rollBack();
            return redirect()->back()->with('error', 'Houve um erro ao tentar cadastrar o anúncio');
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LegaNature  $legaNature
     * @return \Illuminate\Http\Response
     */
    public function show($legaNature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LegaNature  $legaNature
     * @return \Illuminate\Http\Response
     */
    public function edit($legaNature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LegaNature  $legaNature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $legaNature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LegaNature  $legaNature
     * @return \Illuminate\Http\Response
     */
    public function destroy($legaNature)
    {
        //
    }
}
