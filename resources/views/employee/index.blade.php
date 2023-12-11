<div class="card">
    <div class="card-header">
        <h3 class="card-title"><a href="{{ route('employee.create', ['company' => $company->id]) }}"
                class="btn btn-primary">{{ __('messages.Add Employee') }}</a>
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ __('messages.First name') }}</th>
                    <th>{{ __('messages.Last name') }}</th>
                    <th>Email</th>
                    <th>{{ __('messages.Phone') }}</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($employees))
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>
                                <a href="{{ route('employee.destroy', ['employee' => $employee->id]) }}"
                                    class="btn btn-danger"
                                    onclick="return confirm(' {{ __('messages.Are you sure you want to delete?') }}');">{{ __('messages.Delete') }}</a>
                                <a href="{{ route('employee.edit', ['employee' => $employee->id]) }}"
                                    class="btn btn-primary">{{ __('messages.Edit') }}</a>
                                <a href="{{ route('employee.show', ['employee' => $employee->id]) }}"
                                    class="btn btn-success">{{ __('messages.Show') }}</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            <tr>
                <th colspan="7">{{ $employees->links() }}</th>
            </tr>
        </table>
    </div><!-- /.card-body -->
</div>
