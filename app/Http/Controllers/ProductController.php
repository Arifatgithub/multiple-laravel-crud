<?php

namespace App\Http\Controllers;

use PhpParser\Node\Stmt\TryCatch;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\CategoryRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(request()->has('limit') ? request('limit') : 10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try {
            $products = Product::create($request->still());
            if ($products) {
                successResponse('Product added');
                return redirect()->route('products.index');
            }
            errorResponse('try again');
            return redirect()->route('products.create');
        } catch (\Exception $th) {
            errorResponse($th->getMessage());
            return redirect()->route('products.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::find($id);
        return view('products.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $products = Product::find($id);
            if (!$products) {
                return redirect()->route('products.create')->with('id not found');
            }
            $products->title = $request->input('title');
            $products->description = $request->input('description');
            $products->price = $request->input('price');
            $products->sku = $request->input('sku');
            $products->save();
            successResponse('Product added');
            return redirect()->route('products.index');

        } catch (\Exception $th) {
            errorResponse($th->getMessage());
        return redirect()->route('products.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $products = Product::findOrFail($id);
            $products->delete();
            if (!$products) {
                return redirect()->route('products.index')->with('id not found');
            }
                successResponse('product information deleted successfully');
                return redirect()->route('products.index');

        } catch (\Exception $th) {
            errorResponse($th->getMessage());
        return redirect()->route('products.index');
        }
    }
}
