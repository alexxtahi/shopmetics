@foreach ($records as $record)
    <tr>
        <td scope="row">{{ $records->search($record) + 1 }}</td>
        <td>{{ $record->nom }}</td>
        <td>{{ $record->prenom }}</td>
        <td>{{ $record->contact }}</td>
        <td>{{ $record->email }}</td>
        <td>{{ $record->ville }}</td>
        <td>{{ $record->commune }}</td>
    </tr>
@endforeach
