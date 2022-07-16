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
        @if (!isset($data[0]->nama))
                            
                            {{-- @hasrole('admin') --}}
                            <a data-bs-toggle="modal" data-bs-target="#exampleModal">
        

                                    <div class="text-start" >
                                        <div class="avatar avatar-lg">  
                                            <img src="assets/images/faces/masjidsamping.jpg"/> 
                                        </div>  
                                        <span class="font-bold ms-1" style="font-size: 24px" >
                                            Nama Masjid
                                        </span>
                            
                                    </div>
                            </a>
                            {{-- @endhasrole --}}
                          

            @else
                   
                   
                            @foreach ($data as $d)
                                    <a data-bs-toggle="modal" data-bs-target="#editProfile{{ $d->id }}">
                                
                                        <div class="text-start">
                                            <div class="avatar avatar-lg">  
                                                <img src="{{ asset('/storage/profile/'.$d->gambar) }}">
                                            </div>
                                            <span class="font-bold ms-1" style="font-size: 24px">
                                                {{ $d->nama }}
                                            </span>  
                                        </div>
                                        
                                    </a>

                            @endforeach

            @endif
    </div>



   @include('formEditProfile')

@endsection

