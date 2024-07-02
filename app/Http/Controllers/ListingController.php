<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingRequest;
use App\Models\Listing;
use Throwable;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::with('employer')
            ->latest()
            ->paginate(5);

        return view('listings.index', compact('listings'));
    }

    public function create()
    {
        return view('listings.create');
    }

    public function show(Listing $listing)
    {
        return view('listings.show', compact('listing'));
    }

    public function store(StoreListingRequest $request)
    {
        try {
            Listing::create($request->validated());
        } catch (Throwable) {}

        return redirect(route('listings.index'));
    }
}
