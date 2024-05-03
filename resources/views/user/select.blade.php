<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Select Status</title>
</head>
<body>
    <h1>User Select Result</h1>
    @if(isset($formattedExecutionTimeProcedure))
    <p>Procedure Execution Time: {{ $formattedExecutionTimeProcedure }}</p>
    @endif

    @if(isset($formattedExecutionTimeOrm))
    <p>ORM Execution Time: {{ $formattedExecutionTimeOrm }}</p>
    @endif
</body>
</html>
