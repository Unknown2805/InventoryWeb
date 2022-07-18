@extends('master')

@section('main')

    {{-- editpp --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{ url('dashboard/tambah') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nama Masjid</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Masjid" name="nama">
                          </div>
                          <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Foto Profile</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" placeholder="Foto Profil" name="gambar">
                          </div>
                          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="page-heading" style="cursor:pointer">
    

        @hasrole('owner')
            
                <a data-bs-toggle="modal" data-bs-target="#editOwner{{ Auth::user()->id }}">
                                
                    <div class="text-start">
                        <div class="avatar avatar-lg">  
                            <img src="{{ Auth::user()->gambar == null ? asset('assets/images/faces/1.jpg') : asset('/storage/profile/'.Auth::user()->gambar) }}">
                        </div>
                        <span class="font-bold ms-1" style="font-size: 24px">
                            {{ Auth::user()->name }}
                       </span>  
                    </div>
                                        
                </a>
          
        @endhasrole

        @hasrole('manager')

                <a data-bs-toggle="modal" data-bs-target="#editManager{{ Auth::user()->id }}">
                                
                    <div class="text-start">
                        <div class="avatar avatar-lg">  
                            <img src="{{ Auth::user()->gambar == null ? asset('assets/images/faces/1.jpg') : asset('/storage/profile/'. Auth::user()->gambar) }}">
                        </div>
                        <span class="font-bold ms-1" style="font-size: 24px">
                            {{ Auth::user()->name }}
                    </span>  
                    </div>
                                        
                </a>

        @endhasrole



        
    </div>



   @include('formEditProfile')

@endsection

