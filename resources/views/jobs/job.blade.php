@extends('layouts.masterlayout')

@section('content')


    <table class="table table-hover">
        <thead>
        <tr>
            <th>Referenz</th>
            <th>Laufbahn</th>
            <th>Funktion</th>
        </tr>
        </thead>

        <tbody>
            <tr>
                <th scope="row">{{ $job->job_reference }}</th>
                <td>{{ $job->career }}</td>
                <td>{{ $job->remit }}</td>
            </tr>
        </tbody>
    </table>

    {{--Displays page selection at the bottom of the table--}}
@endsection