<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Tovar;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function kabinet()
    {
        $user = Auth::user();
        $data['user'] = $user;

        return view('kabinet', $data);
    }

    public function admin()
    {
        if (!Auth::user()->admin)
            return redirect(route('login'));
        $user = Auth::user();
        $data['user'] = $user;
        $category = Category::all();
        $tovar = Tovar::paginate(8);
        $order = Order::all();
        $data['category'] = $category;
        $data['tovar'] = $tovar;
        $data['order'] = $order;
        return view('admin', $data);
    }

    public function formCategEdit($id)
    {
        $data = [];
        $category = Category::find($id);
        $data['category'] = $category;
        return view('editCategory', $data);
    }

    public function editCategSave(Request $r)
    {
        if (!Auth::user()->admin)
            return redirect(route('login'));
        $t = Category::find($r->id);
        $t->name = $r->name;
        $t->save();
        return redirect('/admin');

    }

    public function formOrderEdit($id)
    {
        $data = [];
        $order = Order::find($id);
        $data['order'] = $order;
        $user = User::get();
        $data['user'] = $user;
        return view('editOrder', $data);
    }

    public function editOrderSave(Request $r)
    {
        if (!Auth::user()->admin)
            return redirect(route('login'));
        $t = Order::find($r->id);
        $t->status = $r->status;
        $t->save();
        return redirect('/admin');

    }

    public function addCategForm()
    {
        if (!Auth::user()->admin)
            return redirect(route('login'));

        $data = [];


        return view('addCateg', $data);

    }
    public function addCategSave(Request $r)
    {
        if (!Auth::user()->admin)
            return redirect(route('login'));

        $t = new Category();
        $t->name = $r->name;
        $t->category_id = $r->category_id;
        $t->save();
        return redirect('/admin');
    }

    public function delCateg($id)
    {
        if (!Auth::user()->admin)
            return redirect(route('login'));

        $category = Category::find($id);
        $category->delete();
        return redirect('/admin');
    }

    public function delOrder($id)
    {
        if (!Auth::user()->admin)
            return redirect(route('login'));

        $order = Order::find($id);
        $order->delete();
        return redirect('/admin');
    }


}