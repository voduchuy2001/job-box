<div>
    <div class="row">
        <div class="col-lg-6">
            <x-admin.input
                :label="__('Full Name')"
                class="form-control"
                type="name"
                id="name"
                name="name"
                model="name"
                readonly
                disabled
            ></x-admin.input>
        </div>

        <div class="col-lg-6">
            <x-admin.input
                :label="__('Email')"
                class="form-control"
                type="email"
                id="email"
                name="email"
                model="email"
                readonly
                disabled
            ></x-admin.input>
        </div>
    </div>
</div>
