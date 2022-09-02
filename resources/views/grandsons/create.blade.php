@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Grand Sons</h4>
                    <div class="ml-auto"> 
                        <a href="{{ route('grandparents.index') }}" alt="" >Grand Parents</a> - 
                        <a href="{{ route('sons.index') }}" alt="" >Sons</a> - 
                        <a href="{{ route('grandsons.index') }}" alt="" >Grand Sons</a> - 
                        <a href="{{ route('users.index') }}" alt="" >Users</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('grandsons.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label" >Name</label>
                                    <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Mohamed" required autofocus />
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="birth_date" class="form-label" >Birth Date</label>
                                    <input type="date" name="birth_date" id="birth_date" value="{{old('birth_date')}}" class="form-control @error('birth_date') is-invalid @enderror"  required />
                                    @error('birth_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="gender_male" class="form-label" >Gender</label>
                                    <div class="form-check-group d-flex justify-content-start @error('gender') is-invalid @enderror">
                                        <div class="form-check me-5">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_male" value="true" {{ old('gender') !== null ? (old('gender') == true ? 'checked' : '') : 'checked' }} >
                                            <label class="form-check-label" for="gender_male">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_female" value="false" {{ old('gender') !== null ? (old('gender') == false ? 'checked' : '') : ''}} >
                                            <label class="form-check-label" for="gender_female">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                    @error('gender')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary">Add Grand Son</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
