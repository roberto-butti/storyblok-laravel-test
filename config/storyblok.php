<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Content Delivery API
    |--------------------------------------------------------------------------
    |
    | Your Storyblok space access token and content version. Use "draft" for
    | the visual editor and "published" for production.
    |
    */

    'access_token' => env('STORYBLOK_ACCESS_TOKEN'),

    'version' => env('STORYBLOK_VERSION', 'published'),

    /*
    |--------------------------------------------------------------------------
    | Management API
    |--------------------------------------------------------------------------
    |
    | Required only for CLI commands like storyblok:import-component.
    |
    */

    'mapi_token' => env('STORYBLOK_MAPI_TOKEN'),

    'space_id' => env('STORYBLOK_SPACE_ID'),

    /*
    |--------------------------------------------------------------------------
    | Component Namespace
    |--------------------------------------------------------------------------
    |
    | The subdirectory under resources/views/components/ where your Storyblok
    | Blade components live. The component dispatcher will resolve blok names
    | to Blade components inside this namespace.
    |
    | E.g., with "storyblok" a blok named "hero" resolves to:
    |   resources/views/components/storyblok/hero.blade.php
    |
    */

    'component_namespace' => 'storyblok',

    /*
    |--------------------------------------------------------------------------
    | Preview Endpoint
    |--------------------------------------------------------------------------
    |
    | The POST endpoint used by the Storyblok Bridge for real-time preview.
    | Set to null to disable the package-registered route (you can then
    | register your own).
    |
    */

    'preview_path' => '/api/preview',

    /*
    |--------------------------------------------------------------------------
    | Preview View
    |--------------------------------------------------------------------------
    |
    | The Blade view rendered when the bridge sends a preview request. This
    | view receives a $story variable with the full story payload.
    |
    */

    'preview_view' => 'story',

];
