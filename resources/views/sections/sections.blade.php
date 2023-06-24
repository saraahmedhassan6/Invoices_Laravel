@extends('layouts.master')
@section('title')
    {{__('sections.sections')}}
@stop
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{__('loginpage.settings')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{__('sections.sections')}}</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">


					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session()->has('Add'))

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('Add')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label=""close>
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('edit'))

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('edit')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label=""close>
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        @if(session()->has('delete'))

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('delete')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label=""close>
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="row">

                        <!--div-->
                        <div class="col-xl-12">
                            <div class="card mg-b-20">
                                <div class="card-header pb-0">
                                    <div class="d-flex justify-content-between">
                                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo1">{{__('sections.add_section')}}</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">#</th>
                                                    <th class="border-bottom-0">{{__('sections.section_name')}}</th>
                                                    <th class="border-bottom-0"> {{__('sections.section_description')}}</th>
                                                    <th class="border-bottom-0">{{__('sections.section_transactions')}} </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0; ?>
                                                @foreach($sections as $x)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{ $x->section_name }}</td>
                                                    <td>{{ $x->description }}</td>
                                                    <td>

                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-id="{{ $x->id }}" data-section_name="{{ $x->section_name }}"
                                                            data-description="{{ $x->description }}" data-toggle="modal"
                                                            href="#exampleModal2" title="{{__('sections.section_edit')}}"><i class="las la-pen"></i></a>


                                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                            data-id="{{ $x->id }}" data-section_name="{{ $x->section_name }}"
                                                            data-toggle="modal" href="#modaldemo9" title="{{__('sections.delete')}}"><i
                                                                class="las la-trash"></i></a>
                                                    </td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal" id="modaldemo1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">{{__('sections.add_section')}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>

                        <!--Add-->
                        <div class="modal-body">
                            <form action="{{route('sections.store')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail">{{__('sections.section_name')}}</label>
                                    <input type="text" class="form-control" id="section_name" name="section_name" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail">{{__('sections.section_description')}}</label>
                                    <textarea type="text" class="form-control" id="description" name="description" row=3 ></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit">{{__('sections.section_confirm')}}</button>
                                    <button class="btn btn-secondary" data-dismiss="modal" type="button">{{__('sections.section_close')}}</button>
                                </div>
                            </form>
                       </div>
                    </div>
                </div>
             </div>


                        <!--div-->
                        <!--edit-->
                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{__('sections.section_edit')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="sections/update" method="post" autocomplete="off">
                                    {{ method_field('patch') }}
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="hidden" name="id" id="id" value="">
                                        <label for="recipient-name" class="col-form-label">{{__('sections.section_name')}}</label>
                                        <input class="form-control" name="section_name" id="section_name" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">{{__('sections.section_description')}}</label>
                                        <textarea class="form-control" id="description" name="description"></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">{{__('sections.section_confirm')}}</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('sections.section_close')}}</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>


        <!--delete-->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{__('sections.section_delete')}}</h6><button aria-label="Close" class="close" data-dismiss="modal"
                            type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="sections/destroy" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>{{__('sections.section_deleting_confirmation_msg')}}</p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="section_name" id="section_name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">{{__('sections.section_delete_confirm')}}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('sections.section_delete_cancel')}}</button>
                        </div>
                </div>
                </form>
            </div>


                    </div>
                    <!-- row closed -->
                </div>
                <!-- Container closed -->
            </div>
            <!-- main-content closed -->
    @endsection
    @section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>

        <!--edit-->
    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var section_name = button.data('section_name')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section_name').val(section_name);
            modal.find('.modal-body #description').val(description);
        })

    </script>

    <!--delete-->
    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var section_name = button.data('section_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section_name').val(section_name);
        })

    </script>

    @endsection
