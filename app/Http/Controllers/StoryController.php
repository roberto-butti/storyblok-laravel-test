<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storyblok\Api\Request\StoryRequest;
use Storyblok\Api\StoriesApi;

class StoryController extends Controller
{
    public function __construct(private StoriesApi $storiesApi) {}

    public function show(string $slug = 'home')
    {
        $response = $this->storiesApi->bySlug($slug, new StoryRequest());

        return view('story', ['story' => $response->story]);
    }
}
