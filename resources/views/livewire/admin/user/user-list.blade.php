@php use App\Enums\UserRole;use App\Enums\UserStatus; @endphp
<div>
    @include('admin.partials.page-title')

    <x-admin.input.search
        placeholder="{{ __('Search by user name, email or something') }}"
        name="searchTerm"
        id="searchTerm"
        model="searchTerm"
    ></x-admin.input.search>

    <x-admin.alert></x-admin.alert>

    <x-admin.table
        :labels="[__('Id'), __('Name'), __('Email'), __('Status'), __('Role')]"
    >
        @foreach($users as $user)
            <tr>
                <td class="fw-medium">{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td><span class="badge badge-soft-secondary">{{ $user->email }}</span></td>
                <td>
                    <span wire:click="updateUserStatus({{ $user->id }})"
                          class="btn badge badge-soft-{{ $user->status->value === UserStatus::IsActive->value ? 'success' : 'dark' }}">{{ $user->status->value === UserStatus::IsActive->value ? UserStatus::IsActive : UserStatus::Blocked }}</span>
                </td>
                <td>
                    <span
                        class="badge badge-soft-{{ $user->role->value == UserRole::Admin->value ? 'success' : 'warning' }}">{{ $user->role->value == UserRole::Admin->value ? UserRole::Admin : UserRole::User }}</span>
                </td>
                <td>
                    <div class="hstack gap-3 fs-15">
                        <x-link
                            to="{{ route('user.profile', ['id' => $user->id]) }}"
                            class="link-primary"><i class="ri-settings-4-line"></i></x-link>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-admin.table>

    {{ $users->links() }}
</div>
