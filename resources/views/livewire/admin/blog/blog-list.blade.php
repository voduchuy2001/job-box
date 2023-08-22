<div>
    @include('admin.partials.page-title')

    <x-admin.input.search
        placeholder="{{ __('Search by title, content or something') }}"
        name="searchTerm"
        id="searchTerm"
        model="searchTerm"
    ></x-admin.input.search>
</div>
