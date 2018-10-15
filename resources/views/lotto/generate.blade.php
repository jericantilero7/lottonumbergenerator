@extends('main')

@section('contents')
@include('parts.msgs')
<div class="jumbotron">
    <h1 class="display-3 text-center text-white">Generate Lotto Numbers</h1>
    <p class="lead text-justify text-white">
    Id cetero feugait sit, ex etiam labitur atomorum pro. Ex ius novum tamquam albucius. Nulla debet ullamcorper nec ea, no vis tale simul honestatis. Mel odio tota mediocritatem in, usu pertinacia forensibus moderatius at. At aliquam utroque est, et cum ponderum euripidis.
    His solum euismod urbanitas no, vim ei tale regione torquatos. Eos everti deserunt erroribus no. Ei quas dolor vel. Et his summo principes, option maiorum definiebas duo ut.
    </p>
</div>

<div class="col-lg-12 form">
    <form action="{{ route('save_combinations') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-4">
                <div class="lotto-number text-center mb-5">
                    <h1 class="first generated">1</h1>
                </div>
                <input type="number" name="combi[]" class="form-control" data-reference="first">
            </div>
            <div class="col-md-4">
                <div class="lotto-number text-center mb-5">
                    <h1 class="second generated">1</h1>
                </div>
                <input type="number" name="combi[]" class="form-control" data-reference="second">
            </div>
            <div class="col-md-4">
                <div class="lotto-number text-center mb-5">
                    <h1 class="third generated">1</h1>
                </div>
                <input type="number" name="combi[]" class="form-control" data-reference="third">
            </div>

            <div class="col-lg-12 text-center mt-5">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block btn-add">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-lg-12 text-center mt-5">
        <div class="form-group">
            <button type="button" class="btn btn-primary btn-lg generator">Generate</button>
        </div>
    </div>
</div>
@endsection


@section('js')
    @if(Session::has('success') || Session::has('error') || count($errors->all()) > 0)
        <script> $('.generator').attr('disabled', 'disabled') </script>
    @endif
    <script src="{{ asset('js/functions.js') }}"></script>
 
    <script>
        $('.generator').click(function(){
            var numbers = get_unique_numbers();

            $.each($('input[name="combi[]"]'), function(index){
                $(this).val(numbers[index]);
                $($('.generated')[index]).text(numbers[index]);
            })

            $('.form').show();
        });

        $('input[name="combi[]"]').on('keyup', function(){
            $('.' + $(this).attr('data-reference')).text($(this).val());
            no_duplicate_number();
        })

        $('window').setTimeout(function() {
            $(".hide-alert").fadeTo(500, 0).slideUp(500, function(){
                $('.generator').removeAttr('disabled')
                $(this).hide(); 
            });
        }, 5000);
    </script>
@endsection


