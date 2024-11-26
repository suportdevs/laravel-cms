<div class="table-responsive text-nowrap" >
    <table class="table table-hover" id="check">
        <thead>
        <tr class="bg-secondary" id="r_checkAll">
            <th><input class="form-check-input" type="checkbox" value="" id="check_all"></th>
            <th>ID</th>
            <th>IMAGE</th>
            <th>NAME</th>
            <th>CATEGORIES</th>
            {{-- <th>TAGS</th> --}}
            <th>CREATED AT</th>
            <th>CREATED BY</th>
            <th>STATUS</th>
            <th>ACTIONS</th>
        </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @forelse ($dataset as $data)
            @php
                $categories_str = '';
                foreach ($data->categories as $category) {
                    $categories_str .= "<a href='" . route('admin.blog.categories.edit', $category->_key) . "' target='_blank'>" . htmlspecialchars($category->name) . "</a>, ";
                }
                $categories_str = rtrim($categories_str, ', ');
                // $tags_str = '';
                // foreach ($data->tags as $tag) {
                //     $tags_str .= "<a href='" . route('admin.blog.tags.edit', $tag->_key) . "' target='_blank'>" . htmlspecialchars($tag->name) . "</a>, ";
                // }
                // $tags_str = rtrim($tags_str, ', ');
            @endphp
            <tr>
                <td><input class="form-check-input" type="checkbox" name="data[]" value="{{$data->_key}}"></td>
                <td>{{serialNo($loop->iteration, $dataset->perPage())}}</td>
                <td><img src="{{$data->getFirstMediaUrl('image')}}" alt="{{$data->name}}" style="width: 50px;"></td>
                <td><a href="{{route('admin.products.edit', $data->_key)}}">{{$data->name}}</a></td>
                <td>{!!$categories_str!!}</td>
                {{-- <td>{!!$tags_str!!}</td> --}}
                <td>{{date('d-m-Y', strtotime($data->created_at))}}</td>
                <td>{{$data->author->name ?? ''}}</td>
                <td class="text-center">
                    <span class="badge {{$data->status == 'Published' ? 'bg-success' : ($data->status == 'Draft' ? 'bg-secondary' : 'bg-warning')}}">
                        {{$data->status}}
                    </span>
                </td>

                <td>
                    <a class=" btn btn-icon btn-sm btn-primary" href="{{route('admin.products.edit', $data->_key)}}"><i class="bx bx-edit-alt me-1"></i></a>
                    <a class=" btn btn-icon btn-sm btn-danger" href="javascript:void(0);" onclick="singleDelete('{{ route('admin.products.destroy', $data->_key) }}')"><i class="bx bx-trash me-1"></i></a>
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
