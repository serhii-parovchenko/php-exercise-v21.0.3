<div class="table-responsive mt-3">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">{{ __('Date') }}</th>
                <th scope="col">{{ __('Open') }}</th>
                <th scope="col">{{ __('High') }}</th>
                <th scope="col">{{ __('Low') }}</th>
                <th scope="col">{{ __('Close') }}</th>
                <th scope="col">{{ __('Volume') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prices as $price)
                <tr>
                    <td>{{ date('Y-m-d', $price['date']) }}</td>
                    <td>{{ $price['open'] }}</td>
                    <td>{{ $price['high'] }}</td>
                    <td>{{ $price['low'] }}</td>
                    <td>{{ $price['close'] }}</td>
                    <td>{{ $price['volume'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
