<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Models\Wallet;

use Illuminate\Support\Str;



class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wallets = Wallet::all();

        return view('pages.wallet.index', compact('wallets'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.wallet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWalletRequest $request)
    {


        $validatedData = $request->validated();


        $slug = Wallet::generateSlug($request->title);
        $validatedData['slug'] = $slug;


        $path = Storage::disk('public')->put('images', $request->new_image);

        $validatedData['new_image'] = $path;

        $wallet = Wallet::create( $validatedData );

        return redirect()->route('dashboard.wallets.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Wallet $wallet)
    {
        return view('pages.wallet.show', compact('wallet'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wallet $wallet)
    {
        $wallets = Wallet::findOrFail($wallet->id);
        return view('pages.wallet.edit', compact('wallets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWalletRequest $request, Wallet $wallet)
    {
        $validatedData = $request->validated();
        $slug = Wallet::generateSlug($request->title);

        $validatedData['slug'] = $slug;

        $wallet->update($validatedData);

        return redirect()->route('dashboard.wallets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wallet $wallet)
    {

        $wallet->delete();

        return redirect()->route('dashboard.wallets.index');
    }
}
