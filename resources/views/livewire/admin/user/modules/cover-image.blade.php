<div>
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img
                src="{{ $user->coverImage === null ? asset('admins/assets/images/profile-bg.jpg') : asset($user->coverImage->url) }}"
                class="profile-wid-img" alt="">
            <div class="overlay-content">
                <div class="text-end p-3">
                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                        <x-admin.input
                            id="profile-foreground-img-file-input"
                            type="file"
                            class="profile-foreground-img-file-input"
                            name="coverImage"
                            model="coverImage"
                            accept="image/*"></x-admin.input>
                        <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                            <i class="ri-image-edit-line align-bottom me-1"></i> {{ __('Change Cover') }}
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
