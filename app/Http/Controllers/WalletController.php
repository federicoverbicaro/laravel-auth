<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Models\Wallet;


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
        $this->authorize('create', Wallet::class);

        return view('pages.wallet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWalletRequest $request): RedirectResponse
    {
        if ($request->user()->can('create', Wallet::class)) {
            abort(403);
        }

        $formData = $request->validated();

        $slug = Wallet::generateSlug($request->title);

        $formData['slug'] = $slug;

        $newWallet = Wallet::create($formData);

        return redirect()->route('dashboard.wallets.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWalletRequest $request, Wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wallet $wallet)
    {
        //
    }
}
