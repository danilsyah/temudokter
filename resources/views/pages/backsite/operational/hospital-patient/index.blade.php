@extends('layouts.app')

@section('title', 'Hospital Patient')

@section('content')
    {{-- BEGIN:content --}}
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            {{-- error --}}
            @if ($errors->any())
                <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- breadcumb --}}
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Hospital Patient</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('backsite.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Hospital Patient</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- table card --}}
            @can('hospital_patient_table')
                <div class="content-body">
                    <section id="table-home">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Hospital Patient List</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-striped table-bordered text-inputs-searching default-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Type</th>
                                                            <th style="text-align:center; width:150px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($hospital_patient as $key => $hospital_patient_item)
                                                            <tr data-entry-id="{{ $hospital_patient_item->id }}">
                                                                <td>{{ date('d/m/Y H:i:s', strtotime($hospital_patient_item->created_at)) ?? '' }}
                                                                </td>
                                                                <td><span
                                                                        class="badge bg-success mr-1 mb-1">{{ $hospital_patient_item->name ?? '' }}</span>
                                                                </td>
                                                                <td><span
                                                                        class="badge bg-warning mr-1 mb-1">{{ $hospital_patient_item->email ?? '' }}</span>
                                                                </td>
                                                                <td><span
                                                                        class="badge bg-success mr-1 mb-1">{{ $hospital_patient_item->detail_user->type_user->name ?? '' }}</span>
                                                                </td>
                                                                <td class="text-center">
                                                                    @can('hospital_patient_detail')
                                                                        <div class="btn-group mr-1 mb-1">
                                                                            <button type="button"
                                                                                class="btn btn-info btn-sm dropdown-toggle"
                                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                                aria-expanded="false">Action</button>
                                                                            <div class="dropdown-menu">
                                                                                @can('hospital_patient_detail')
                                                                                    <a href="#mymodal"
                                                                                        data-remote="{{ route('backsite.hospital_patient.show', $hospital_patient_item->id) }}"
                                                                                        data-toggle="modal" data-target="#mymodal"
                                                                                        data-title="User Detail" class="dropdown-item">
                                                                                        Show
                                                                                    </a>
                                                                                @endcan
                                                                            </div>
                                                                        </div>
                                                                    @endcan

                                                                </td>
                                                            </tr>
                                                        @empty
                                                            {{-- not found --}}
                                                        @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Type</th>
                                                            <th style="text-align:center; width:150px;">Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            @endcan
            {{-- end table card --}}

        </div>
    </div>
    {{-- END:content --}}
@endsection

@push('after-script')
    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button class="btn close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa spin"></i>
                </div>
            </div>
        </div>
    </div>
@endpush
