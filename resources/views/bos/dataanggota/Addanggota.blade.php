@extends('pustaka.linkadmin')
@section('titlenav','TAMBAH DATA ANGGOTA')
@section('dataanggota','active')

@section('konten')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      <div class="card" style="background: #27293db8;">
        <div class="card-body">
          
          <form method="POST" enctype="multipart/form-data" action="{{url('saveanggota')}} ">
            @method('POST')
            @csrf

            <div class="row">
              <div class="col-md-12 pr-md-3">
                <div class="form-group">
                  <label for="kdagt" class="text-light">ID Anggota</label>
                  <input type="text" class="form-control" id="kdagt" name="kd_agt" value="">
                </div>
              </div>
            </div>

              <div class="row">
                <div class="col-md-12 pr-md-3">
                  <div class="form-group">
                    <label for="anggo" class="text-light">Nama Anggota</label>
                    <input type="text" class="form-control" id="anggo" name="nm_agt" value="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 pr-md-3">
                  <div class="form-group">
                    <label for="alamat_ang" class="text-light">Alamat</label>
                    <input type="text" class="form-control" id="alamat_ang" name="alamat_agt" value="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 pr-md-3">
                  <div class="form-group">
                    <label for="hp_ang" class="text-light">HP. Anggota</label>
                    <input type="text" class="form-control" id="hp_ang" name="hp" value="">
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
                <input class="text-light" type='file' id="inputcul" name="img_agt" onchange='displayimg(this)'><br>
                <img src="{{asset('images/coy.png')}} " class="mt-5" id='muncul' onclick="triggerClick()" alt="Profile">
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