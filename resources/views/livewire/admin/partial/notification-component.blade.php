<div>
    <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
            <i class='bx bx-bell fs-22'></i>
            <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">{{ $unread }}<span class="visually-hidden">unread messages</span></span>
        </button>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">

            <div class="dropdown-head bg-primary bg-pattern rounded-top">
                <div class="p-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="m-0 fs-16 fw-semibold text-white"> {{ __('Notifications') }} </h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="position-relative">
                <div class="py-2 ps-2">
                    <div data-simplebar style="max-height: 300px;" class="pe-2">
                        @foreach($notifications as $notification)
                            <div class="text-reset notification-item d-block dropdown-item position-relative">
                                <div class="d-flex">
                                    <div class="flex-1">
                                        <x-link
                                            :to="route('job.edit', ['id' => $notification->data['id']])"
                                            class="stretched-link">
                                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">{{ $notification->data['name'] }}</h6>
                                        </x-link>
                                        <div class="fs-13 text-muted">
                                            <p class="mb-1">{{ $notification->type == 'App\Notifications\CompanyJobEditNotification' ? trans('Has been updated 🔔') : trans('Has been added 🔔') }}</p>
                                        </div>
                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                            <span><i class="mdi mdi-clock-outline"></i> {{ BaseHelper::dateFormatForHumans($notification->created_at) }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if($notifications->count())
                            <div class="my-3 text-center view-all">
                                <x-link
                                    :to="route('notification.index')"
                                    class="btn btn-soft-success waves-effect waves-light"> {{ trans('View More') }} <i class="ri-arrow-right-line align-middle"></i></x-link>
                            </div>
                        @else
                            <div class="my-3 text-center">
                                <div class="mb-3">
                                    <i class="ri-notification-2-line fs-22"></i>
                                </div>
                                <h3>{{ __('Empty Notification') }}</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
