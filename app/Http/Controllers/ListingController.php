<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingRequest;
use App\Models\Listing;
use Illuminate\Http\Request;
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

    public function edit(Listing $listing)
    {
        return view('listings.edit', compact('listing'));
    }

    public function store(StoreListingRequest $request)
    {
        try {
            Listing::create($request->validated());
        } catch (Throwable) {
        } finally {
            return redirect(
                route('listings.index'),
            );
        }
    }

    public function update(StoreListingRequest $request, Listing $listing)
    {
        try {
            $listing->update($request->validated());
        } catch (Throwable) {
        } finally {
            return redirect(
                route('listings.show', $listing->id),
            );
        }
    }

    public function destroy(Listing $listing)
    {
        try {
            $listing->delete();
        } catch (Throwable) {
        } finally {
            return redirect(
                route('listings.index'),
            );
        }
    }
}
