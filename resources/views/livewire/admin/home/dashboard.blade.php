<div>
    @include('admin.partials.page-title')

    <div class="row">
        <div class="col-lg-6">
            <livewire:admin.home.modules.job-chart wire:key="jobChart"></livewire:admin.home.modules.job-chart>
        </div>

        <div class="col-lg-6">
            <livewire:admin.home.modules.user-chart wire:key="userChart"></livewire:admin.home.modules.user-chart>
        </div>

        <div class="col-lg-8">
            <livewire:admin.home.modules.company-chart wire:key="companyChart"></livewire:admin.home.modules.company-chart>
        </div>

        <div class="col-lg-4">
            <livewire:admin.home.modules.trending-word-chart wire:key="trendingWordChart"></livewire:admin.home.modules.trending-word-chart>
        </div>

        <div class="col-lg-12">
            <livewire:admin.home.modules.student-job-application-chart wire:key="studentJobApplicationChart"></livewire:admin.home.modules.student-job-application-chart>
        </div>

        <div class="col-lg-6">
            <livewire:admin.home.modules.application-chart wire:key="applicationChart"></livewire:admin.home.modules.application-chart>
        </div>
    </div>
</div>
