<h1>Add Employee</h1>

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('employees.store') }}" method="POST">
    @csrf
    <label>NIF: <input type="text" name="NIF" required></label><br>
    <label>Phone (Tno): <input type="text" name="tno" required></label><br>
    <label>Number of Children: <input type="number" name="num_hijos" min="0" required></label><br>
    <label>
        Department:
        <select name="departament_id" required>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->nombre }}</option>
            @endforeach
        </select>
    </label><br><br>
    <button type="submit">Add Employee</button>
</form>
