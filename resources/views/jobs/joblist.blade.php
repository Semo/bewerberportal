@extends('layouts.masterlayout')

@section('content')


    <table class="table table-hover">
        <thead>
        <tr>
            <th>Referenz</th>
            <th>Laufbahn</th>
            <th>Funktion</th>
            <th>Ansehen</th>
        </tr>
        </thead>


        <tbody>
        @foreach( $alljobs as $jobitem)
            <tr>
                <th scope="row">{{ $jobitem->job_reference }}</th>
                <td>{{ $jobitem->career }}</td>
                <td>{{ $jobitem->remit }}</td>
                <td><a href="job/{{ $jobitem->id }}">Ansehen</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--Displays page selection at the bottom of the table--}}
    <?php echo $alljobs->render(); ?>
@endsection