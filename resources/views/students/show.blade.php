<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Student Details</h1>
        <div class="bg-white p-4 rounded shadow">
            <p><strong>Name:</strong> {{ $student->name }}</p>
            <p><strong>Email:</strong> {{ $student->email }}</p>
            <p><strong>Course:</strong> {{ $student->course }}</p>
            <a href="{{ route('students.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Back</a>
        </div>
    </div>
</body>

</html>