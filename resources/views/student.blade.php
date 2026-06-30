<!DOCTYPE html>
<html>
<head>
    <title>Students List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .btn-add {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
        .btn-edit {
            display: inline-block;
            background-color: #ffc107;
            color: black;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
            margin-left: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .form-container {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            background-color: #f9f9f9;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .btn-submit {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-cancel {
            display: inline-block;
            margin-left: 10px;
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    {{-- رسائل النجاح --}}
    @if(session('success'))
        <div class="success">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- زر إضافة طالب جديد --}}
    <a href="{{ route('students.create') }}" class="btn-add">➕ إضافة طالب جديد</a>

    {{-- نموذج إضافة/تعديل طالب --}}
    @if(isset($student))
        <div class="form-container">
            <h2>✏️ Edit Student</h2>
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" value="{{ old('name', $student->name ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" value="{{ old('email', $student->email ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label>Phone:</label>
                    <input type="text" name="phone" value="{{ old('phone', $student->phone ?? '') }}">
                </div>
                <button type="submit" class="btn-submit">✏️ Update Student</button>
                <a href="{{ route('students.index') }}" class="btn-cancel">❌ Cancel</a>
            </form>
        </div>
    @endif

    @if(!isset($student))
        <div class="form-container">
            <h2>➕ Add New Student</h2>
            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label>Phone:</label>
                    <input type="text" name="phone" value="{{ old('phone') }}">
                </div>
                <button type="submit" class="btn-submit">💾 Save Student</button>
            </form>
        </div>
    @endif

    <h1>📋 Students List</h1>

    @if($students->isEmpty())
        <h3>No Students Found</h3>
    @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone ?? '—' }}</td>
                        <td>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this student?')">
                                    🗑️ Delete
                                </button>
                            </form>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn-edit">
                                ✏️ Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h1>🗑️ Deleted Students</h1>

    @if(isset($deletedStudents) && $deletedStudents->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Deleted At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deletedStudents as $deletedStudent)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $deletedStudent->name }}</td>
                        <td>{{ $deletedStudent->email }}</td>
                        <td>{{ $deletedStudent->deleted_at->diffForHumans() }}</td>
                        <td>
                            <form action="{{ route('students.restore', $deletedStudent->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn-submit" style="background-color: #28a745;">
                                    🔄 Restore
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No deleted students found.</p>
    @endif
</div>
</body>
</html>
