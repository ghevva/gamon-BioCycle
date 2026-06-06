<?php

namespace App\Http\Controllers;

use App\Models\RewardHistory;

class RedemptionController extends Controller
{
    public function index()
    {
        $redemptions = RewardHistory::latest()->get();

        return view(
            'redemption.index',
            compact('redemptions')
        );
    }

    public function complete(RewardHistory $redemption)
    {
        $redemption->update([
            'status' => 'success'
        ]);

        return back()->with(
            'success',
            'Status berhasil diubah'
        );
    }
}