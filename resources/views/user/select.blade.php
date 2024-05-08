<!DOCTYPE html>
<html>
<head>
    <title>Execution Time</title>
</head>
<body>
    <h1>Procedure Execution Time: {{ $formattedExecutionTimeProcedure ?? 'N/A' }}</h1>
    <h1>ORM Execution Time: {{ $formattedExecutionTimeOrm ?? 'N/A' }}</h1>

    @if(isset($result))
        <h2>Procedure Result:</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Character Name</th>
                    <th>Level</th>
                    <th>Avatar Ordered</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($result as $row)
                    <tr>
                        <td>{{ $row->username }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->character_name }}</td>
                        <td>{{ $row->level }}</td>
                        <td>{{ $row->avatar_ordered }}</td>
                        <td>{{ $row->order_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if(isset($user))
        <h2>ORM Result:</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Character Name</th>
                    <th>Level</th>
                    <th>Avatar Ordered</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->gameCharacters as $character)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $character->character_name }}</td>
                        <td>{{ $character->level }}</td>
                        <td>{{ $user->avatarOrder->avatar_ordered ?? 'N/A' }}</td>
                        <td>{{ $user->avatarOrder->order_date ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
