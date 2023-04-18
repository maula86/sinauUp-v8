<form action="" method="POST">
    {{-- this me --}}
    {{-- @csrf --}}

    {{-- this tutorial --}}
    {{ csrf_field() }}
    <input type="text" name="text">
    <button type="submit" value="Submit">Submit</button>

</form>

