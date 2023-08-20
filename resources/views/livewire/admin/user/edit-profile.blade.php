<div>
    <livewire:admin.user.modules.cover-image :user="$user"></livewire:admin.user.modules.cover-image>

    <div class="row">
        <div class="col-xxl-3">
            <x-admin.card
                class="mt-n5">
                <div class="text-center">
                    <livewire:admin.user.modules.avatar :user="$user"></livewire:admin.user.modules.avatar>
                </div>
            </x-admin.card>
        </div>

        <div class="col-xxl-9">
            <x-admin.card
                :header="__('Personal Details')"
                class="mt-xxl-n5"
            >
                <livewire:admin.user.modules.personal-detail :user="$user"></livewire:admin.user.modules.personal-detail>
            </x-admin.card>

            <x-admin.card
                :header="__('Addresses')"
            >
                <livewire:admin.user.modules.personal-address :user="$user"></livewire:admin.user.modules.personal-address>
            </x-admin.card>
        </div>
    </div>
</div>
