@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ __('Add Organization/Office') }}
                    <a href="/admin/org-management"><i class="fa fa-times text-white" style="float:right; font-size:20px;" aria-hidden="true"></i></a>
                </div>

                <div class="card-body">


                    <div class="container mb-4">
                        <div class="col-md-12">
                            <form method="post" action="{{ url('org') }}">
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                @csrf
                                <div class="form-group row">
                                    <div class="mb-2"> 
                                        <label for="name">Organization/Office Name *</label>
                                        <input type="text" class="form-control mt-1 @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Organization/Office Name" value="{{ old('name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2" name="set">Add Organization/Office</button>
                                <a href="/admin/org-management" class="btn btn-light mt-2" data-mdb-ripple-color="dark">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#signature_no').on('change', function () {
            if($(this).val() == 2) {
                $('#signature2').removeClass('d-none');
            }
            else {
                $('#signature2').addClass('d-none');
            }
        });
    });

    let tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);
    let input = document.getElementById("end");
    input.min = tomorrow.toISOString().substring(0, 10);
    
</script>
@endsection