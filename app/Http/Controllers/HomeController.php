<?php

namespace App\Http\Controllers;

use App\Models\Adverts;
use App\Models\Category;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $obj;
    private $pro;
    private $adv;
    private $cat;

    public function __construct()
    {
        $this->adv = new Adverts();
        $this->cat = new Category();
        $this->pro = new Profile();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $result = DB::table('users')->get();
        $adverts = $this->adv->paginate(30);
        return view('home', ['users' => $result, 'adverts' => $adverts]);
    }
    public function perfil()
    {
        $user = Auth::id();
        $result = DB::table('users')->where('id', '=', $user)->first();
        if ($result) {
            $type = DB::table('profiles')->where('user_id', $result->id)->get()->first();
            return view('system.perfil.index', ['users' => $result, 'perfil' => $type]);
        }
    }

    public function create()
    {
        $user = Auth::id();
        // $result = DB::table('users')->where('id', '=', $user)->first();
        $tP = DB::table('legal_natures')->where('user_id', $user)->first();
        if (isset($tP)) {
            return view('system.perfil.form', ['users' => $user, 'tP_id' => $tP->id]);
        } else {
            return redirect()->route('legalNatures.form', ['user_id' => $user]);
        }
    }

    public function store(Request $request, $user_id)
    {
        $result = DB::table('users')->where('id', '=', $user_id)->first();
        if (isset($result)) {
            $perfil = $request->only(['user_id', 'tP_id', 'contact', 'cep', 'city', 'address', 'street', 'number']);
            $store = $this->pro->cStore($perfil);
            if ($store) {
                DB::commit();
                return redirect()->route('adverts.form')->with('error', 'item adcionado com successo');
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
            return view('system.perfil.index', ['result' => $result, 'user' => $user, 'category' => $category]);
        }
    }

    public function edit($id)
    {
        $type = DB::table('Profiles')->where('user_id', $id)->first();
        $user = DB::table('users')->find($id);
        return view('system.perfil.form', ['user' => $user, 'profile' => $type]);
    }

    public function update(Request $request)
    {
        $user = DB::table('users')->where('id', $request->user_id)->first();
        $result = $request->only(['user_id', 'tP_id', 'contact', 'cep', 'city', 'address', 'street', 'number']);
        $result = $this->pro->cUpdate($result);
        if ($result) {
            return redirect()->route('perfil.index');
        } else {
            return redirect()->route('perfil.index');
        }
    }

    public function destroy()
    {
        //
    }
    public function remove()
    {
        //
    }
}
