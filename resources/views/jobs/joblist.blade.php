@extends('layouts.masterlayout')

@section('content')

    <?php $stuff = 1; ?>

    <p>{{$stuff}}</p>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Referenz</th>
            <th>Laufbahn</th>
            <th>Funktion</th>
        </tr>
        </thead>


        <tbody>
        @foreach( $alljobs as $jobitem)
            <tr>
                <th scope="row">{{ $jobitem->job_reference }}</th>
                <td>{{ $jobitem->career }}</td>
                <td>{{ $jobitem->remit }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--Displays page selection at the bottom of the table--}}
    <?php echo $alljobs->render(); ?>
@endsection