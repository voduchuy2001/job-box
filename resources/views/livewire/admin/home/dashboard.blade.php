<div>
    @include('admin.partials.page-title')

    <div class="row">
        <div class="col-lg-6">
            <livewire:admin.home.modules.job-chart></livewire:admin.home.modules.job-chart>
        </div>

        <div class="col-lg-6">
            <livewire:admin.home.modules.user-chart></livewire:admin.home.modules.user-chart>
        </div>

        <div class="col-lg-8">
            <livewire:admin.home.modules.company-chart></livewire:admin.home.modules.company-chart>
        </div>

        <div class="col-lg-4">
            <livewire:admin.home.modules.trending-word-chart></livewire:admin.home.modules.trending-word-chart>
        </div>
    </div>
</div>
