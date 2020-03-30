@extends('layouts.app')

@section('additional-css')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="container">

    <div class="card">
        <a href=""></a>
        <h4 class="card-header">Choose Raffle Prize</h4>

        <div class="card-body">
            <table class="table table-bordered data-table" id="raffle-prize-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Raffle Prizes</th>
                        <th width="250px">Description</th>
                        <th>Winners</th>
                        <th>Claimed</th>
                        <th>Remaining</th>
                        <th width="250px">Action</th>
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
          <h5 class="modal-title" id="modalTitle">Roulette Duration Settings</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="raffleSetting" name="raffleSetting">
            <div class="modal-body">
                <div class="form-group">
                <label for="roulette_one" class="col-form-label">First:</label>
                <input type="number" class="form-control" name="roulette_one" id="roulette_one">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="prize_id" id="prize_id">
                </div>
                <div class="form-group">
                    <label for="roulette_two" class="col-form-label">Second:</label>
                    <input type="number" class="form-control" name="roulette_two" id="roulette_two">
                </div>
                <div class="form-group">
                    <label for="roulette_three" class="col-form-label">Third:</label>
                    <input type="number" class="form-control" name="roulette_three" id="roulette_three">
                </div>
                <div class="form-group">
                    <label for="roulette_four" class="col-form-label">Fourth:</label>
                    <input type="number" class="form-control" name="roulette_four" id="roulette_four">
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
@endsection

@section('additional-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/rafflePromo.js') }}"></script>
@endsection
