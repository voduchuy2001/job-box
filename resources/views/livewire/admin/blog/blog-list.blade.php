<div>
    @include('admin.partials.page-title')

    <div class="mb-3">
        <x-link
            to="{{ route('blog.create') }}"
            class="btn btn-primary">
            <i class="ri-add-line align-bottom me-1"></i>{{ __('Create Blog') }}</x-link>
    </div>

    <x-admin.input.search
        placeholder="{{ __('Search by title, content or something') }}"
        name="searchTerm"
        id="searchTerm"
        model="searchTerm"
    ></x-admin.input.search>

    <x-admin.table
        :labels="[__('Id'), __('Image'), __('Title')]"
    >
        @foreach($posts as $post)
            <tr>
                <td class="fw-medium">{{ $d = $post->id }}</td>
                <td>
                    <img class="rounded-circle avatar-sm" src="{{ asset($post->image->url) }}" alt="{{ $post->title }}">
                </td>
                <td>{{ $post->title }}</td>
                <td>
                    <div class="hstack gap-3 fs-15">
                        <x-link
                            to="{{ route('blog.edit', ['id' => $post->id]) }}"
                            class="link-primary"><i class="ri-settings-4-line"></i></x-link>

                        @if($check == $post->id)
                            <span
                                wire:click="delete({{ $post->id }})"
                                style="cursor: pointer" class="link-danger"><i class="ri-check-line"></i></span>
                            <span
                                wire:click="change({{ $post->id }})"
                                style="cursor: pointer" class="link-warning"><i class="ri-close-line"></i></span>
                        @else
                            <span
                                wire:click="change({{ $post->id }})"
                                style="cursor: pointer" class="link-danger"><i class="ri-delete-bin-line"></i></span>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </x-admin.table>

    {{ $posts->links() }}
</div>
