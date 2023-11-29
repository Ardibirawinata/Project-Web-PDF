<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog" role="document">
        {{-- Add onsubmit and action to prevent reload --}}
        <form onSubmit="JavaScript:submitHandler()" action="javascript:void(0)" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" class="form-control">
                    <div class="form-group">
                        <label for="name">Nama</label> <!-- Change 'Name' to 'Nama' -->
                        <input type="text" name="name" id="name" class="form-control" required autofocus>
                        <span class="text-danger" id="error-name"></span>
                    </div>
                    <div class="form-group">
                        <label for="bank">Bank</label> <!-- Add 'Bank' field -->
                        <input type="text" name="bank" id="bank" class="form-control">
                        <!-- You can change the input type to 'text' or 'number' based on your needs -->
                    </div>
                    <div class="form-group">
                        <label for="nomorrekening">Nomor Rekening</label> <!-- Add 'Nomor Rekening' field -->
                        <input type="text" name="nomorrekening" id="nomorrekening" class="form-control">
                        <!-- You can change the input type to 'text' or 'number' based on your needs -->
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-flat btn-primary" id="saveBtn"><i
                            class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i
                            class="fa fa-arrow-circle-left"></i> Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
