<div class="table-responsive text-nowrap" >
    <table class="table table-hover" id="check">
        <thead>
        <tr class="bg-secondary">
            <th><input class="form-check-input" type="checkbox" value="" id="check_all"></th>
            <th>ID</th>
            <th>NAME</th>
            <th>DESCRIPTION</th>
            <th>IMAGE</th>
            <th>CREATED AT</th>
            <th>CREATED BY</th>
            <th>STATUS</th>
            <th>ACTIONS</th>
        </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @forelse ($dataset as $data)
            <tr>
                <td><input class="form-check-input" type="checkbox" name="data[]" value="{{$data->_key}}"></td>
                <td>{{serialNo($loop->iteration, $dataset->perPage())}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->description}}</td>
                <td><img src="{{$data->getFirstMediaUrl('image')}}" alt="{{$data->name}}" style="width: 50px;"></td>
                <td>{{date('d-m-Y', strtotime($data->created_at))}}</td>
                <td>{{$data->createdBy->name ?? ''}}</td>
                <td class="text-center">
                    <span class="badge {{$data->status == 'Published' ? 'bg-success' : ($data->status == 'Draft' ? 'bg-secondary' : 'bg-warning')}}">
                        {{$data->status}}
                    </span>
                </td>

                <td>
                    <a class=" btn btn-icon btn-sm btn-primary" href="{{route('admin.blog.tags.edit', $data->_key)}}"><i class="bx bx-edit-alt me-1"></i></a>
                    <a class=" btn btn-icon btn-sm btn-danger" href="javascript:void(0);" onclick="singleDelete('{{ route('admin.blog.tags.destroy', $data->_key) }}')"><i class="bx bx-trash me-1"></i></a>
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="9">No records found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="text-center" id="ajaxPaginate">
        {{$dataset->links()}}
    </div>
</div>
