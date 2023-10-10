<div>
    <div class="page-content">
        <div class="container-fluid">
            <x-admin.card>
                <x-form wire:submit.prevent="applyJob">
                    <div class="row">
                        <div class="col-lg-4">
                            <div
                                wire:ignore
                                x-data
                                x-init="
                                                        FilePond.create($refs.input);
                                                        FilePond.setOptions({
                                                            allowMultiple: false,
                                                            server: {
                                                                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                                                    @this.upload('resume', file, load, error, progress)

                                                                },
                                                                revert: (filename, load) => {
                                                                    @this.removeUpload('resume', filename, load)
                                                                },
                                                            },
                                                        });
                                                        ">
                                <label>{{ __('Upload Your Resume') }}</label>
                                <input
                                    type="file"
                                    x-ref="input"
                                    wire:model="resume">
                            </div>

                            @error('resume')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-lg-8">
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
                    </div>
                </x-form>
            </x-admin.card>
        </div>
    </div>
</div>
