@if (session('success'))
  <div class="alert alert-success">
    <button class="close" type="button" data-dismiss="alert">×</button>
    {{ session('success') }}
  </div>
@endif