@foreach ($data as $d)

<div class="modal fade" id="editProfile{{$d ->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action={{url('/dashboard/edit/' . $d ->id)}} method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                      <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nama Masjid</label>
                        <input type="text" class="form-control" value="{{$d->nama}}" id="formGroupExampleInput" placeholder="Nama nama" name="nama">
                      </div>
                      
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Foto Profile</label>
                            <div class="col-md-8 mb-3">
                                <img src="{{ asset('/storage/profile/' .$d->gambar) }}" class="card-img" alt="..." style="height:180px;"/>
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