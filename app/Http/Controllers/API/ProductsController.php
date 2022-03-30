<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Products;
class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return response()->json(['products' => $products], 200);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'description' => 'required|min:4',
            'price' => 'required|min:4',
        ]);
        $product = Products::create($request->all());
        return response()->json(['product' => $product], 200);
    }
    public function show($id)
    {
        $product = Products::find($id);
        return response()->json(['product' => $product], 200);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'description' => 'required|min:4',
            'price' => 'required|min:4',
        ]);
        $product = Products::find($id);
        $product->update($request->all());
        return response()->json(['product' => $product], 200);
    }
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        return response()->json(['product' => $product], 200);
    }
}
