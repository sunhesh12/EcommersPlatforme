@extends('app.layouts.admin')

@section('content')
<h1 class="text-3xl font-semibold mb-4">User Management</h1>
<p class="text-gray-600">This is your admin User Management panel.</p>

<a href="{{ route('admin.users.create') }}" class="add-button">Add New User</a>

<table class="admin-user-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->is_admin == 1 ? 'Admin' : 'user'}}</td>
            <td>
                @if ($user->is_blocked)
                <span class="status-blocked">Blocked</span>
                @else
                <span class="status-active">Active</span>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.users.edit', $user->id) }}" class="action-link edit">Edit</a>

                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-link delete" onclick="return confirm('Delete this user?')">Delete</button>
                </form>

                @if ($user->is_blocked)
                <form action="{{ route('admin.users.unblock', $user->id) }}" method="POST" class="inline-block" style="display:inline;" onsubmit="return confirm('Are you sure you want to unblock this user?');">
                    @csrf
                    <button type="submit" class="action-link unblock">Unblock</button>
                </form>
                @else
                <form action="{{ route('admin.users.block', $user->id) }}" method="POST" class="inline-block" style="display:inline;" onsubmit="return confirm('Are you sure you want to block this user?');">
                    @csrf
                    <button type="submit" class="action-link block">Block</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection