<div>
    @include('admin.partials.page-title')

    <x-admin.input.search
        placeholder="{{ __('Search by title, content or something') }}"
        name="searchTerm"
        id="searchTerm"
        model="searchTerm"
    ></x-admin.input.search>

    <x-admin.table
        :labels="[__('Id'), __('Title'), __('Content')]"
    >
        @foreach($posts as $post)
            <tr>
                <td class="fw-medium">{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td class="text-truncate">{{ $post->content }}</td>
                <td>
                    <div class="hstack gap-3 fs-15">
                        <x-link
                            to="{{ route('blog.edit', ['id' => $post->id]) }}"
                            class="link-primary"><i class="ri-settings-4-line"></i></x-link>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-admin.table>

    {{ $posts->links() }}
</div>
