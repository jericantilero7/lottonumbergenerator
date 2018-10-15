@foreach ($errors->all() as $error)
<div class="alert alert-dismissible alert-danger hide-alert">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Error!</strong> {{ $error }}
</div>
@endforeach

@if(Session::has('error'))
<div class="alert alert-dismissible alert-danger hide-alert">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Error!</strong> {!! Session::get('error') !!}
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-dismissible alert-success hide-alert">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Generated Successfully!</strong>
</div>
@endif

<div class="alerts">
    <div class="alert alert-dismissible alert-danger ">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong> <span class="error"></span>
    </div>
</div>