<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;

Route::get('/listings', function () {
    $listings = Listing::with('employer')->paginate(5);

    return view('listings', compact('listings'));
});
