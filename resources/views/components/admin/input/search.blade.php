@props([
    'model' => null,
    'placeholder' => null,
    'name' => null,
    'id' => null,
    ])

<div class="card">
    <div class="card-body border border-dashed border-end-0 border-start-0">
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
                        wire:model.live="{{ $model }}"
                    @endif
                    @if($placeholder)
                        placeholder="{{ $placeholder }}"
                    @endif>
                <i class="ri-search-line search-icon"></i>
            </div>
        </div>
    </div>
</div>
