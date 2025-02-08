<!-- resources/views/employee/index.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/record.css') }}">

    <title>Employee List</title>
</head>

<body>

    <div class="container">
        
        <table>
        <h1>Employee Records</h1>

        @if(session('status'))
            <div id="sucMsg">{{session('status')}}</div>
            @endif

            <thead>
                <tr>
                    <!-- <th>Employee ID</th> -->
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Project</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employee as $employee)
                <tr>
                    <!-- <td>{{ $employee->employee_id }}</td> -->
                    <td>{{ $employee->full_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>{{ $employee->project }}</td>
                    <td><a href=" {{url('employee/edit/'.$employee->id)}}"><button id="edit">Edit</button></a></td>

                    <td><a href="{{url ('employee/delete_records/'.$employee->id) }}"><button id="delete">Delete</button></a></td>

                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
    <div>
        <a href="{{url ('/') }}"><button id="addEmp">Add Employee</button></a>
    </div>
</body>

</html>