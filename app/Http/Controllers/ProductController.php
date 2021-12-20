<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $products;

    public function __construct(Product $product)
    {
        $this->products = $product;
    }

    public function index()
    {
        $products = $this->products->latest('id')->paginate(5);
        return view('products.index', compact('products'));
    }

    public function show(int $id)
    {
        $products = $this->products->first($id);
        return view('products.show', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(CreateRequest $request)
    {
        $this->products->create($request->all());
        return redirect(route('products.index'));
    }

    public function destroy(int $id)
    {
        $this->products->deleteProduct($id);
        return redirect(route('products.index'));
    }

    public function edit(int $id)
    {
        $products = $this->products->first($id);
        return view('products.edit', compact('products'));
    }

    public function update(CreateRequest $request, int $id)
    {
        $this->products->first($id)->update($request->all());
        return redirect(route('products.index'));
    }
}
