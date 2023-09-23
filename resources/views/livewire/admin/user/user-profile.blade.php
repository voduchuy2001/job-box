<div>
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img
                src="{{ asset('assets/images/profile-bg.jpg') }}"
                class="profile-wid-img" alt="{{ $user->name }}">
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-3">
            <x-admin.card
                class="mt-n5">
                <div class="text-center">
                    <livewire:admin.user.modules.avatar :user="$user" lazy></livewire:admin.user.modules.avatar>
                </div>
            </x-admin.card>
        </div>

        <div class="col-xxl-9">
            <x-admin.card
                :header="__('Personal Detail')"
                class="mt-xxl-n5"
            >
                <livewire:admin.user.modules.personal-detail :user="$user" lazy></livewire:admin.user.modules.personal-detail>
            </x-admin.card>

            <x-admin.card>
                @can('role-user-edit')
                    <livewire:admin.user.modules.personal-role :user="$user" lazy></livewire:admin.user.modules.personal-role>
                @endcan
            </x-admin.card>

            <x-admin.card>
                @can('permission-user-edit')
                    <livewire:admin.user.modules.personal-permission :user="$user" lazy></livewire:admin.user.modules.personal-permission>
                @endcan
            </x-admin.card>
        </div>
    </div>
</div>
