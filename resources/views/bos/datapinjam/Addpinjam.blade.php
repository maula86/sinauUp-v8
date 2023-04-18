@extends('pustaka.linkadmin')
@section('titlenav','TAMBAH DATA PEMINJAM')
@section('datapinjam','active')

@section('konten')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card" style="background: #27293db8;">
        <div class="card-body">
          
          <form method="POST" action="{{ url('simpanpinjam') }}">
            @method('POST')
            @csrf
              <div class="row">
                <div class="col-md-4 pr-md-3">
                  <div class="form-group">
                    <label for="tglpjm" class="text-light">Tgl Pinjam </label>
                  <input type="date" class="form-control" id="tglpjm" name="tglpjm" value="{{ old('tglpjm') }}">   
                  <span class="bg-danger text-light">
                      @if ($errors->has('tglpjm'))
                          {{ $errors->first('tglpjm')}}
                      @endif 
                  </span>

                  </div>
                </div>
              

                <div class="col-md-8 pr-md-3">
                  <div class="form-group">
                    <label for="agtid" class="text-light">Nama Anggota</label>
                    <select class="form-control" name="agt_id" id="agtid">
                      <option value="0">Pilih Anggota Yang Meminjam</option>
                      @foreach ($list_agt as $la)
                      {{-- old dibawah ini hasil dari 'withInput' --}}
                         <option value="{{$la->id}}" @if (old('agt_id') == $la->id) selected @endif >
                          {{$la->kd_agt."  (  ".$la->nm_agt."  )"}}
                        </option>
                      @endforeach
                    </select>
                    <span class="bg-danger text-light">
                      {{--this is message error "$errors->first('agt_id')" --}}
                      @if ($errors->has('agt_id'))
                          {{ $errors->first('agt_id')}}
                      @endif 
                  </span>
                  </div>
                </div> 
              </div>                 

            <div class="row">
              <div class="col-md-4 pr-md-1">
                <div class="form-group">
                    <label for="b1" class="text-light">Buku 1</label>
                    <select class="form-control" name="buku_id1" id="b1">
                      <option value="0">Pilih Buku 1 Yang injam</option>
                      @foreach ($list_buk as $lb)
                         <option value="{{$lb->id}}" @if (old('buku_id1') == $lb->id) selected @endif>
                          {{$lb->judul." - ".$lb->kode_b}}
                         </option>
                      @endforeach
                    </select>
                    <span class="bg-danger text-light">
                      @if ($errors->has('buku_id1'))
                          {{ $errors->first('buku_id1')}}
                      @endif 
                  </span>
                </div>
              </div>
              <div class="col-md-4 px-md-1">
                <div class="form-group">
                  <label for="b2" class="text-light">Buku 2</label>
                   <select class="form-control" name="buku_id2" id="b2">
                      <option value="0">Pilih Buku 2 Yang injam</option>
                      @foreach ($list_buk as $lb)
                         <option value="{{$lb->id}}">
                          {{$lb->judul." - ".$lb->kode_b}}
                         </option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="col-md-4 pl-md-1">
                <div class="form-group">
                    <label for="b3" class="text-light">Buku 3</label>
                     <select class="form-control" name="buku_id3" id="b3">
                      <option value="0">Pilih Buku 3 Yang injam</option>
                      @foreach ($list_buk as $lb)
                        <option value="{{$lb->id}}">
                          {{$lb->judul." - ".$lb->kode_b}}
                        </option>
                      @endforeach
                    </select>
                </div>
              </div>
            </div>
        </div>
        
        <div class="card-footer row">
          <div class="col-3 mx-1"></div>
              <button type="submit" class="btn btn-icon btn-primary col-3">Save</button>&nbsp;
              <button type="reset" class="btn btn-icon btn-danger col-3">Batal</button>
        </div>
      </div>
    </div>
  </form>
  </div>
</div>

@endsection

@section('addjs')
<script>
  function triggerClick(){
    document.querySelector('#inputcul').click()
  }
  // var openFile = function(event) {
  //   var input = event.target;

  function displayimg(numpuk){
    if(numpuk.files[0]){
      var reader = new FileReader();
      reader.onload = function(numpuk){
        document.querySelector('#muncul').setAttribute('src',numpuk.target.result);
        // var dataURL = reader.result;
        // var output = document.getElementById('output');
        // output.src = dataURL;
    };
    reader.readAsDataURL(numpuk.files[0]);
    };
  };
</script>
@endsection


@section('addjs')
    <script>
    @if(Session::has('gagal'))
        // alert('data sukses');
            Swal.fire({
                    position: 'top-middle',
                    icon: 'danger',
                    title: 'gagal',
                    showConfirmButton: false,
                    timer: 2000
                });
        @endif
    </script>
@endsection

