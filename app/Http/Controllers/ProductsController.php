<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function deleteProductImage(Request $request, Product $product)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'image' => ['required', 'string'],
        ]);

        $imagePath = $validated['image'];

        // Ensure image exists in product images array
        if (!in_array($imagePath, $product->images ?? [])) {
            return response()->json(['message' => 'Image not found'], 404);
        }

        // Delete file from storage
        Storage::disk('public')->delete($imagePath);

        // Remove image path from array
        $product->images = array_values(
            array_filter(
                $product->images,
                fn ($img) => $img !== $imagePath
            )
        );

        $product->save();

        return response()->json(['message' => 'Image deleted']);
    }

    public function updateProductImages(Request $request, Product $product)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'thumbnail' => [
                'nullable',
                File::image()->max(2 * 1024),
            ],
            'images.*' => [
                'nullable',
                File::image()->max(2 * 1024),
            ],
        ]);

        // ─────────────────────────────
        // 1. Update thumbnail
        // ─────────────────────────────
        if ($request->hasFile('thumbnail')) {

            // Delete old thumbnail if exists
            if ($product->thumbnail) {
                Storage::disk('public')->delete($product->thumbnail);
            }

            $product->thumbnail = $request
                ->file('thumbnail')
                ->store('products/thumbnails', 'public');
        }

        // ─────────────────────────────
        // 2. Append new gallery images
        // ─────────────────────────────
        $existingImages = $product->images ?? [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $existingImages[] = $image
                    ->store('products/images', 'public');
            }
        }

        $product->images = $existingImages;

        $product->save();

        return back()->with('success', 'Product images updated successfully!');
    }

    public function updateProduct(Request $request, Product $product)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
        ]);

        $product->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'stock' => $validated['stock'],
        ]);

        return back()->with('success', 'Product updated successfully!');
    }

    public function editProduct(Product $product)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return view('partials.edit-product', ['product' => $product]);
        }

        return "<h1>NO ACCESS</h1>";
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],

            'thumbnail' => [
                'nullable',
                File::image()->max(2 * 1024),
            ],

            'images.*' => [
                'nullable',
                File::image()->max(2 * 1024),
            ],
        ]);

        // ─────────────────────────────
        // 1. Store thumbnail
        // ─────────────────────────────
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request
                ->file('thumbnail')
                ->store('products/thumbnails', 'public');
        }

        // ─────────────────────────────
        // 2. Store gallery images
        // ─────────────────────────────
        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image
                    ->store('products/images', 'public');
            }
        }

        // ─────────────────────────────
        // 3. Create product
        // ─────────────────────────────
        Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'thumbnail' => $thumbnailPath,
            'images' => $imagePaths,
            'is_active' => true,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Product created successfully!');
    }
}
