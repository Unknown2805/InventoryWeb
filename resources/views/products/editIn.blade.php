@foreach ($in as $d)

<div class="modal fade" id="editIn{{$d ->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action={{url('editIn/' . $d ->id)}} method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Suppliers</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Uraian" name="suppliers">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Products</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Products" name="barang" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">qty</label>
                        <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="qty" name="qty" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Products" name="in" autocomplete="off">
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