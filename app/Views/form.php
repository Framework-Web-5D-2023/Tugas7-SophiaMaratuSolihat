<form action="<?= base_url("/create"); ?>"method="post">
    <div class = "modal-body">
        <div class = "row">
            <div class = "col-12 row mb-3">
                <div class = "col-6">
                    <div class = "form-group">
                        <label for="nama">nama</label>
                        <input type="text" id="nama" name="nama"
                        class="form-control" placeholder="Nama" aria-label ="Nama">
                    </div>
                </div>
                <div class = "col-6">
                    <div class = "form-group">
                    <label for="npm">npm</label>
                    <input type ="text" id="npm" name="npm"
                    class ="form-control" placeholder="Npm" aria-label="Npm">
                </div>
                </div>
                <div class = "col-6">
                    <div class = "form-group">
                    <label for="prodi">prodi</label>
                    <input type ="text" id="prodi" name="prodi"
                    class ="form-control" placeholder="Prodi" aria-label="Prodi">
            </div>
        </div>
    </div>
</div>
<div class ="modal-footer">
    <button type ="button" class="btn btn-secondary"
    data-bs-dismiss="modal">close</button>
    <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>