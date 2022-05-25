@foreach ($records as $record)
    <tr>
        <td scope="row">{{ $records->search($record) + 1 }}</td>
        <td>{{ $record->code_prod }}</td>
        <td>{{ $record->designation }}</td>
        <td>{{ $record->lib_cat }}</td>
        <td class="no-wrap-line text-center">
            {{ number_format($record->prix_prod, 0, ',', ' ') }}</td>
        {{-- Afficher une alerte si la quantité d'un record est basse --}}
        @if ($record->qte_prod <= 5)
            <td class="warning-td text-center">
                <i class="fa fa-exclamation-triangle"></i> {{ $record->qte_prod }}
            </td>
        @else
            <td class="text-center">{{ $record->qte_prod }}</td>
        @endif
    </tr>
@endforeach
