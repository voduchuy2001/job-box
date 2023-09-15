<div>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-n4 mx-n4">
                        <div class="bg-soft-warning">
                            <div class="card-body px-4 pb-4">
                                <div class="row mb-3">
                                    <div class="col-md">
                                        <div class="row align-items-center g-3">
                                            <div class="col-md-auto">
                                                <div class="avatar-md">
                                                    <div class="avatar-title bg-white rounded-circle">
                                                        <img src="{{ $job->user->avatar != null ? asset($job->user->avatar->url) : asset('assets/images/users/avatar-10.jpg') }}" alt="{{ $job->user->name }}" class="avatar-xs">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div>
                                                    <h4 class="fw-bold">{{ $job->name }}</h4>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <div>
                                                            <i class="ri-building-line align-bottom me-1"></i>
                                                            {{ $job->user->name }}
                                                        </div>

                                                        @if($job->addresses->count())
                                                        <div class="vr"></div>
                                                            <div><i class="ri-map-pin-2-line align-bottom me-1"></i> {{ $job->addresses[0]->province->name }}</div>
                                                        @endif

                                                        <div class="vr"></div>

                                                        <div>{{ __('Post Date: :at', ['at' => BaseHelper::dateFormat($job->created_at)]) }}</span></div>
                                                        <div class="vr"></div>
                                                        <div class="badge rounded-pill bg-success fs-12">{{ $job->type }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-n5">
                <div class="col-xxl-9">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-3">{{ __('Job Description') }}</h5>

                            <div class="text-break mb-3">
                                {{ $job->description }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">{{ __('Job Overview') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="fw-medium">{{ __('Title') }}</td>
                                        <td>{{ $job->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">{{ __('Company Name') }}</td>
                                        <td>{{ $job->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">{{ __('Location') }}</td>
                                        <td>
                                            @if($job->addresses->count())
                                                @foreach($job->addresses as $address)
                                                    <p>{{ __(':district, :province', ['district' => $address->district->name, 'province' => $address->province->name]) }} @if(! $loop->last), @endif</p>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">{{ __('Time') }}</td>
                                        <td><span class="badge badge-soft-success">{{ $job->type }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">{{ __('Job Application') }}</td>
                                        <td>{{ __(':count Application', ['count' => $job->vacancy]) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">{{ __('Post Date') }}</td>
                                        <td>{{ BaseHelper::dateFormat($job->created_at) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">{{ __('Salary') }}</td>
                                        <td>{{ __(':min - :max', ['min' => BaseHelper::moneyFormatForHumans($job->min_salary), 'max' => BaseHelper::moneyFormatForHumans($job->max_salary)]) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">{{ __('Experience') }}</td>
                                        <td>{{ $job->experience != 'more' ? __(':experience Year(s)', ['experience' => $job->experience]) : __('More +') }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-4 pt-2 hstack gap-2">
                                <x-link href="#!" class="btn btn-primary w-100">{{ __('Apply Now') }}</x-link>
                                <button class="btn btn-soft-danger btn-icon custom-toggle flex-shrink-0" data-bs-toggle="button">
                                    <span class="icon-on"><i class="ri-bookmark-line align-bottom"></i></span>
                                    <span class="icon-off"><i class="ri-bookmark-3-fill align-bottom"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--end card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="avatar-sm mx-auto">
                                <div class="avatar-title bg-soft-warning rounded">
                                    <img src="{{ $job->user->avatar != null ? asset($job->user->avatar->url) : asset('assets/images/users/avatar-10.jpg') }}" alt="{{ $job->user->name }}" class="avatar-xxs">
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="#!">
                                    <h5 class="mt-3">{{ $job->user->name }}</h5>
                                </a>
                            </div>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="fw-medium">Company Size</td>
                                        <td>50+</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Industry Type</td>
                                        <td>Software</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Founded in</td>
                                        <td>2016</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Phone</td>
                                        <td>+(234) 12345 67890</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Email</td>
                                        <td>themesbrand@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Social media</td>
                                        <td>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="#!"><i class="ri-whatsapp-line"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#!"><i class="ri-facebook-line"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#!"><i class="ri-twitter-line"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#!"><i class="ri-youtube-line"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">{{ __('Contact Us') }}</h5>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="nameInput" class="form-label">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" id="nameInput" placeholder="Enter your name">
                                </div>
                                <div class="mb-3">
                                    <label for="emailInput" class="form-label">{{ __('Email') }}</label>
                                    <input type="text" class="form-control" id="emailInput" placeholder="Enter your email">
                                </div>
                                <div class="mb-3">
                                    <label for="messageInput" class="form-label">{{ __('Message') }}</label>
                                    <textarea class="form-control" id="messageInput" rows="3" placeholder="Message"></textarea>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">{{ __('Send Message') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h5 class="mb-0">{{ __('Related Jobs') }}</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="#!" class="btn btn-ghost-success">{{ __('View All') }}<i class="ri-arrow-right-line ms-1 align-bottom"></i></a>
                        </div>
                    </div>
                </div>
                @foreach($relatedJobs as $job)
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-icon btn-soft-primary float-end" data-bs-toggle="button" aria-pressed="true"><i class="mdi mdi-cards-heart fs-16"></i></button>
                                <div class="avatar-sm mb-4">
                                    <div class="avatar-title bg-soft-secondary rounded">
                                        <img src="{{ $job->user->avatar != null ? asset($job->user->avatar->url) : asset('assets/images/users/avatar-1.jpg') }}" alt="{{ $job->user->name }}" class="avatar-xxs" />
                                    </div>
                                </div>
                                <x-link to="#!">
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

                                <p class="text-muted" title="{{ $job->description }}">{!! Str::limit($job->description, 30) !!}</p>

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
    </div>
</div>
