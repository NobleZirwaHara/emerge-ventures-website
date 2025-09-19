@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Team Members</h1>
        <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Add Team Member
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($teamMembers as $member)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($member->photo)
                                        <img src="{{ asset('storage/' . $member->photo) }}" 
                                             alt="{{ $member->name }}" 
                                             class="rounded-circle" 
                                             style="width: 40px; height: 40px; object-fit: cover;">
                                    @else
                                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center" 
                                             style="width: 40px; height: 40px;">
                                            <i class="fas fa-user text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->position }}</td>
                                <td>{{ $member->email }}</td>
                                <td>
                                    <span class="badge {{ $member->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $member->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.team-members.show', $member->id) }}" 
                                           class="btn btn-sm btn-outline-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.team-members.edit', $member->id) }}" 
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.team-members.destroy', $member->id) }}" 
                                              method="POST" 
                                              onsubmit="return confirm('Are you sure you want to delete this team member?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No team members found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($teamMembers->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $teamMembers->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
