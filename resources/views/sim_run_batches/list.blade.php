<x-layout>
    <h2>Sim run batches</h2>
    <table id="sim-run-batches" class="table table-sm table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Exchange</th>
                <th>Product</th>
                <th>Asset</th>
                <th>Currency</th>
                <th>Qty sim runs</th>
                <th>Qty strategies</th>
                <th>Best vs. buy hold</th>
                <th>Status</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sim_run_batches as $sim_run_batch)
            <tr>
                <td>{{ $sim_run_batch->id }}</id>
                <td>
                    <a href="/sim-run-batches/{{ $sim_run_batch->id }}">{{ $sim_run_batch->name }}</a>
                </td>
                <td>{{ $sim_run_batch->exchange->name }}</td>
                <td>{{ $sim_run_batch->product->name }}</td>
                <td>{{ $sim_run_batch->product->asset }}</td>
                <td>{{ $sim_run_batch->product->currency }}</td>
                <td>{{ $sim_run_batch->sim_runs->count() }}</td>
                <td>{{ $sim_run_batch->qty_strategies() }}</td>
                <td>{{ $sim_run_batch->best_vs_buy_hold() }}</td>
                <td>{{ $sim_run_batch->status }}</td>
                <td>{{ $sim_run_batch->user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table> 
    <a href="/sim-run-batches/create">Create</a>
    <script>
        $(document).ready(function () {
            $('#sim-run-batches').DataTable();
        });
    </script>
</x-layout>