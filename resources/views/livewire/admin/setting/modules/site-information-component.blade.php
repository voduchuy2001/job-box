<div>
    <x-admin.card>
        <div class="d-flex align-items-center">
            <div class="profile-user position-relative d-inline-block mx-auto mb-4">
                <img
                    src="{{ asset('assets/images/users/avatar-1.jpg') }}"
                    class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                    alt="user-profile-image">
                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                    <x-admin.input
                        class="profile-img-file-input"
                        id="profile-img-file-input"
                        type="file"
                        accept="image/*"
                        name="avatar"
                        model="avatar"
                    ></x-admin.input>

                    <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                    <span class="avatar-title rounded-circle bg-light text-body">
                        <i class="ri-camera-fill"></i>
                    </span>
                    </label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <x-admin.input
                    name="siteName"
                    model="siteName"
                    id="siteName"
                    :label="__('Site Name')"
                    :placeholder="__('Enter site name')"
                    class="form-control"></x-admin.input>
            </div>

            <div class="col-lg-12">
                <x-admin.input.textarea
                    name="siteDescription"
                    model="siteDescription"
                    id="siteDescription"
                    :label="__('Site Description')"
                    :placeholder="__('Enter site description')"
                    rows="3"
                    class="form-control"></x-admin.input.textarea>
            </div>

            <div class="col-lg-12">
                <x-admin.input.textarea
                    name="siteSlogan"
                    model="siteSlogan"
                    id="siteSlogan"
                    :label="__('Site Slogan')"
                    :placeholder="__('Enter site slogan')"
                    rows="3"
                    class="form-control"></x-admin.input.textarea>
            </div>
        </div>
    </x-admin.card>
</div>
