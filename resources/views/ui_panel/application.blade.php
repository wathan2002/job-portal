@extends('ui_panel.master')
@section('title', 'Application')
@section('content')

    <div class="container my-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h4 class="m-3">Application Form</h4>
                <div class="border border-2 rounded bg-secondary">
                    <h5 class="me-5 mt-3 float-end"><b>Job title: {{ $job->title }}</b></h5>
                    <form action="{{ url('application/store') }}" method="post" class="p-5">
                        @csrf
                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                        <input type="hidden" name="employee_id" value="{{ Auth::user()->id }}">
                        <div class="row mt-3">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" value="{{ Auth::user()->name }}">
                                @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email" value="{{ Auth::user()->email }}">
                                @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Mobile</label>
                            <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" id="phone" placeholder="Mobile">
                            @error('mobile')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <select name="address" id="address" class="form-select" aria-label="Default select example">
                                <option value="Yangon">Yangon</option>
                                <option value="Mandalay">Mandalay</option>
                                <option value="Pyin Oo Lwin">Pyin Oo Lwin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="salary">Salary</label>
                            <input id="salary" type="text" name="salary" placeholder="$" class="form-control @error('salary') is-invalid @enderror" value="{{$job->salary}}">
                            @error('salary')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

@endsection
