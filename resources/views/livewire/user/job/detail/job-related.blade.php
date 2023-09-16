<div>
    <div class="row">
        @foreach($jobs as $job)
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">

                        <livewire:user.job.wishlist :jobId="$job->id"></livewire:user.job.wishlist>

                        <div class="avatar-sm mb-4">
                            <div class="avatar-title bg-soft-secondary rounded">
                                <img src="{{ $job->user->avatar != null ? asset($job->user->avatar->url) : asset('assets/images/users/avatar-1.jpg') }}" alt="{{ $job->user->name }}" class="avatar-xxs" />
                            </div>
                        </div>
                        <x-link :to="route('job-detail', ['id' => $job->id])">
                            <h5 title="{{ $job->name }}">{!! Str::limit($job->name, 30) !!}</h5>
                        </x-link>
                        <p class="text-muted">{{ $job->user->name }}</p>

                        <div class="d-flex gap-4 mb-3">
                            @if($job->addresses->count())
                                <div>
                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> {{ $job->addresses[0]->province->name }}
                                </div>
                            @endif

                            <div>
                                <i class="ri-time-line text-primary me-1 align-bottom"></i> {{ BaseHelper::dateFormatForHumans($job->created_at) }}
                            </div>
                        </div>

                        <div class="hstack gap-2">
                            <span class="badge badge-soft-danger">{{ __('Deadline: :deadline', ['deadline' => $job->deadline_for_filing]) }}</span>
                            <span class="badge badge-soft-success">{{ __('Vacancy: :vacancy', ['vacancy' => $job->vacancy]) }}</span>
                        </div>

                        <div class="mt-4 hstack gap-2">
                            <a href="#!" class="btn btn-soft-primary w-100">{{ __('Apply Job') }}</a>
                            <x-link
                                :to="route('job-detail', ['id' => $job->id])"
                                class="btn btn-soft-success w-100">{{ __('Overview') }}</x-link>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
