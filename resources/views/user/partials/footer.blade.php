<footer class="custom-footer bg-dark py-5 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mt-4">
                <div>
                    <div>
                        <img src="{{ asset($settings['logo']) }}" alt="logo light" height="17" />
                    </div>
                    <div class="mt-4 fs-13">
                        <p>{{ $settings['siteSlogan'] }}</p>
                        <ul class="list-inline mb-0 footer-social-link">
                            <li class="list-inline-item">
                                <a
                                    target="_blank"
                                    href="{{ $settings['facebook'] }}" class="avatar-xs d-block">
                                    <div class="avatar-title rounded-circle">
                                        <i class="ri-facebook-fill"></i>
                                    </div>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a
                                    target="_blank"
                                    href="{{ $settings['youtube'] }}" class="avatar-xs d-block">
                                    <div class="avatar-title rounded-circle">
                                        <i class="ri-youtube-fill"></i>
                                    </div>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a
                                    href="mailto:{{ $settings['email'] }}" class="avatar-xs d-block">
                                    <div class="avatar-title rounded-circle">
                                        <i class="ri-google-fill"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="tel:{{ $settings['phoneNumber'] }}" class="avatar-xs d-block">
                                    <div class="avatar-title rounded-circle">
                                        <i class="ri-phone-line"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 ms-lg-auto">
                <div class="row">
                    <div class="col-sm-4 mt-4">
                        <h5 class="text-white mb-0">{{ __('About Us') }}</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><x-link :to="route('term-and-condition.user')">{{ __('Term & Conditions') }}</x-link></li>
                                <li><x-link :to="route('privacy-policy.user')">{{ __('Privacy Policy') }}</x-link></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-4">
                        <h5 class="text-white mb-0">{{ __('Support') }}</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><x-link :to="route('faq-list.user')">{{ __('FAQs') }}</x-link></li>
                                <li><x-link :to="route('contact-us.user')">{{ __('Contact') }}</x-link></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-4">
                        <h5 class="text-white mb-0">{{ __('For Jobs') }}</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><x-link :to="route('job-list.user')">{{ __('Job List') }}</x-link></li>
                                <li><x-link :to="route('company-list.user')">{{ __('Companies') }}</x-link></li>
                                <li><x-link :to="route('student-list.user')">{{ __('Candidates') }}</x-link></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
