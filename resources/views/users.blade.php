{{--@php--}}
    {{--$user=\Illuminate\Support\Facades\Auth::user();--}}
    {{--if(($user->user_type)!='Admin')--}}
        {{--echo "kdsnvksdnvksdvnsdv";--}}
{{--@endphp--}}
<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')  }}"></script>

</head>
<body style="font-family: serif">
@include('admin-header')
<div class="container">
    <h3 style="text-align: center;color: #0a8e63;border-bottom: 1px solid #ccdad6;padding-bottom: 10px;font-weight: bold;text-transform: uppercase;font-size: 17px;">College Forum Association Members List</h3>
    <br>
    <form action="{{ route('filterUser') }}" method="get">
        <table>
            <tr>
                <td>
                    <select name="user_type" class="form-control" style="width: 190px;margin-right: 10px">
                        <option value="all">All</option>
                        <option value="approved">Approved Member</option>
                        <option value="nonapproved">Non-Approved Member</option>
                        <option value="Admin">Admin</option>
                        <option value="Student">Student</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Alumni">Alumni</option>
                        <option value="User">User</option>
                    </select>
                </td>
                <td>
                    <button style="width: 100px;background-color: #197557;color: #fff;" class="btn" type="submit" name="filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </td>
            </tr>
        </table>
    </form>
    <br>
    {{--<a class="btn btn-primary" href="{{ route('addSupplier') }}">Add New Supplier</a><br/><br/>--}}
    <table class="table table-hover table-striped table-bordered">
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Email</th>
            <th>User Type</th>
            <th>Approval Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
            <th>Action</th>
            <th>Action</th>
        </tr>
        @php $i=0; @endphp*
        @foreach($user as $res)
            @php $i++; @endphp
            <tr>
                <td>{{ $res->id }}</td>
                <td>{{ $res->name }}</td>
                <td>{{ $res->email }}</td>
                <td>{{ $res->user_type }}</td>
                @if($res->is_approved==0)
                    <td>Not Approved</td>
                @endif
                @if($res->is_approved==1)
                    <td>Approved</td>
                @endif
                <td>{{ $res->created_at }}</td>
                <td>{{ $res->updated_at }}</td>
                <td><a href="{{ route('approveUser',$res->id) }}" class="btn" style="background-color: #197557;color: #fff;"><span class="glyphicon glyphicon-ok-sign"></span> Approve</a></td>
                <td><a href="{{ route('rejectUser',$res->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Reject</a></td>
                <td><a href="{{ route('editUser',$res->id) }}" class="btn" style="background-color: #197557;color: #fff;"> <span class="glyphicon glyphicon-pencil"></span> Change</a></td>
            </tr>
        @endforeach
    </table>
</div>
<br/>
</body>
</html>