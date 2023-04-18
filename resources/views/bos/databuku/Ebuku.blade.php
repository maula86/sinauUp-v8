@extends('pustaka.linkadmin')
@section('titlenav','EDIT DATA BUKU')
@section('databuku','active')

@section('konten')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      <div class="card" style="background: #27293db8;">
        <div class="card-body">
          
          <form method="POST" enctype="multipart/form-data" action='{{url("saveedit/$dte->id")}}'>
            @method('POST')
            @csrf
              <div class="row">
                <div class="col-md-12 pr-md-3">
                  <div class="form-group">
                    <label for="kdbuku" class="text-light">Kode Buku</label>
                    <input type="text" class="form-control" id="kdbuku" name="kode_b" value="{{$dte->kode_b}} ">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 pr-md-1">
                  <div class="form-group">
                      <label for="jdlbuku" class="text-light">Judul</label>
                      <input type="text" class="form-control" id="jdlbuku" name="judul" value="{{$dte->judul}}">
                  </div>
                </div>
                <div class="col-md-4 px-md-1">
                  <div class="form-group">
                    <label for="bitbuku" class="text-light">Penerbit</label>
                    <input type="text" class="form-control" id="bitbuku" name="penerbit" value="{{$dte->penerbit}}">
                  </div>
                </div>
                <div class="col-md-3 pl-md-1">
                  <div class="form-group">
                      <label for="ngarangbuku" class="text-light">Pengarang</label>
                      <input type="text" class="form-control" id="ngarangbuku" name="pengarang" value="{{$dte->pengarang}}">
                  </div>
                </div>
              </div>
            <div class="row">
                <div class="col-md-2 pr-md-2"></div>
                <div class="col-md-4 pr-md-1">
                  <div class="form-group">
                    <label for="rakbuku" class="col-12 text-light text-center">Rak</label>
                    <input type="text" class="form-control" id="rakbuku" name="rak" value="{{$dte->rak}}">
                  </div>
                </div>
                <div class="col-md-4 pl-md-2">
                  <div class="form-group">
                      <label for="stsbuku" class="mb-1 col-12 text-light text-center">STS Buku</label>
                      <div class="row">
                        <div class="form-check-inline ml-3 col-3 col-md-3">
                          <input class="form-check-input" type="radio" id="inlineCheckbox1" name="sts_buku" value="ADA" @if($dte->sts_buku == 'ADA') checked @endif>
                          <label class="form-check-label" for="inlineCheckbox1">ADA</label>
                        </div>
                        <div class="form-check-inline col-3 col-md-3"> 
                          <input class="form-check-input" type="radio" id="inlineCheckbox5" name="sts_buku" value="PINJAM" @if($dte->sts_buku == 'PINJAM') checked @endif>
                          <label class="form-check-label" for="inlineCheckbox2">PINJAM</label>
                        </div>
                        <div class="form-check-inline col-3 col-md-2">
                          <input class="form-check-input" type="radio" id="inlineCheckbox2" name="sts_buku" value="HILANG" @if($dte->sts_buku == 'HILANG') checked @endif>
                          <label class="form-check-label" for="inlineCheckbox3">HILANG</label><br>
                        </div>
                        <div class="form-check-inline ml-3 col-2 col-md-3"> 
                          <input class="form-check-input" type="radio" id="inlineCheckbox3" name="sts_buku" value="RUSAK" @if($dte->sts_buku == 'RUSAK') checked @endif>
                          <label class="form-check-label" for="inlineCheckbox4">RUSAK</label>
                        </div>
                        <div class="form-check-inline col-1">  
                          <input class="form-check-input" type="radio" id="inlineCheckbox4" name="sts_buku" value="MUSNAH" @if($dte->sts_buku == 'MUSNAH') checked @endif>
                          <label class="form-check-label" for="inlineCheckbox5">DIMUSNAHKAN</label>
                        </div>
                      </div>
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


    <div class="col-md-3 mt-5">
      <div class="card card-user">
        <div class="card-body" style="background: #232637;">
          <p class="card-text">
            <div class="author">
              <div class="block block-one"></div>
              <div class="block block-two"></div>
              <div class="block block-three"></div>
              <div class="block block-four mb-2"></div>

                {{-- <input class="text-light" type='file' accept='image/*' id="inputcul" name="imgbuku" onchange='openFile(event)'><br> --}}
                <input class="text-light" type='file' id="inputcul"  name="imgbuku"  value="{{$dte->imgbuku}} " onchange='displayimg(this)'><br>
                <img src="{{ asset('/covers/'.$dte->imgbuku) }} " class="mt-5" id='muncul' onclick="triggerClick()" alt="Cover Book">
              {{-- <a href="javascript:void(0)"> --}}
                  {{-- <img class="avatar" src="{{asset('img.placeholder.png')}}" alt="Cover Book">  --}}
                {{-- <h5 class="title">Mike Andrew</h5>
              </a> --}}
            </div>
          </p>
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