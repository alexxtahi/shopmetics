@foreach ($records as $record)
    <tr>
        <td scope="row">{{ $records->search($record) + 1 }}</td>
        <td>{{ $record->lib_moyen_paiement }}</td>
    </tr>
@endforeach
