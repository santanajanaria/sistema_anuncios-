<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdvertsRequest;
use App\Models\Adverts;
use App\Models\Category;
use App\Models\Images;
use App\Models\LegalNature;
use App\Models\Profile;
use App\Models\User;
use App\Models\Views;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdvertsController extends Controller
{
    private $cat;
    private $obj;
    private $use;
    private $vie;
    private $pro;

    public function __construct()
    {
        $this->pro = new Profile();
        $this->cat = new Category();
        $this->obj = new Adverts();
        $this->use = new User();
        $this->vie = new Views();
    }

    public function index()
    {
        $user = Auth::id();
        $profile = $this->pro->where('user_id', '=', $user)->first();
        if ($profile) {
            $adverts = $this->obj->where('profile_id', '=', $profile->id)->paginate(10);
            return view('system.adverts.index', ['result' => $adverts]);
        } else {
            return view('system.adverts.index');
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
            $view = Views::where('advert_id', $id)->get();
            $legalNature = LegalNature::where('user_id', $result->Profile->user_id)->get()->first();
            $photo = Images::where('advert_id', $id)->withTrashed()->get();
            return view('system.adverts.show', ['result' => $result, 'legalNature' => $legalNature, 'view' => $view, 'photo' => $photo]);
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

    public function advertView($request)
    {
        $advert = $this->obj->find($request);
        $user = Auth::id();
        if ($user != $advert->Profile->user_id) {
            $view = $this->vie->where('advert_id', $advert->id)->first();
            if (isset($view->advert_id) == $request) {
                $view->look = $view->look + 1;
            } else {
                $view = new Views();
                $view->advert_id = $request;
                $view->look = 1;
            }
            $save = $view->save();
            if ($save) {
                return view('show', ['result' => $advert]);
            }
        } else {
            return redirect()->route('adverts.show', $request);
        }
    }
    public function search(Request $label)
    {
        $search = $this->obj->where('description', 'like', "%$label->searchAdvert%")->paginate();
        $views  = $this->vie->all();
        $category = $this->cat->all();
        return view('home', ['adverts' => $search, 'views' => $views, 'category' => $category]);
    }
    public function searchC(Request $label)
    {
        $search = $this->obj->where('category_id', '=', $label->searchC)->paginate();
        $views  = $this->vie->all();
        $category = $this->cat->all();
        return view('home', ['adverts' => $search, 'views' => $views, 'category' => $category]);
    }
}
