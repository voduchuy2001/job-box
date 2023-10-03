<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="row row-cols-xl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                    @foreach($students as $student)
                        <div class="col mt-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img src="{{ $student->avatar != null ? asset($student->avatar->url) : asset('assets/images/users/avatar-10.jpg') }}" alt="" class="avatar-md rounded-circle object-cover mt-n5 img-thumbnail border-light mx-auto d-block">
                                    <a
                                        target="_blank"
                                        href="{{ route('user-resume-preview.user', ['id' => $student->id]) }}">
                                        <h5 class="mt-2 mb-1">{{ $student->studentProfile->payload['firstName'] }} {{ $student->studentProfile->payload['lastName'] }}</h5>
                                    </a>
                                    <p class="text-muted mb-2">{{ __('Email :email', ['email' => $student->studentProfile->payload['email']]) }}</p>
                                    <p class="text-muted">{{ __('Phone Number: :phone', ['phone' => $student->studentProfile->payload['phone']]) }}</p>
                                    <a
                                        target="_blank"
                                        href="{{ route('user-resume-preview.user', ['id' => $student->id]) }}"
                                        class="btn btn-soft-success w-100">{{ __('View Resume') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if(! $students->count())
                        <div class="col-lg-12">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <x-admin.empty></x-admin.empty>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="col-lg-12 mt-4">
                        <div class="d-flex align-items-center justify-content-center">
                            {{ $students->onEachSide(0)->links() }}
                        </div>
                    </div>

                    <div class="text-center my-2" wire:loading>
                        <span class="text-primary"><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i>{{ __('Loading...') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
