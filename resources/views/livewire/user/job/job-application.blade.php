<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <x-admin.card>
                    <x-form wire:submit.prevent="applyJob">
                        <div class="row mb-4">
                            <div class="col-lg-6 mb-2">
                                <label for="resume" class="file-upload">{{ __('Click Here To Browser File') }}</label>
                                <input
                                    hidden
                                    id="resume"
                                    name="resume"
                                    wire:model="resume"
                                    type="file"
                                    accept=".doc,.docx,.pdf"
                                    class="form-control" />

                                @error('resume')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror

                                @if($fileName)
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <strong> {{ $fileName }}</strong>
                                        <button
                                            wire:click="removeResume"
                                            type="button"
                                            class="btn-close"></button>
                                    </div>
                                @endif
                            </div>

                            <div class="col-lg-6">
                                <textarea
                                    name="presentation"
                                    wire:model="presentation"
                                    id="presentation"
                                    class="form-control"
                                    id="letter-of-recommendation"
                                    rows="4"
                                    placeholder="{{ __('Write a brief introduction about yourself (strengths and weaknesses) and clearly state your desire and reasons for working at this company. This is how to impress employers if you have no work experience (or your resume is not good).') }}"></textarea>
                                </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="alert alert-warning alert-border-left" role="alert">
                                <i class="ri-alert-line me-3 align-middle"></i> <strong>{{ __('Attention') }}</strong>
                                <ol>
                                    <li>{{ __('Candidates should choose to apply using CV Online.') }}</li>
                                    <li>{{ __('For the best experience, you should use popular browsers like Google Chrome or Firefox.') }}</li>
                                    <li>{{ __('Please always be careful during the job search process and proactively research company information and job positions before applying.') }}</li>
                                </ol>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <x-button
                                    type="submit"
                                    class="btn btn-primary">{{ __('Apply Job') }}</x-button>
                            </div>
                        </div>
                    </x-form>
                </x-admin.card>
            </div>
        </div>
    </div>
</div>
