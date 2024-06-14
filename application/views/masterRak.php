<?php $this->load->view('menu'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script>
    $(document).ready(function() {
        function updateButtonVisibility() {
            $('.btnRemoveRow').hide();
            if ($('.detailRow').length > 1) {
                $('.btnRemoveRow').show();
            }
        }
        $('#detailContainer').on('click', '.btnAddRow', function() {
            var $clone = $(this).closest('.detailRow').clone();
            $clone.find('input').val('');
            $clone.find('textarea').val('');
            $clone.find('select').val('');
            $('#detailContainer').append($clone);
            updateButtonVisibility();
        });
        $('#detailContainer').on('click', '.btnRemoveRow', function() {
            if ($('.detailRow').length > 1) {
                $(this).closest('.detailRow').remove();
                updateButtonVisibility();
            }
        });
        updateButtonVisibility();
    });
    </script>

</head>

<body>
    <div class="container mt-5">
        <div id="st_data" class="alert alert-info" style="display: none;"></div>
        <!-- Table -->
        <div class="pd-20 card-box mb-30 mx-auto" style="max-width: 800px;">
            <div class="d-flex justify-content-between mb-3">
                <h4>Daftar Nama Rak</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputModal">
                    Tambah
                </button>
            </div>
            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">Nama Rak</th>
                    </tr>
                </thead>
                <tbody id="tableBodyLantai">
                    <!-- Data akan diisi oleh JavaScript -->
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="inputModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inputModalLabel">Tambah Nama Rak</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="inputForm">
                            <div id="detailContainer">
                                <!-- Initial row template -->
                                <div class="row detailRow">
                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="namaRak">Nama Rak</label>
                                            <input placeholder="Masukkan Nama Rak" type="text" class="form-control"
                                                name="txtModalNamaRak[]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xs-2">
                                        <button type="button" class="btn btn-primary btn-xs btnAddRow"
                                            style="margin-top: 25px;">
                                            <i class="micon bi bi-plus-lg"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-xs btnRemoveRow"
                                            style="margin-top: 25px; display: none;">
                                            <i class="glyphicon glyphicon-minus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>