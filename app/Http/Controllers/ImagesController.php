<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImagesController extends Controller
{
    private $obj;

    public function __construct()
    {
        $this->obj = new Images();
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $save = new Images();
        if ($request->hasFile('photo')) {
            $path = $request->photo->store('photo');
            $save->photo = $path;
            $destinationPath = public_path('/imagens');
            $request->photo->move($destinationPath, $path);
        }
        $save->advert_id = $request->advert_id;
        $result = $save->save();
        if ($result) {
            DB::commit();
            return redirect()->route('adverts.show', $request->advert_id)->with('error', 'item adcionado com successo');
        } else {
            DB::rollBack();
            return redirect()->back()->with('error', 'Houve um erro ao tentar cadastrar o anúncio');
        }
    }

    public function destroy($images)
    {
        $result = Images::find($images);
        $destroy = $result->delete();
        if ($destroy) {
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Erro ao deletar imagem');
        }
    }
}
