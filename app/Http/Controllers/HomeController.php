<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Physical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $obj;
    private $com;
    private $phy;

    public function __construct()
    {
        $this->phy = new Physical();
        $this->com = new Company();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::id();
        $result = DB::table('users')->where('id', '=', $user)->first();
        if ($result) {
            $adverts = DB::table('adverts')->paginate(30);
            if ($result->type == 'n') {
                $type = DB::table('physicals')
                    ->where('user_id', '=', $result->id)
                    ->first();
                $category = DB::table('categories')->get();
                return view('home', ['users' => $result, 'adverts' => $adverts, 'perfil' => $type, 'categories' => $category]);
            } else {
                $type = DB::table('companies')
                    ->where('user_id', '=', $result->id)
                    ->first();
                return view('home', ['users' => $result, 'adverts' => $adverts, 'perfil' => $type]);
            }
        }
    }
    public function perfil()
    {
        $user = Auth::id();
        $result = DB::table('users')->where('id', '=', $user)->first();
        return view('system.perfil.index', ['user' => $user, 'type' => $result->type]);
    }

    public function create()
    {
        $user = Auth::id();
        $result = DB::table('users')->where('id', '=', $user)->first();
        return view('system.perfil.form', ['user_id' => $user, 'type' => $result->type]);
    }

    public function store(Request $request, $user_id)
    {
        $result = DB::table('users')->where('id', '=', $user_id)->first();
        if ($result->type == 'n') {
            $perfil = $request->only(['name', 'contact', 'cep', 'city', 'address', 'street', 'number', 'user_id']);
            $store = $this->phy->cStore($perfil);
            if ($store) {
                DB::commit();
                return redirect()->route('adverts.index')->with('error', 'item adcionado com successo');
            } else {
                DB::rollBack();
                return redirect()->back()->with('error', 'Houve um erro ao tentar cadastrar o anúncio');
            }
        } else {
            $perfil = $request->only(['name', 'contact', 'cep', 'city', 'address', 'street', 'number', 'cnpj', 'user_id']);
            $store = $this->com->cStore($perfil);
            if ($store) {
                DB::commit();
                return redirect()->route('adverts.index')->with('error', 'item adcionado com successo');
            } else {
                DB::rollBack();
                return redirect()->back()->with('error', 'Houve um erro ao tentar cadastrar o anúncio');
            }
        }
    }

    public function show($id)
    {
        $result = $this->obj->find($id);
        if ($result) {
            $user = DB::table('users')->where('id', '=', $result->user_id)->first();
            $category = DB::table('categories')->where('id', '=', $result->category_id)->first();
            return view('system.adverts.show', ['result' => $result, 'user' => $user, 'category' => $category]);
        }
    }

    public function edit(Request $adverts)
    {
        //
    }

    public function update(Request $request, Request $adverts)
    {
        //
    }

    public function destroy(Request $adverts)
    {
        //
    }
    public function remove(Request $adverts)
    {
        //
    }
}
