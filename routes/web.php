<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;

Route::get("/", function () {
    return view("welcome");
});

Route::get("/story/{slug?}", [StoryController::class, "show"])
    ->where("slug", ".*")
    ->name("story.show");
