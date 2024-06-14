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

    $(document).ready(function() {
        // Load data when the page is ready
        loadData();

        function loadData() {
            $.ajax({
                url: '<?php echo base_url("lantai/getAllLantai"); ?>',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var tableBody = $('#tableBodyLantai');
                    tableBody.empty(); // Clear the table body
                    data.forEach(function(item) {
                        tableBody.append(generateTableRow(item));
                    });
                },
                error: function(xhr, status, error) {
                    alert("Failed to load data: " + error);
                }
            });
        }

        function generateTableRow(item) {
            return `<tr data-id="${item.id}">
            <td>${item.lantai}</td>
            <td>${item.divisi}</td>
            <td>${item.rak}</td>
            <td>${item.tingkat}</td>
            <td>${item.judul}</td>
            <td>${item.remark}</td>
            <td>${item.company}</td>
            <td>${item.tahun}</td>
            <td>${item.no_penyimpanan}</td>
            <td>
                <button class="btn btn-warning edit-btn">Edit</button>
                <button class="btn btn-danger delete-btn">Delete</button>
            </td>
        </tr>`;
        }

        function resetForm() {
            $("#detailContainer").find("input[type='text'], textarea").val("");
        }

        $("#saveDetailLantai").click(function() {
            var formData = new FormData();

            function appendFormData(fieldName, selector) {
                var values = $(selector).map(function() {
                    return $(this).val() || '-';
                }).get();

                // Check if any value is empty
                if (values.some(val => val === '' || val === '-')) {
                    return false;
                }

                formData.append(fieldName, values.join('*'));
                return true;
            }

            // Validate each field
            var lantaiValid = appendFormData('lantai', "input[name^='txtModalLantai']");
            var divisiValid = appendFormData('divisi', "input[name^='txtModalDivisi']");
            var rakValid = appendFormData('rak', "input[name^='txtModalRak']");
            var tingkatValid = appendFormData('tingkat', "textarea[name^='txtModalTingkat']");
            var judulValid = appendFormData('judul', "input[name^='txtModalJudul']");
            var remarkValid = appendFormData('remark', "input[name^='txtModalRemark']");
            var companyValid = appendFormData('company', "input[name^='txtModalCompany']");
            var tahunValid = appendFormData('tahun', "input[name^='txtModalTahun']");
            var noPenyimpananValid = appendFormData('no_penyimpanan',
                "input[name^='txtModalnoPenyimpanan']");

            // Append additional fields
            formData.append('add_userid', '1'); // Change this to the actual user ID
            formData.append('add_date', new Date().toISOString());
            formData.append('edit_userid', '1'); // Change this to the actual user ID
            formData.append('edit_date', new Date().toISOString());
            formData.append('sts_delete', '0'); // Default status

            // If any field is invalid, show alert and return false
            if (!lantaiValid || !divisiValid || !rakValid || !tingkatValid || !judulValid || !
                remarkValid || !companyValid || !tahunValid || !noPenyimpananValid) {
                alert("All fields are required!");
                return false;
            }

            $("#idLoading").show();

            $.ajax({
                url: '<?php echo base_url("lantai/addLantaiDetail"); ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    data = JSON.parse(data); // Parse JSON response
                    alert(data.message); // Show server response message
                    if (data.status === 'success') {
                        $("#inputModal").modal('hide');
                        resetForm();
                        loadData(); // Reload data after adding
                    }
                },
                error: function(xhr, status, error) {
                    alert("Failed to insert data: " + error); // Show error message
                }
            });
        });

        // Edit button handler
        $('#lantaiTable').on('click', '.edit-btn', function() {
            var row = $(this).closest('tr');
            var id = row.data('id');

            // Fetch data for the specific ID
            $.ajax({
                url: '<?php echo base_url("lantai/getLantaiDetail"); ?>/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate the form with existing data
                    $("input[name^='txtModalLantai']").val(data.lantai);
                    $("input[name^='txtModalDivisi']").val(data.divisi);
                    $("input[name^='txtModalRak']").val(data.rak);
                    $("textarea[name^='txtModalTingkat']").val(data.tingkat);
                    $("input[name^='txtModalJudul']").val(data.judul);
                    $("input[name^='txtModalRemark']").val(data.remark);
                    $("input[name^='txtModalCompany']").val(data.company);
                    $("input[name^='txtModalTahun']").val(data.tahun);
                    $("input[name^='txtModalnoPenyimpanan']").val(data.no_penyimpanan);
                    $("input[name='id']").val(data.id); // Store the ID in a hidden field

                    // Show the modal for editing
                    $("#inputModal").modal('show');
                },
                error: function(xhr, status, error) {
                    alert("Failed to fetch data: " + error);
                }
            });
        });

        // Save changes on edit
        $("#saveEditLantai").click(function() {
            var formData = {
                id: $("input[name='id']").val(),
                lantai: $("input[name^='txtModalLantai']").val(),
                divisi: $("input[name^='txtModalDivisi']").val(),
                rak: $("input[name^='txtModalRak']").val(),
                tingkat: $("textarea[name^='txtModalTingkat']").val(),
                judul: $("input[name^='txtModalJudul']").val(),
                remark: $("input[name^='txtModalRemark']").val(),
                company: $("input[name^='txtModalCompany']").val(),
                tahun: $("input[name^='txtModalTahun']").val(),
                no_penyimpanan: $("input[name^='txtModalnoPenyimpanan']").val(),
                edit_userid: '1', // Change this to the actual user ID
                edit_date: new Date().toISOString()
            };

            $.ajax({
                url: '<?php echo base_url("lantai/updateLantaiDetail"); ?>',
                type: 'POST',
                data: formData,
                success: function(data) {
                    data = JSON.parse(data); // Parse JSON response
                    alert(data.message); // Show server response message
                    if (data.status === 'success') {
                        $("#inputModal").modal('hide');
                        loadData(); // Reload data after editing
                    }
                },
                error: function(xhr, status, error) {
                    alert("Failed to update data: " + error); // Show error message
                }
            });
        });

        // Delete button handler
        $('#lantaiTable').on('click', '.delete-btn', function() {
            var row = $(this).closest('tr');
            var id = row.data('id');

            if (confirm('Are you sure you want to delete this item?')) {
                $.ajax({
                    url: '<?php echo base_url("lantai/deleteLantaiDetail"); ?>/' + id,
                    type: 'POST',
                    data: {
                        edit_userid: '1', // Change this to the actual user ID
                        edit_date: new Date().toISOString()
                    },
                    success: function(data) {
                        data = JSON.parse(data); // Parse JSON response
                        alert(data.message); // Show server response message
                        if (data.status === 'success') {
                            loadData(); // Reload data after deletion
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("Failed to delete data: " + error); // Show error message
                    }
                });
            }
        });
    });
    </script>

