@foreach ($records as $record)
    <tr>
        <td scope="row">{{ $records->search($record) + 1 }}</td>
        <td>{{ $record->code_cmd }}</td>
        <td>{{ $record->date_cmd }}</td>
        <td>{{ $record->statut_cmd }}</td>
        <td>{{ $record->id_client }}</td>
        <td>{{ $record->id_myen_paiement }}</td>
    </tr>
@endforeach
