<div>
    @include('admin.partials.page-title')

    <x-admin.input.search
        placeholder="{{ __('Search by name, or something') }}"
        name="searchTerm"
        id="searchTerm"
        model="searchTerm"
    ></x-admin.input.search>

    <div class="row g-4 mb-3">
        <div class="col-sm-auto">
            <div>
                <x-button
                    wire:click="changeType"
                    type="button"
                    data-bs-target="#category-setting"
                    data-bs-toggle="modal"
                    class="btn btn-primary"><i class="ri-add-line align-bottom me-1"></i>{{ __('Add Category') }}</x-button>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($categories as $category)
            <div class="col-xxl-3 col-sm-6">
                <div class="card card-height-100">
                    <div class="card-body">
                        <div class="d-flex flex-column h-100">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-4">{{ __('Updated :updatedAt', ['updatedAt' => $category->updated_at->diffForHumans()]) }}</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <span
                                        style="cursor: pointer"
                                        data-bs-toggle="modal"
                                          data-bs-target="#category-setting"
                                          wire:click="editCategory({{ $category->id }})"
                                          class="badge badge-soft-warning">{{ __('Edit') }}</span>
                                    <span
                                        style="cursor: pointer"
                                        wire:click="deleteCategory({{ $category->id }})"
                                        class="badge badge-soft-danger">{{ __('Delete') }}</span>
                                </div>
                            </div>

                            <div class="d-flex mb-2">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1 fs-15"><span class="text-primary">{{ $category->name }}</span></h5>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="d-flex mb-2">
                                    <div class="flex-shrink-0">
                                        <div><i class="ri-list-check align-bottom me-1 text-muted"></i> {{ __(':count Jobs', ['count' => $category->jobs()->count()]) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-transparent border-top-dashed py-2">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="avatar-group">
                                    <x-link :to="route('job.index')" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="{{ __('Add Job') }}">
                                        <div class="avatar-xxs">
                                            <div class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">
                                                +
                                            </div>
                                        </div>
                                    </x-link>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="text-muted">
                                    <i class="ri-calendar-event-fill me-1 align-bottom"></i> {{ __('Created At: :createdAt', ['createdAt' => BaseHelper::dateFormat($category->created_at)]) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(! count($categories))
        <x-admin.card>
            <div class="mt-3">
                <x-admin.empty></x-admin.empty>
            </div>
        </x-admin.card>
    @endif

    {{ $categories->links() }}

    <x-admin.modal
        id="category-setting"
        type="modal-md modal-dialog-centered">
        <x-admin.modal.header>{{ $isEdit === true ? __('Edit Category') : __('New Category') }}</x-admin.modal.header>
        <x-admin.modal.body>
            <x-form wire:submit.prevent="{{ $isEdit === true ? 'updateCategory' : 'saveCategory' }}">
                <div class="row">
                    <div class="col-lg-12">
                        <x-admin.input
                            :label="__('Category Name')"
                            class="form-control"
                            type="text"
                            id="name"
                            name="name"
                            model="name"
                            placeholder="{{ __('Enter name') }}"
                        ></x-admin.input>
                    </div>

                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <x-button
                                type="submit"
                                class="btn btn-primary">{{ __('Save Data') }}</x-button>
                        </div>
                    </div>
                </div>
            </x-form>
        </x-admin.modal.body>
    </x-admin.modal>
</div>