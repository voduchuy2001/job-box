<div>
    <x-button
        wire:click="addOrRemoveToWishList"
        type="button"
        class="btn btn-icon btn-soft-{{ in_array($jobId, $wishlist) ? 'danger' : 'primary' }} float-end {{ in_array($jobId, $wishlist) ? 'active' : '' }}">
        <i class="{{ in_array($jobId, $wishlist) ? 'mdi mdi-cards-heart' : 'ri-bookmark-line' }} fs-16"></i></x-button>
</div>
