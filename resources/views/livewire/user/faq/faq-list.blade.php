<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card rounded-0 bg-soft-success mx-n4 mt-n4 border-top">
                        <div class="px-4">
                            <div class="row">
                                <div class="col-xxl-5 align-self-center">
                                    <div class="py-4">
                                        <h4 class="display-6 coming-soon-text">{{ __('Frequently asked questions') }}</h4>
                                        <p class="text-success fs-15 mt-3">{{ __('If you can not find answer to your question in our FAQ, you can always contact us or email us. We will answer you shortly!') }}</p>
                                        <div class="hstack flex-wrap gap-2">
                                            <a href="mailto:{{ $settings['email'] }}" type="button" class="btn btn-primary btn-label rounded-pill"><i class="ri-mail-line label-icon align-middle rounded-pill fs-16 me-2"></i> {{ __('Email Us') }}</a>
                                            <a href="tel:{{ $settings['phoneNumber'] }}" type="button" class="btn btn-info btn-label rounded-pill"><i class="ri-phone-line label-icon align-middle rounded-pill fs-16 me-2"></i> {{ __('Call Us') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($faqsChunks as $faqsChunk)
                            <div class="col-lg-4">
                                @foreach ($faqsChunk as $faq)
                                    <div class="mt-3">
                                        <div class="accordion accordion-border-box" id="faq-accordion-{{ $loop->parent->index }}-{{ $loop->index }}">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="faq-heading-{{ $loop->parent->index }}-{{ $loop->index }}">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-{{ $loop->parent->index }}-{{ $loop->index }}" aria-expanded="false" aria-controls="faq-collapse-{{ $loop->parent->index }}-{{ $loop->index }}">
                                                        {{ $faq->question }}
                                                    </button>
                                                </h2>
                                                <div id="faq-collapse-{{ $loop->parent->index }}-{{ $loop->index }}" class="accordion-collapse collapse" aria-labelledby="faq-heading-{{ $loop->parent->index }}-{{ $loop->index }}" data-bs-parent="#faq-accordion-{{ $loop->parent->index }}-{{ $loop->index }}">
                                                    <div class="accordion-body">
                                                        {{ $faq->answer }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
