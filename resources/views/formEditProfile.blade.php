@foreach ($owner as $o)

<div class="modal fade" id="editOwner{{$o ->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action={{url('/dashboard/edit-owner/' . $o ->id)}} method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                      <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nama Profile</label>
                        <input type="text" class="form-control" value="{{$o->name}}" id="formGroupExampleInput" placeholder="Change name Profile" name="name">
                      </div>
                      
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Foto Profile</label>
                            <div class="col-md-8 mb-3">
                                <img src="{{ Auth::user()->gambar == null ? asset('assets/images/faces/1.jpg') : asset('/storage/profile/' .$o->gambar) }}" class="card-img" alt="..." style="height:180px;"/>
                            </div>
                        <input type="file" class="form-control" id="formGroupExampleInput2" name="gambar">
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

@endforeach

@foreach ($manager as $m)

<div class="modal fade" id="editManager{{$m ->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action={{url('/dashboard/edit-manager/' . $m ->id)}} method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                      <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nama Profile</label>
                        <input type="text" class="form-control" value="{{$m->name}}" id="formGroupExampleInput" placeholder="Change name Profile" name="name">
                      </div>
                      
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Foto Profile</label>
                            <div class="col-md-8 mb-3">
                                <img src="{{ Auth::user()->gambar == null ? asset('assets/images/faces/1.jpg') : asset('/storage/profile/' .$m->gambar) }}" class="card-img" alt="..." style="height:180px;"/>
                            </div>
                        <input type="file" class="form-control" id="formGroupExampleInput2" name="gambar">
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


@endforeach