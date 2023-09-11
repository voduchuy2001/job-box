@props([
    'model' => null,
    'placeholder' => null,
    'name' => null,
    'id' => null,
    ])

<div class="card">
    <div class="card-body">
        <div class="row g-3">
            <div class="search-box">
                <input
                    type="text"
                    class="form-control search"
                    @if($name)
                        name="{{ $name }}"
                    @endif
                    @if($id)
                        id="{{ $id }}"
                    @endif
                    @if($model)
                        wire:model.live.debounce.1000ms="{{ $model }}"
                    @endif
                    @if($placeholder)
                        placeholder="{{ $placeholder }}"
                    @endif>
                <i class="ri-search-line search-icon"></i>
            </div>
        </div>
    </div>

    <div class="text-center my-2" wire:loading wire:target="{{ $model }}">
        <span class="text-primary"><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i>{{ __('Loading...') }}</span>
    </div>
</div>
