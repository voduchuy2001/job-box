<?php
    $icons = [
        'ri-pencil-ruler-2-line',
        'ri-heart-line', 'ri-star-line',
        'ri-bubble-chart-line',
        'ri-command-line',
        'ri-bilibili-line',
        'ri-coin-line',
        'ri-exchange-funds-fill',
    ];
    shuffle($icons);
?>

<div>
    <section class="section bg-light" id="categories">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center mb-5">
                        <h1 class="mb-3 ff-secondary fw-semibold text-capitalize lh-base">{{ __('High demand jobs Categories featured') }}</h1>
                        <p class="text-muted">{{ __("Post a job to tell us about your project. We'll quickly match you with the right freelancers.") }}</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                @foreach($categories as $key => $category)
                    <div class="col-lg-3 col-md-6">
                        <div class="card shadow-none text-center py-3">
                            <div class="card-body py-4">
                                <div class="avatar-sm position-relative mb-4 mx-auto">
                                    <div class="job-icon-effect"></div>
                                    <div class="avatar-title bg-transparent text-success rounded-circle">
                                        <i class="{{ $icons[$key % count($icons)] }} fs-1"></i>
                                    </div>
                                </div>
                                <a href="#!" class="stretched-link">
                                    <h5 class="fs-17 pt-1">{{ $category->name }}</h5>
                                </a>
                                <p class="mb-0 text-muted">{{ __(':count Jobs', ['count' => $category->jobs->count()]) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
