@extends('layouts.app')

@section('content')
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

<div class="jumbotron">

        <div id="myDiv"><!-- Plotly chart will be drawn inside this DIV --></div>
        <div><br><br><br></div>
        <script>
          var data = [
        {
          x: ['Sep18','Oct18', 'Nov18', 'Dec18', 'Jan19', 'Feb19', 'March19'],
          y: [0,6, 2, 9,12,5,4,5,9,15],
          type: 'scatter',
          mode:'lines'
        }
      ];
      
      Plotly.newPlot('myDiv', data, {}, {showSendToCloud: true});
        </script>
              <table class="table table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Result</th>
                  </tr>
                </thead>
                <tbody>
                @for ($i = 0; $i < count($cp); $i++)
                    <tr>
                    <th scope="row">1</th>
                    <td>{{$postsname[$i]->title}}</td>
                    @if ($cp[$i]->status == 0)
                        <td>Not started</td>
                    @endif
                    @if ($cp[$i]->status == 1)
                        <td>Reading!!</td>
                    @endif
                    @if ($cp[$i]->status == 2)
                        <td>Completed!!</td>
                    @endif
                    @if ($cp[$i]->status <= 2)
                        <td>Test Not given</td>
                    @else ($cp[$i]->status == 1)
                        <td>{{$cp[$i]->result}}</td>
                    @endif
                  </tr>
                @endfor          
                </tbody>
              </table>
</div>
@endsection
