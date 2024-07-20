<div class="dropdown">
    <button class="btn btn-sm btn-primary " type="button" data-bs-toggle="dropdown" aria-expanded="false"><svg
            width="12" height="14" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
            <path
                d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z">
            </path>
        </svg></button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item view-edit-button" data-type="view" href="{{ route('users.show', $data->id) }}">View</a>
        </li>
        <li><a class="dropdown-item view-edit-button" data-type="edit" href="{{ route('users.edit', $data->id) }}">Edit</a>
        </li>
        <li><a class="dropdown-item delete_button" href="{{ route('users.destroy', $data->id) }}">Delete</a>
        </li>
    </ul>
</div>
