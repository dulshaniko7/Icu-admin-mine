<table>
    <thead>
    <tr>
        <th>first name</th>
        <th>last name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $s)
        <tr>
        <td>{{$s->first_name}}</td>
        <td>{{$s->last_name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
