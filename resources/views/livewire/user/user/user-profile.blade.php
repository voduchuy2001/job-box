<div>
    <div class="page-content">
        <div class="container-fluid mt-5">
            <div class="row mt-n5">
                <div class="col-lg-3">
                    <x-user.user.sidebar-profile-layout></x-user.user.sidebar-profile-layout>
                </div>

                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="text-center">
                                    <livewire:admin.user.modules.avatar :user="$user" lazy></livewire:admin.user.modules.avatar>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