</head>

<body>
    <div class="container mt-5">
        <div id="st_data" class="alert alert-info" style="display: none;"></div>
        <!-- Table -->
        <div class="pd-20 card-box mb-30 mx-auto" style="max-width: 800px;">
            <div class="d-flex justify-content-between mb-3">
                <h4>Daftar Nama Lantai</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputModal">
                    Tambah
                </button>
            </div>
            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">Lantai</th>
                        <th>Divisi</th>
                        <th>Rak</th>
                        <th>Tingkat</th>
                        <th>Judul</th>
                        <th>Remark</th>
                        <th>company</th>
                        <th>Tahun</th>
                        <th>No Penyimpanan</th>
                        <th class="datatable-nosort">Actions</th>
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
                        <h5 class="modal-title" id="inputModalLabel">Tambah Detail Lantai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="inputForm">
                            <div id="detailContainer">
                                <!-- Initial row template -->
                                <div class="row detailRow">
                                    <div class="col-md-2 col-xs-12">
                                        <div class="form-group">
                                            <label for="Lantai">Lantai:</label>
                                            <input type="text" class="form-control" name="txtModalLantai[]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <div class="form-group">
                                            <label for="tingkatDus">Divisi</label>
                                            <input type="text" class="form-control" name="txtModalDivisi[]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-12">
                                        <div class="form-group">
                                            <label for="rak">Rak:</label>
                                            <input type="text" class="form-control" name="txtModalRak[]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="tingkat">Tingkat:</label>
                                            <input type="text" class="form-control" name="txtModalTingkat[]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="judul">Judul:</label>
                                            <input type="text" class="form-control" name="txtModalJudul[]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="remark">Remark:</label>
                                            <textarea name="txtModalRemark[]" class="form-control input-lg"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="company">Company:</label>
                                            <input type="text" class="form-control" name="txtModalCompany[]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="tahun">Tahun:</label>
                                            <input type="text" class="form-control" name="txtModalTahun[]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <div class="form-group">
                                            <label for="noPenyimpanan">No Penyimpanan</label>
                                            <input type="text" class="form-control" name="txtModalPenyimpanan[]"
                                                required>
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
                        <button type="button" class="btn btn-primary" id="saveDetailLantai">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>