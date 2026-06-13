<h1>Deleted Students</h1>

@forelse($students as $student)

    <p>{{ $student->name }}</p>

    <form action="{{ route('students.restore', $student->id) }}"
          method="POST">
        @csrf
        @method('PUT')
        <button type="submit">
            Restore
        </button>
    </form>

@empty

    <p>No deleted students found.</p>

@endforelse
