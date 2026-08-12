<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(): View
    {
        $products = Product::orderBy('ordem')->orderBy('nome')->get();

        return view('admin.products.index', ['products' => $products]);
    }

    public function reorder(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['integer', 'exists:products,id'],
        ]);

        DB::transaction(function () use ($validated): void {
            foreach ($validated['ids'] as $index => $id) {
                Product::whereKey($id)->update(['ordem' => $index + 1]);
            }
        });

        return response()->json(['ok' => true]);
    }

    public function create(): View
    {
        return view('admin.products.create', [
            'product' => new Product(['status' => ProductStatus::Disponivel]),
            'statuses' => ProductStatus::options(),
        ]);
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->safe()->except('imagem');

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('products', 'public');
        }

        Product::create($data);

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'Produto criado com sucesso.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', [
            'product' => $product,
            'statuses' => ProductStatus::options(),
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $data = $request->safe()->except('imagem');

        if ($request->hasFile('imagem')) {
            if ($product->imagem) {
                Storage::disk('public')->delete($product->imagem);
            }
            $data['imagem'] = $request->file('imagem')->store('products', 'public');
        }

        $product->update($data);

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'Produto atualizado com sucesso.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        if ($product->imagem) {
            Storage::disk('public')->delete($product->imagem);
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'Produto removido.');
    }
}
