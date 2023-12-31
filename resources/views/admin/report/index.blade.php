@extends('admin.layout.app')
@section('content')


    <div class="container">
        <h6 class="my-4 fw-bold ">Report</h6>
        
        <h4 class="fw-bold mb-3">Applicant</h4>
        <table class="table table-danger table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applicants as $applicant)
                <tr>
                    <td>{{$applicant->id}}</td>
                    <td>{{$applicant->name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h4 class="fw-bold mb-3">Worker</h4>
        <table class="table table-primary table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($workers as $worker)
                <tr>
                    <td>{{$worker->id}}</td>
                    <td>{{$worker->name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
