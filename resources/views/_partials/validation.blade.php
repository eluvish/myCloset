<ul class='errors'>
    @foreach ($errors->all() as $error)
    <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
    @endforeach
</ul>
