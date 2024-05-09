<!DOCTYPE html>
<html>
<head>
    <title>Execution Time</title>
</head>
<body>
    <h1>프로시저 실행 시간: {{ $formattedExecutionTimeProcedure ?? 'N/A' }}</h1>
    <h1>ORM 실행 시간: {{ $formattedExecutionTimeOrm ?? 'N/A' }}</h1>

    @if(isset($result))
        <h2>프로시저 결과:</h2>
        <table>
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

    @if(isset($users))
        <h2>ORM 결과:</h2>
        <table>
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
            @foreach ($users as $user)
    @foreach($user->gameCharacters as $character)
        <tr>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $character->character_name }}</td>
            <td>{{ $character->level }}</td>
            <td>
                @if ($user->avatarOrder)
                    {{ $user->avatarOrder->avatar_ordered }}
                @else
                    N/A
                @endif
            </td>
            <td>
                @if ($user->avatarOrder)
                    {{ $user->avatarOrder->order_date }}
                @else
                    N/A
                @endif
            </td>
        </tr>
    @endforeach
@endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
