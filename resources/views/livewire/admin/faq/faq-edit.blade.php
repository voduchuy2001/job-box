<div>
    @include('admin.partials.page-title')

    <x-admin.card>
        <x-form wire:submit.prevent="updateFAQ">
            <div class="row">
                <div class="col-lg-12">
                    <x-admin.input
                        :label="__('Question')"
                        class="form-control"
                        type="text"
                        id="question"
                        name="question"
                        model="question"
                        placeholder="{{ __('Enter question') }}"
                    ></x-admin.input>
                </div>

                <div class="col-lg-12">
                    <x-admin.input.textarea
                        name="answer"
                        model="answer"
                        id="answer"
                        :label="__('Answer')"
                        :placeholder="__('Enter answer')"
                        rows="3"
                        class="form-control"></x-admin.input.textarea>
                </div>

                <div class="col-lg-12">
                    <div class="hstack gap-2 justify-content-end">
                        <x-button
                            type="submit"
                            class="btn btn-primary">{{ __('Save Data') }}</x-button>
                    </div>
                </div>
            </div>
        </x-form>
    </x-admin.card>
</div>
