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
                    <div class="text-end">
                        <a href="{{ route('grandsons.create') }}" class="btn btn-primary" alt="">Add Grand Sons</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th class="text-center">Gender</th>
                                    <th class="text-center">Birth Date</th>
                                    <th class="text-center">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($grandsons as $grandson)
                                    <tr>
                                        <td>{{ $grandson->id }}</td>
                                        <td>{{ $grandson->name }}</td>
                                        <td class="text-center">{{ $grandson->gender == 1 ? 'Male' : 'Female' }}</td>
                                        <td class="text-center">{{ $grandson->birth_date }}</td>
                                        <td class="text-center">{{ $grandson->user->email ?? '' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Grand Sons Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">
                                        {!! $grandsons->links() !!}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
