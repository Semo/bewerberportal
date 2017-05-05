@extends('layouts.masterlayout')

@section('content')

    <h1>Bewerberlist - Bewerberportal</h1>
    <table class="table table-striped">
        <!-- Table Headings -->
        <thead>
        <th>Anrede</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Geburtsdatum</th>
        <th>Stadt</th>
        {{--<th>Email</th>--}}
        {{--<th>Username</th>--}}
        </thead>

        <tbody>

        <tr>
            <td class="table-text">
                <div>{{ $applicant->salutation}}</div>
            </td>
            <td class="table-text">
                <div>{{ $applicant->firstname }}</div>
            </td>
            <td class="table-text">
                <div>{{ $applicant->lastname }}</div>
            </td>
            <td class="table-text">
                <div>{{ $applicant->birthdate}}</div>
            </td>
            <td class="table-text">
                <div>{{ $applicant->city}}</div>
            </td>
            {{--<td class="table-text">--}}
            {{--<div>{{ $applicant->email }}</div>--}}
            {{--</td>--}}
            {{--<td class="table-text">--}}
            {{--<div>{{ $applicant->username }}</div>--}}
            {{--</td>--}}
        </tr>

        </tbody>
    </table>

@endsection