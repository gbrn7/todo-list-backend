<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Assignee</th>
            <th>Due_date</th>
            <th>Time_tracked</th>
            <th>Status</th>
            <th>Priority</th>
        </tr>
    </thead>
    <tbody>
        @foreach($report as $data)
        <tr>
            <td>{{ $data->title }}</td>
            <td>{{ $data->assignee }}</td>
            <td>{{ $data->due_date }}</td>
            <td>{{ $data->time_tracked }}</td>
            <td>{{ $data->status }}</td>
            <td>{{ $data->priority }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th>Total Number Todos</th>
            <th>Total Time Tracked</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $totalTodos }}</td>
            <td>{{ $totalTimeTracked }}</td>
        </tr>
    </tbody>
</table>