<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration Form</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/navbarcss.css') }}">

</head>



<body>



    <!-- <div id="topbut">
        <button>sign in</button>
        <button>sign up</button>
    </div> -->



    <!-- <div class="navbar" id="navbar" >
        <ul class="navbar" id="navbar"  >
     
            <li><a href="#home">Home</a></li>
            <li><a href="{{url('employee/records/')}}">Records</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#about">About</a></li>
        </ul>
   </div> -->

    <div>
        <img id="img" src="{{ asset('img/garudalogo.png') }}" alt="Garuda logo">
        <a href="{{url('employee/records/')}}"><button id="AllRecords">All Records</button></a>
    </div>



    <!-- Registration Form -->
    <div class="container">
        <h2>Add Employee</h2>
        <!-- <div>
            <p>Already have an account? <a id="fsign" href=" ">sign</a></p>
        </div> -->
        <form action="{{ route('employee.store') }}" method="POST">
            @csrf

            @if(session('message'))
            <div id="sucMsg">{{session('message')}}</div>
            @endif

            <!-- <label for="employee_id">Employee ID</label>
            <input type="text" id="employee_id" name="employee_id" required> -->

            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" minlength="8" required>

            <label for="position">Position</label>
            <input type="text" id="position" name="position" required>

            <label for="project">Project</label>
            <input type="text" id="project" name="project" required>

            <p>By creating an account and logging in,
                I agree to the Terms & Conditions and
                Privacy Policy of Garuda.</p>

            <div class="button">
                <input type="submit" onclick="submitFunction()" value="Add Employee">
            </div>


        </form>
    </div>

</body>

</html>