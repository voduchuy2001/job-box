<div>
    <x-button
        wire:click="addOrRemoveToWishList"
        type="button"
        class="btn btn-icon btn-soft-primary float-end {{ in_array($jobId, $wishlist) ? 'active' : '' }}">
        <i class="ri-bookmark-line fs-16"></i></x-button>
</div>
