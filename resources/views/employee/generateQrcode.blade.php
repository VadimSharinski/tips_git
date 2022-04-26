@extends("layouts.employee.app")
@section("wrapper")
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container mt-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Simple QR Code</h2>
                    </div>
                    <div class="card-body">
                        {{ QrCode::size(200)->generate('www.tips.com/' . auth()->user()->id)}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection



