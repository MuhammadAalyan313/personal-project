<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Change | Password</title>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
            @if(Session::has('message'))
        <script>
            document.addEventListener('DOMContentLoaded', function (){
                toastr.options = {
                    'timeOut' : "{{ Session::get('timeOut')}}",
                    'closeButton' : true,
                }
                toastr["{{ Session::get('alert-type')}}"]("{{ Session::get('message')}}");
            });
        </script>
    @endif
                <div class="card-header bg-primary text-white text-center">
                    <h4>Enter Generated Token</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('verify.token')}}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="password" class="form-label">Token</label>
                            <input type="text" class="form-control" id="token" value="{{$token}}" name="token" placeholder="Enter Token">
                            @error('password')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                       
                        <button type="submit" class="btn btn-primary w-100">Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 
