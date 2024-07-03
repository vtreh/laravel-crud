<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingRequest;
use App\Mail\ListingPosted;
use App\Models\Listing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
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

    public function edit(Listing $listing): View|RedirectResponse
    {
        // Gate::authorize('edit-listing', $listing);

        return view('listings.edit', compact('listing'));
    }

    public function store(StoreListingRequest $request): RedirectResponse
    {
        try {
            $listing = Listing::create($request->validated() + [
                'employer_id' => Auth::user()->employer->id,
            ]);

            Mail::to(Auth::user()->email)->queue(
                new ListingPosted($listing),
            );
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
        Gate::authorize('edit-listing', $listing);

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
