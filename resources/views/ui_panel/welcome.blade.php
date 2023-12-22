@extends('ui_panel.master')
@section('title', 'Welcome')
@section('content')

    <div class="container my-3">
        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <form class="d-flex" action="{{ url('search') }}" method="get"> @csrf
                    <input class="form-control me-2" name="search_data" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8">
                @foreach ($jobs as $job)
                <div class="card my-2 border border-info">
                    <h4 class="card-header bg-transparent border-0">
                        {{$job->title}}
                    </h4>
                    <div class="card-body">
                        <div>{{$job->description}}</div>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <div class="float-start text-warning">${{$job->salary}}</div>
                        <a href="{{ route('apply', $job->id) }}" class="btn btn-sm btn-primary float-end">Apply</a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="col-md-4">
                @foreach ($categories as $category)
                    <div>
                        <ul>
                            <li style="list-style-type: none">
                                <a href="{{ url('search_category/'. $category->id) }}" class="text-decoration-none"><b>- {{$category->name}}</b></a>
                            </li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
