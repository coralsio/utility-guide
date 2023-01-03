<?php

Breadcrumbs::register('utility_guide', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(trans('utility-guide::module.guide.title'), url(config('utility-guide.models.guide.resource_url')));
});

Breadcrumbs::register('utility_guide_create_edit', function ($breadcrumbs) {
    $breadcrumbs->parent('utility_guide');
    $breadcrumbs->push(trans('utility-guide::module.guide.title'), url(config('utility-guide.models.guide.resource_url')));
});
