@foreach ($sale as $d)

<div class="modal fade" id="editOut{{$d ->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action={{url('editOut/' . $d ->id)}} method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="formGroupExampleInput2" min="1" placeholder="qty" name="qty_k" autocomplete="off" value="{{$d->qty_k}}"> 
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Harga Jual</label>
                        <input type="number" class="form-control" id="formGroupExampleInput2" min="1" placeholder="Products" name="keluar" autocomplete="off" value="{{$d->keluar}}">
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