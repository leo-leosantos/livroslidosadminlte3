@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
@endif



{{--  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif  --}}

@if($message = Session::get('success'))
<input type="hidden" id="modalnv" data-toggle="modal" data-target="#flipFlop">
<div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="modalLabel">INFORMAÇÃO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="alert alert-success text-center container">{{ $message }}</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
            </div>
        </div>
    </div>
</div>
    <script>
        window.onload = function() {
            document.getElementById("modalnv").click();
        }
    </script>
@endif


@if($message = Session::get('error'))
<input type="hidden" id="modalnv" data-toggle="modal" data-target="#flipFlop">
<div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="modalLabel">INFORMAÇÃO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="alert alert-success text-center container">{{ $message }}</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
            </div>
        </div>
    </div>
</div>
    <script>
        window.onload = function() {
            document.getElementById("modalnv").click();
        }
    </script>
@endif

