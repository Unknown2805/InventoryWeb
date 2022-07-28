@foreach ($in as $d)

<div class="modal fade" id="editIn{{$d ->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action={{url('editIn/' . $d ->id)}} method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Suppliers</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Uraian" name="suppliers" value="{{$d->suppliers}}">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Products</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Products" name="barang" autocomplete="off" value="{{$d->barang}}">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" id="formGroupExampleInput2" min="1" placeholder="Jumlah" name="qty_m" autocomplete="off" value="{{$d->qty_m}}"> 
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="formGroupExampleInput2" min="1" placeholder="Products" name="masuk" autocomplete="off" value="{{$d->masuk}}">
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