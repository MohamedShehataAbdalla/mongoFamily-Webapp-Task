@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Sons</h4>
                    <div class="ml-auto"> 
                        <a href="{{ route('grandparents.index') }}" alt="" >Grand Parents</a> - 
                        <a href="{{ route('sons.index') }}" alt="" >Sons</a> - 
                        <a href="{{ route('grandsons.index') }}" alt="" >Grand Sons</a> - 
                        <a href="{{ route('users.index') }}" alt="" >Users</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="text-end">
                        <a href="{{ route('sons.create') }}" class="btn btn-primary" alt="">Add Son</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <div class="thead">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th class="text-center">Gender</th>
                                    <th class="text-center">Birth Date</th>
                                    <th class="text-center">Grandsons_Count</th>
                                    <th class="text-center">Email</th>
                                </tr>
                            </div>
                            <div class="tbody">
                                @forelse ($sons as $son)
                                    <tr>
                                        <td>{{ $son->id }}</td>
                                        <td>{{ $son->name }}</td>
                                        <td class="text-center">{{ $son->gender == 1 ? 'Male' : 'Female' }}</td>
                                        <td class="text-center">{{ $son->birth_date }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('grandsons.index', ['son_id' => $son->id ]) }}" alt="">{{ $son->grandsons()->count() ?? 0 }} Grand Sons</a>
                                        </td>
                                        <td class="text-center">{{ $son->user->email ?? '' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No Sons Found</td>
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
