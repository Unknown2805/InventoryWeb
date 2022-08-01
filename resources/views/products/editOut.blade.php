@foreach ($sale as $s)

<div class="modal fade" id="addOut{{$s ->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action={{url('addOut/' . $s ->id)}} method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Harga</label>
                    
                        <input type="text" class="form-control keluar" min="{{$s->masuk}}" placeholder="Products" name="keluar" autocomplete="off" value="Rp. @money((float)$s->masuk)" onkeyup="formatbaru(event)">
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



<div class="modal fade" id="editOut{{$s ->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action={{url('editOut/' . $s ->id)}} method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Jumlah Barang</label>
                        <input type="number" class="form-control" min="1"  placeholder="Jumlah" name="qty_k" autocomplete="off" value="{{$s->qty_m}}" max="{{$s->qty_m}}"> 
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