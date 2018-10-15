@extends('main')

@section('contents')
<div class="card">
    <h3 class="card-header">Combinations Generated</h3>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Date Created</th>
                        <th>Numbers</th>
                    </tr>
                </thead>
                <tbody>
                   @if($generated_list->count() == 0)
                        <tr>
                            <td colspan=2 class="text-center">No numbers found.</td>
                        </tr>
                   @else
                        @foreach($generated_list as $generated)
                        <tr>
                            <td>{{ $generated->created_at }}</td>
                            <td><b>{{ str_replace(',', '-',  $generated->combination) }}</b></td>
                        </tr>
                        @endforeach
                   @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection