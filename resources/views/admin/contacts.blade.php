@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Thông báo</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.index') }}">
                        <div class="text-tiny">Trang chủ</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Tất cả thông báo</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." name="name" tabindex="2" required>
                        </fieldset>
                        <div class="button-submit">
                            <button type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    @if(Session::has('status'))
                        <p class="alert alert-success">{{ Session::get('status') }}</p>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Di động</th>
                                <th>E-mail</th>
                                <th>Thông báo</th>
                                <th>Ngày </th>
                                <th>Hoạt động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)                 
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->comment }}</td>
                                <td>{{ $contact->created_at }}</td>
                                <td>
                                    <div class="list-icon-function">
                                        <a href="{{ route('admin.contact.show',['id'=>$contact->id]) }}">
                                            <div class="list-icon-function view-icon">
                                                <div class="item eye">
                                                    <i class="icon-eye"></i>
                                                </div>
                                            </div>
                                        </a>
                                        <form action="{{ route('admin.contact.delete', ['id'=>$contact->id]) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <div class="item text-danger delete">
                                                <i class="icon-trash-2"></i>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                {{ $contacts->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
                $(function(){
            $('.delete').on('click',function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                swal({
                    title: "Bạn có chắc không?",
                    text: "xóa một lần, bạn sẽ không thể khôi phục được dữ liệu này",
                    type: "Cảnh báo",
                    buttons:["Không", "có"],
                    confirmButtonColor:'#dc3545'
                }).then(function(result){
                    if(result){
                        form.submit();
                    }
                });
            });
        });
    </script>
    
@endpush
