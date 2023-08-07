@extends('dashboard')
@section('title')
    User Information
@endsection
@section('main')
    <!-- User list-->
        <div class="dashboard-box">
            <div class="dashboard-top">
                <div class="dashboard-title">Users</div>
            </div>
            <div class="dashboard-bottom">
                <div class="dashboard-list">
                    <h3 class="dashboard-bottom-title">Infomations</h3>
                    <table class="list-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <!-- <th scope="col">Address</th> -->
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <!-- <td>acb Le Loi, Hue</td> -->
                                <td class="dashboard-ul">
                                    <a class="btn btn-danger" href="{{route('admin.user.delete', ['id' => $user->id])}}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
