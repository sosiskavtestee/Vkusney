<?php

namespace App\Http\Controllers;

use App\Models\Tovar;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class TovarController extends Controller
{
    //
    public function katalog()
    {
        $data = [];
        $tovar = Tovar::paginate(6);
        $category = Category::all();
        $product = Product::get();
        $slider = Slider::orderBy('id', 'desc')->limit(2)->get();
        $data['slider'] = $slider;
        $data['product'] = $product;
        $data['category'] = $category;
        $data['tovar'] = $tovar;
        return view('katalog', $data);
    }

    public function singleTov($id)
    {
        $data = [];
        $tovar = Tovar::find($id);
        $data['tovar'] = $tovar;
        return view('tovpage', $data);

    }


    public function formEdit($id)
    {
        if (!Auth::user()->admin)
            return redirect(route('login'));
        $data = [];
        $tovar = Tovar::find($id);
        $category = Category::get();
        $data['category'] = $category;
        $data['tovar'] = $tovar;
        return view('edit', $data);
    }

    public function editSave(Request $r)
    {
        if (!Auth::user()->admin)
            return redirect(route('login'));
        $t = Tovar::find($r->id);
        $t->name = $r->name;

        $t->category_id = $r->category;
        $t->price = $r->price;
        $t->amount = $r->amount;
        $t->packaging = $r->packaging;
        $t->percent = $r->percent;
        $t->weight = $r->weight;

        $t->desc = $r->desc;

        if (!empty($r->file('image')))
            $t->image = $r->file('image')->store('public/tovars');
        $t->save();
        return redirect('/admin');

    }

    public function categorytov($id)
    {
        $category = Category::find($id);
        $data['category'] = $category;
        return view('katalogkategory', $data);

    }

    public function addTovarForm()
    {
        if (!Auth::user()->admin)
            return redirect(route('login'));

        $data = [];

        $category = Category::get();
        $data['category'] = $category;

        return view('addTovar', $data);

    }
    public function addTovarSave(Request $r)
    {
        if (!Auth::user()->admin)
            return redirect(route('login'));

        $t = new Tovar();
        $t->name = $r->name;

        $t->category_id = $r->category;
        $t->price = $r->price;
        $t->amount = $r->amount;
        $t->packaging = $r->packaging;
        $t->percent = $r->percent;
        $t->weight = $r->weight;

        $t->desc = $r->desc;

        if (!empty($r->file('image'))) {
            $t->image = $r->file('image')->store('public/tovars');
        }
        $t->save();
        return redirect('/admin');
    }

    public function delTovar($id)
    {
        if (!Auth::user()->admin)
            return redirect(route('login'));

        $tovar = Tovar::find($id);
        $tovar->delete();
        return redirect('/admin');
    }

}