<table class="table table-striped table-hover">
    <thead>
    <tr class="filter">
        <form action="{{route('users.index')}}" method="GET">
            <th></th>
            <th><input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')}}"></th>
            <th><input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}"></th>
            <th><input type="text" name="address" class="form-control" placeholder="Address" value="{{old('address')}}"></th>
            <th><input type="date" name="birthday" class="form-control" placeholder="Birthday" value="{{old('birthday')}}"></th>
            <th><input type="submit" class="btn btn-info" value="Search"></th>
        </form>
    </tr>
    <tr>
        <th>
        <span class="custom-checkbox">
            <input type="checkbox" id="selectAll">
            <label for="selectAll"></label>
        </span>
        </th>
        <th>Name</th>
        <th>Avatar</th>
        <th>Email</th>
        <th>Address</th>
        <th>Birthday</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>
            <span class="custom-checkbox">
                <input type="checkbox" id="checkbox5" name="options[]" value="1">
                <label for="checkbox5"></label>
            </span>
            </td>
            <td>{{$user->name}}</td>
            <td class="avatar"><img src="{{asset('uploads/avatar/'.$user->avatar)}}" alt=""></td>
            <td>{{$user->email}}</td>
            <td>{{$user->address}}</td>
            <td>{{(new Carbon\Carbon($user->birthday))->format('d/m/Y')}}</td>
            <td>
                <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-success">Edit</a>
                <form action="{{route('users.destroy', $user->id)}}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm">Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="clearfix">
    {{$users->links()}}
</div>