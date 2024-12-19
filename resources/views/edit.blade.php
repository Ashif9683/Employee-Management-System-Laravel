<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration Form</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">
    
</head>



<body>
    
   
    <img id="img" src="{{ asset('img/garudalogo.png') }}" alt="Garuda logo">
    <div  id="topbut" >
        <button>sign in</button>
        <button>sign up</button>
    </div>
  
    
    <!-- Registration Form -->
    <div class="container">
        <h3>Update Data</h3>
        <form action="{{ url('employee/update/'.$employee->employee_id) }}" method="POST">
        
        @csrf
            @method('PUT')
            <!-- <label for="employee_id">Employee ID</label>
            <input type="text" id="employee_id" value="{{ $employee->employee_id}}" name="employee_id" required> -->

            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" value="{{ $employee->full_name}}" name="full_name" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" value="{{ $employee->email}}" name="email" required>
            
            <!-- <label for="password">Password</label>
            <input type="password" id="password" value="{{ $employee->password}}" name="password" minlength="8" required>
             -->
            <label for="position">Position</label>
            <input type="text" id="position" value="{{ $employee->position}}" name="position" required>
            
            <label for="project">Project</label>
            <input type="text" id="project" value="{{ $employee->project}}" name="project" required>
            
            <div class="button">
                <input type="submit" value="Update">
            </div>


        </form>
    </div>
</body>
</html>
