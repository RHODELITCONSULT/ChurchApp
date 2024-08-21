@extends('Backend.AdminLayout.app')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Header List</h4>
                <h6>Manage your Headers</h6>
            </div>

            @php
                $headers = App\Models\Backend\Header::get();
                $count = $headers->count();
                if ( $count == 3) {
                    $disabled = true;
                } else {
                    $disabled = false;
                }
            @endphp
            <div class="page-btn">
                @if (!$disabled)
                <a href="{{route('admin:header:create')}}" class="btn btn-added"><img
                    src="{{asset('assets/Backend/img/icons/plus.svg')}}" alt="img" class="me-1" />Add New Header</a>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                                <img src="{{asset('assets/Backend/img/icons/filter.svg')}}" alt="img" />
                                <span><img src="{{asset('assets/Backend/img/icons/closes.svg')}}" alt="img" /></span>
                            </a>
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="{{asset('assets/Backend/img/icons/search-white.svg')}}" alt="img" /></a>
                        </div>
                    </div>
                    <div class="wordset">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Content</th>
                                <th>IsPrimary</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($headers as $header)
                                <tr>
                                    <td>{{ $header->title }}</td>
                                    <td>
                                        <img src="{{ config('services.app_url.domain') . $header->small_image_url }}"
                                            alt="No Image" width="100px">
                                    </td>
                                    <td style="width: 350px;" class="text-wrap">{{ strlen($header->content) > 100 ? substr($header->content, 0, 100) . '...' : strip_tags($header->content) }}
                                    </td>
                                    <td>
                                        @if ($header->is_primary == 1)
                                            <button class="btn btn-success btn-sm">Primary</button>
                                        @else
                                            <button class="btn btn-danger btn-sm">Not Primary</button>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($header->created_at)->format('d-m-Y') }}</td>
                                    <td>
                                        <a class="me-3" href="{{ route("admin:header:edit",["id"=>$header->id]) }}">
                                            <img src="{{asset('assets/Backend/img/icons/edit.svg')}}" alt="img" />
                                        </a>
                                        <a class="confirm-text" href="{{route("admin:header:delete",["id"=>$header->id])}}">
                                            <img src="{{asset('assets/Backend/img/icons/delete.svg')}}" alt="img" />
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
