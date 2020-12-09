<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvertsRequest;
use App\Models\Adverts;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdvertsController extends Controller
{

    private $obj;

    public function __construct()
    {
        $this->obj = new Adverts();
    }

    public function index()
    {
        $result = $this->obj->paginate(10);
        return view('system.adverts.index', ['result' => $result]);
    }

    public function create()
    {
        $user = Auth::id();
        $categories = DB::table('category')->get();
        return view('system.adverts.form', ['user_id' => $user, 'categories' => $categories]);
    }

    public function store(AdvertsRequest $request)
    {
        $save = new Adverts();
        $save->user_id = $request->user_id;
        $save->category_id = $request->category_id;
        $save->description = $request->description;
        $save->phone = $request->phone;
        $save->email = $request->email;
        $save->user_id = $request->user_id;
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
            $user = DB::table('users')->where('id', '=', $result->user_id)->first();
            $category = DB::table('category')->where('id', '=', $result->category_id)->first();
            return view('system.adverts.show', ['result' => $result, 'user' => $user, 'category' => $category]);
        }
    }

    public function edit(AdvertsRequest $adverts)
    {
        //
    }

    public function update(Request $request, AdvertsRequest $adverts)
    {
        //
    }

    public function destroy(AdvertsRequest $adverts)
    {
        //
    }
    public function remove(AdvertsRequest $adverts)
    {
        //
    }
}
