<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingRequest;
use App\Models\Listing;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Throwable;

class ListingController extends Controller
{
    public function index(): View
    {
        $listings = Listing::with('employer')
            ->latest()
            ->paginate(5);

        return view('listings.index', compact('listings'));
    }

    public function create(): View
    {
        return view('listings.create');
    }

    public function show(Listing $listing): View
    {
        return view('listings.show', compact('listing'));
    }

    public function edit(Listing $listing): View
    {
        return view('listings.edit', compact('listing'));
    }

    public function store(StoreListingRequest $request): RedirectResponse
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

    public function update(StoreListingRequest $request, Listing $listing): RedirectResponse
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

    public function destroy(Listing $listing): RedirectResponse
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
