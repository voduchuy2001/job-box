<div>
    @include('admin.partials.page-title')

    <x-admin.input.search
        placeholder="{{ __('Search by user name, email or something') }}"
        name="searchTerm"
        id="searchTerm"
        model="searchTerm"
    ></x-admin.input.search>

    <x-admin.table
        :labels="[__('Id'), __('Name'), __('Email'), __('Status'), __('Role')]"
    >
        @foreach($users as $user)
            <tr>
                <td class="fw-medium">{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td><span class="badge badge-soft-secondary">{{ $user->email }}</span></td>
                <td><span class="badge badge-soft-warning">{{ $user->status->value }}</span></td>
                <td>
                    <span
                        class="badge badge-soft-danger">{{ $user->role->value }}</span>
                </td>
                <td>
                    <div class="hstack gap-3 fs-15">
                        <x-link
                            to="{{ route('user-edit.profile', ['id' => $user->id]) }}"
                            class="link-primary"><i class="ri-settings-4-line"></i></x-link>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-admin.table>

    {{ $users->links() }}
</div>
