<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Helpers\ApiResponse;
use App\Services\ProductService;
class ProductController extends Controller
{
   public function index(Request $request)
{
    $query = Product::query();

    // Search
    if ($request->filled('search')) {
        $query->where(
            'name',
            'like',
            '%' . $request->search . '%'
        );
    }

    // Minimum Price Filter
    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }

    // Maximum Price Filter
    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }

    // Sorting
    $allowedSorts = ['id', 'name', 'price', 'quantity'];

    $sort = in_array($request->sort, $allowedSorts)
        ? $request->sort
        : 'id';

    $direction = $request->direction === 'asc'
        ? 'asc'
        : 'desc';

    $query->orderBy($sort, $direction);

    // Pagination
    return ApiResponse::success(
    ProductResource::collection(
        $query->paginate(2)
    ),
    'Products fetched successfully'
);
}
    
public function create()
{
    return view('products.create');
}
    public function show(Product $product)
     { 
        return ApiResponse::success(new ProductResource($product),'Product fetched successfully');
         }

public function store(
    ProductRequest $request,
    ProductService $service
)
{
    $product = $service->create(
        $request->validated()
    );

    return ApiResponse::success(
        new ProductResource($product),
        'Product Created Successfully',
        201
    );
}

    public function edit($id)
{
    $product = Product::findOrFail($id);

    return view('products.edit', compact('product'));
}

 public function destroy(Product $product)
{
    if (!auth()->user()->can('product.delete')) {
        return response()->json([
            'message' => 'Unauthorized'
        ], 403);
    }

    $product->delete();

    return response()->json([
        'message' => 'Deleted successfully'
    ]);
}
  
}