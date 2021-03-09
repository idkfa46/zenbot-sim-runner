<x-layout>
    <style>
        table {
            width: 100%;            
        }

        table tr td {
            
        }

        table tr td, input[type=text] {
            background: #ddd;
        }

        input[type=text] {
            border: none;
            width: 80px;
        }

        ul {
            list-style-type: none;
        }
    </style>
    <h2>Confirm sim runs for batch</h2>
    <form method="post" action="/sim-run-batch">
        @csrf
        <h2>Sim run quantities</h2>
        <ul>
            @foreach($strategies as $strategy)
            <li>
                {{ $strategy->name }}: {{ count($strategy->sim_runs) }}
            </li>
            @endforeach
        </ul>
        <h2>Sim run detail</h2>
        @foreach($strategies as $strategy)
        <h3>{{ $strategy->name }}</h3>
        <table>
            <thead>
                <tr>
                    @foreach($strategy->options as $strategy_option)
                    <th>{{ $strategy_option->name }}</th>
                    @endforeach
                    <th>
                </tr>
            </thead>
            <tbody>
                @foreach($strategy->sim_runs as $k => $sim_run)
                <tr>
                    @foreach($strategy->options as $strategy_option)
                    <td>
                        <input 
                            type="text" 
                            name="{{ $k }}-{{ $strategy_option->id }}"
                            value="{{ $sim_run->get_value_for_option($strategy_option) }}" 
                        />                        
                    </td>
                    @endforeach
                    <td>
                        <input 
                            type="checkbox" 
                            id="" 
                            name="" 
                            value=""
                        >            
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endforeach
        <input type="submit" value="Submit">
    </form>    
</x-layout>