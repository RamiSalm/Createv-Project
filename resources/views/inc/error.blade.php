@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert alert-dismissible alert-danger" style='text-align: center;'>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>!Error:</strong> {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-dismissible alert-success" style='text-align: center;'>
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>!</strong>{{session('success')}}
    </div>
@endif
   
@if(session('error'))
    <div class="alert alert-dismissible alert-warning" style='text-align: center;'>
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>We face some error try again</strong>{{session('error')}}
    </div>
@endif
    