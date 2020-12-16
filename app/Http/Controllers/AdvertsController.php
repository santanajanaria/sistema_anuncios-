<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvertsRequest;
use App\Models\Adverts;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdvertsController extends Controller
{
    private $cat;
    private $obj;

    public function __construct()
    {
        $this->cat = new Category();
        $this->obj = new Adverts();
    }

    public function index()
    {
        $user = Auth::id();
        $result = DB::table('users')->where('id', '=', $user)->first();
        if ($result) {
            $adverts = $this->obj->where('profile_id', '=', $user)->paginate(10);
            return view('system.adverts.index', ['result' => $adverts]);
        }
    }

    public function create()
    {
        $user = Auth::id();
        $profile = DB::table('profiles')->where('user_id', $user)->first();
        if (isset($profile)) {
            $categories = $this->cat->get();
            return view('system.adverts.form', ['user_id' => $user, 'categories' => $categories, 'profile' => $profile]);
        } else {
            return redirect()->route('perfil.form', $user);
        }
    }

    public function store(AdvertsRequest $request)
    {
        $save = new Adverts();
        $save->profile_id = $request->profile_id;
        $save->category_id = $request->category_id;
        $save->description = $request->description;
        $save->tP_id = $request->tP_id;
        if ($request->hasFile('photo')) {
            $path = $request->photo->store('photo');
            $save->photo = $path;
            $destinationPath = public_path('/imagens');
            $request->photo->move($destinationPath, $path);
        }
        $result = $save->save();
        if ($result) {
            DB::commit();
            return redirect()->route('adverts.index')->with('error', 'item adcionado com successo');
        } else {
            DB::rollBack();
            return redirect()->back()->with('error', 'Houve um erro ao tentar cadastrar o anúncio');
        }
    }

    public function show($id)
    {
        $result = $this->obj->find($id);
        if ($result) {
            $id = Auth::id();
            $user = DB::table('users')->where('id', '=', $id)->first();
            return view('system.adverts.show', ['result' => $result, 'user' => $user]);
        }
    }

    public function edit($id)
    {
        $result = $this->obj->find($id);
        if ($result) {
            $categories = $this->cat->get();
            return view('system.adverts.form', ['result' => $result, 'categories' => $categories]);
        }
    }

    public function update(Request $request, AdvertsRequest $adverts)
    {
        $result = $this->obj->find($request->id);
        $result->profile_id = $request->profile_id;
        $result->category_id = $request->category_id;
        $result->description = $request->description;
        $result->tP_id = $request->tP_id;
        if ($request->hasFile('photo')) {
            $path = $request->photo->store('photo');
            $result->photo = $path;
            $destinationPath = public_path('/imagens');
            $request->photo->move($destinationPath, $path);
        }
        $update = $result->update();
        if ($result) {
            DB::commit();
            return redirect()->route('adverts.index')->with('error', 'item editado com successo');
        } else {
            DB::rollBack();
            return redirect()->back()->with('error', 'Houve um erro ao tentar editar o anúncio');
        }
    }

    public function destroy($id)
    {
        dd('dddestroy');
    }
    public function remove($id)
    {
        $advert = $this->obj->find($id);
        if ($advert) {
            $result = $advert->delete();
            if ($result) {
                return redirect()->route('adverts.index');
            } else {
                return redirect()->back();
            }
        }
    }

    public function removed()
    {
        $removed = $this->obj->withTrashed()->where('deleted_at', '!=', null)->get();
        if ($removed) {
            return view('system.adverts.removed', ['removed' => $removed]);
        } else {
            return redirect()->back()->with('error', 'erro ao carregar arquivos');
        }
    }

    public function restore($id)
    {
        $result = $this->obj->withTrashed()->where('id', $id)->first();
        if ($result) {
            $res = $result->restore();
            if ($res) {
                return redirect()->route('adverts.show', $id)->with('success', 'arquivo restaurado com sucesso');
            }
        }
    }
}
