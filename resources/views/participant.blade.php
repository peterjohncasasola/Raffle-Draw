@extends('layouts.app')

@section('additional-css')
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">



@endsection
@section('content')

<div class="container-fluid" id="member-container">
    <div class="card">
        <h5 class="card-header">Participants List</h5>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover  data-table" id="participant-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th width="250px">Name</th>
                        <th>Membership Date</th>
                        <th>Province</th>
                        <th>Contact No.</th>
                        <th>Address</th>
                        <th width="200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="memberForm" name="memberForm">
            <div class="modal-body">
                <div class="form-group">
                <label for="client_code" class="col-form-label">Client Code:</label>
                <input type="text" class="form-control" name="client_code" id="client_code">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="memberId" id="memberId">
                </div>
                <div class="form-group">
                    <label for="client_name" class="col-form-label">Client Name:</label>
                    <input type="text" class="form-control" name="client_name" id="client_name">
                </div>
                <div class="form-group">
                    <label for="province" class="col-form-label">Province:</label>
                    <input type="text" class="form-control" name="province" id="province">
                </div>
                <div class="form-group">
                    <label for="contact_number" class="col-form-label">Contact Number:</label>
                    <input type="text" class="form-control" name="contact_number" id="contact_number">
                </div>
                <div class="form-group">
                <label for="address" class="col-form-label">Address:</label>
                <textarea class="form-control" id="address" name="address"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="saveupdate" name="#saveupdate">Update</button>
            </div>
        </form>
      </div>
    </div>
</div>


<div class="container-fluid">
    <div class="winner-content">
        <p class="winner-name"></p>
    </div>
</div>
@endsection

@section('additional-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/membersAjax.js') }}"></script>


@endsection
