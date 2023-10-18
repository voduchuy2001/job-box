<div>
    <div class="row">
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

        <div class="col-lg-6">
            <x-admin.input
                :label="__('Created At')"
                class="form-control"
                type="text"
                id="createdAt"
                name="createdAt"
                model="createdAt"
                readonly
                disabled
            ></x-admin.input>
        </div>
    </div>
</div>
