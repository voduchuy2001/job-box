<div>
    <div class="d-flex align-items-center">
        <div class="profile-user position-relative d-inline-block mx-auto mb-4">
            <img
                src="{{ asset($settings['logo']) ?? asset('assets/images/users/avatar-1.jpg') }}"
                class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                alt="user-profile-image">
            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                <x-admin.input
                    class="profile-img-file-input"
                    id="img-file-input"
                    type="file"
                    accept="image/*"
                    name="logo"
                    model="logo"
                ></x-admin.input>

                <label for="img-file-input" class="profile-photo-edit avatar-xs">
                    <span class="avatar-title rounded-circle bg-light text-body">
                        <i class="ri-camera-fill"></i>
                    </span>
                </label>
            </div>
        </div>
    </div>
</div>
