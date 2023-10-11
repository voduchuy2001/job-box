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
                        <h5 class="text-white mb-0">Company</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><a href="pages-profile.html">About Us</a></li>
                                <li><a href="pages-gallery.html">Gallery</a></li>
                                <li><a href="pages-team.html">Team</a></li>
                                <li><a href="pages-pricing.html">Pricing</a></li>
                                <li><a href="pages-timeline.html">Timeline</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-4">
                        <h5 class="text-white mb-0">For Jobs</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><a href="apps-job-lists.html">Job List</a></li>
                                <li><a href="apps-job-application.html">Application</a></li>
                                <li><a href="apps-job-new.html">New Job</a></li>
                                <li><a href="apps-job-companies-lists.html">Company List</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-4">
                        <h5 class="text-white mb-0">Support</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><a href="pages-faqs.html">FAQ</a></li>
                                <li><a href="pages-faqs.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>
