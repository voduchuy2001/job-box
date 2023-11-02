<div>
    <div class="card crm-widget">
        <div class="card-body p-0">
            <div class="row row-cols-md-3 row-cols-1">
                <div class="col col-lg border-end">
                    <div class="py-4 px-3">
                        <h5 class="text-muted text-uppercase fs-13">{{ __('Users') }}</h5>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i class="ri-user-3-line display-6 text-muted"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h2 class="mb-0"><span>{{ BaseHelper::numberFormatForHumans($userCounts) }}</span></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col col-lg border-end">
                    <div class="mt-3 mt-md-0 py-4 px-3">
                        <h5 class="text-muted text-uppercase fs-13">{{ __('Total Jobs') }}</h5>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i class="ri-file-2-line display-6 text-muted"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h2 class="mb-0"><span>{{ BaseHelper::numberFormatForHumans($jobCounts) }}</span></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col col-lg border-end">
                    <div class="mt-3 mt-md-0 py-4 px-3">
                        <h5 class="text-muted text-uppercase fs-13">{{ __('Total Jobs Accepted') }}</h5>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i class="ri-file-add-line display-6 text-muted"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h2 class="mb-0"><span>{{ BaseHelper::numberFormatForHumans($acceptedJobCounts) }}</span></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col col-lg border-end">
                    <div class="mt-3 mt-md-0 py-4 px-3">
                        <h5 class="text-muted text-uppercase fs-13">{{ __('Total Jobs Rejected') }}</h5>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i class="ri-file-reduce-line display-6 text-muted"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h2 class="mb-0"><span>{{ BaseHelper::numberFormatForHumans($rejectedJobCounts) }}</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
