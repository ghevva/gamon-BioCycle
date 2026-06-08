<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\RewardHistory;

class RewardController extends Controller
{
    // ================== HALAMAN USER ==================
    public function index()
    {
        if (!session()->has('user')) {
            return redirect('/login')
                ->with(
                    'error',
                    'Silakan login terlebih dahulu'
                );
        }

        $products = Product::all();

        return view('reward', compact('products'));
    }

    // ================== HALAMAN VERIFIKASI ==================
    public function verify($id)
    {
        if (!session()->has('user')) {
            return redirect('/login')
                ->with(
                    'error',
                    'Silakan login terlebih dahulu'
                );
        }

        $user = User::find(session('user')->id);

        $product = Product::findOrFail($id);

        if ($user->points < $product->points) {
            return redirect()
                ->route('reward.index')
                ->with('error', 'Poin tidak cukup');
        }

        return view('reward-verify', compact('user', 'product'));
    }

    // ================== KONFIRMASI PENUKARAN ==================
    public function confirm($id)
    {
        if (!session()->has('user')) {
            return redirect('/login');
        }

        $user = User::find(session('user')->id);

        $product = Product::findOrFail($id);

        if ($user->points < $product->points) {
            return redirect()
                ->route('reward.index')
                ->with('error', 'Poin tidak cukup');
        }

        // KURANGI POIN USER
        $user->points -= $product->points;
        $user->save();

        // SIMPAN RIWAYAT PENUKARAN
        RewardHistory::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'product_name' => $product->name,
            'points_used' => $product->points,
            'status' => 'pending'
        ]);

        // REFRESH SESSION
        $updatedUser = User::find($user->id);

        session()->forget('user');

        session([
            'user' => $updatedUser
        ]);

        return redirect()
            ->route('reward.success')
            ->with('success_product', $product->name);
    }

    // ================== HALAMAN SUKSES ==================
    public function success()
    {
        if (!session()->has('user')) {
            return redirect('/login');
        }

        return view('reward-success');
    }

    // ================== RIWAYAT PENUKARAN ==================
    public function history()
    {
        if (!session()->has('user')) {
            return redirect('/login')
                ->with(
                    'error',
                    'Silakan login terlebih dahulu'
                );
        }

        $histories = RewardHistory::where(
            'user_id',
            session('user')->id
        )->latest()->get();

        return view(
            'reward-history',
            compact('histories')
        );
    }

    // =====================================================
    // ================== ADMIN PANEL =======================
    // =====================================================

    public function productIndex()
    {
        if (
            !session()->has('user') ||
            session('user')->role != 'admin'
        ) {
            return redirect('/');
        }

        $products = Product::latest()->get();

        return view('product.index', compact('products'));
    }

    public function create()
    {
        if (
            !session()->has('user') ||
            session('user')->role != 'admin'
        ) {
            return redirect('/');
        }

        return view('product.create');
    }

    public function store(Request $request)
    {
        if (
            !session()->has('user') ||
            session('user')->role != 'admin'
        ) {
            return redirect('/');
        }

        Product::create([
            'name' => $request->name,
            'points' => $request->points,
            'image' => $request->image,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('product.index')
            ->with(
                'success',
                'Produk berhasil ditambahkan'
            );
    }

    public function edit(Product $product)
    {
        if (
            !session()->has('user') ||
            session('user')->role != 'admin'
        ) {
            return redirect('/');
        }

        return view(
            'product.edit',
            compact('product')
        );
    }

    public function update(
        Request $request,
        Product $product
    ) {
        if (
            !session()->has('user') ||
            session('user')->role != 'admin'
        ) {
            return redirect('/');
        }

        $product->update([
            'name' => $request->name,
            'points' => $request->points,
            'image' => $request->image,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('product.index')
            ->with(
                'success',
                'Produk berhasil diupdate'
            );
    }

    public function destroy(Product $product)
    {
        if (
            !session()->has('user') ||
            session('user')->role != 'admin'
        ) {
            return redirect('/');
        }

        $product->delete();

        return back()->with(
            'success',
            'Produk berhasil dihapus'
        );
    }
}