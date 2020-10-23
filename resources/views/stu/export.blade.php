<a href="{{ route('user.csv',$product ?? '') }}">Export to CSV

<table>
    <thead>
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>School Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $s)
        <tr>
            <td>{{$s->first_name}}</td>
            <td>{{$s->last_name}}</td>
            <td>{{$s->email}}</td>
            <td>{{$s->contact}}</td>
            <td>{{$s->school_name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
