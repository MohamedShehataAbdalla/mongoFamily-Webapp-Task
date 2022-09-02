@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Users</h4>
                    <div class="ml-auto"> 
                        <a href="{{ route('grandparents.index') }}" alt="" >Grand Parents</a> - 
                        <a href="{{ route('sons.index') }}" alt="" >Sons</a> - 
                        <a href="{{ route('grandsons.index') }}" alt="" >Grand Sons</a> - 
                        <a href="{{ route('users.index') }}" alt="" >Users</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <div class="thead">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th class="text-center">Email</th>
                                </tr>
                            </div>
                            <div class="tbody">
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td class="text-center">{{ $user->email }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No Users Found</td>
                                    </tr>
                                @endforelse
                            </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
