<div>
    <section class="row">
        @foreach($jobs as $job)
            <div class="col-lg-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="avatar-sm">
                                <div class="avatar-title bg-soft-warning rounded">
                                    <img src="{{ $job->user->avatar != null ? asset($job->user->avatar->url) : asset('assets/images/users/avatar-10.jpg') }}" alt="" class="avatar-xxs">
                                </div>
                            </div>
                            <div class="ms-3 flex-grow-1">
                                <x-link :to="route('job-detail', ['id' => $job->id])">
                                    <h5>{{ $job->name }}</h5>
                                </x-link>
                                <ul class="list-inline text-muted mb-3">
                                    <li class="list-inline-item">
                                        <i class="ri-building-line align-bottom me-1"></i> {{ $job->user->name }}
                                    </li>
                                    @if($job->addresses->count())
                                        <li class="list-inline-item">
                                            <i class="ri-map-pin-2-line align-bottom me-1"></i> {{ $job->addresses[0]->province->name }}
                                        </li>
                                    @endif
                                    <li class="list-inline-item">
                                        <i class="ri-money-dollar-circle-line align-bottom me-1"></i> {{ __(':min - :max', ['min' => BaseHelper::moneyFormatForHumans($job->min_salary), 'max' => BaseHelper::moneyFormatForHumans($job->max_salary)]) }}
                                    </li>
                                </ul>
                                <div class="hstack gap-2">
                                    <span class="badge badge-soft-danger">{{ __('Deadline: :deadline', ['deadline' => $job->deadline_for_filing]) }}</span>
                                    <span class="badge badge-soft-success">{{ __('Vacancy: :vacancy', ['vacancy' => $job->vacancy]) }}</span>
                                </div>
                            </div>
                            <div>
                                <button type="button" class="btn btn-ghost-primary btn-icon custom-toggle" data-bs-toggle="button">
                                    <span class="icon-on"><i class="ri-bookmark-line"></i></span>
                                    <span class="icon-off"><i class="ri-bookmark-fill"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @if(! count($jobs))
            <x-admin.empty></x-admin.empty>
        @endif
    </section>
</div>