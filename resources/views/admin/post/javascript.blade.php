@push('js')
    @if (session('status'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('status') }}',
            })
        </script>
    @endif
    <script>
        function deleteFunction($id) {
            event.preventDefault();
            const form = 'form-delete-' + $id;
            Swal.fire({
                title: 'Apakah anda yakin menghapus ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(form).submit();
                }
            }).catch((error) => {
                console.log(error);
            })
        }

        function checkAll() {
            var checkboxes = document.getElementById('selectAllCheckbox');
            var buttonSetting = document.getElementById('settingOptionButton');
            var tableData = $('#dataTable').DataTable();
            var allPages = tableData.cells().nodes();
            if (checkboxes.checked === false) {
                $('#checkBoxData', allPages).prop('checked', false);
                buttonSetting.classList.add("disabled");
            } else {
                $('#checkBoxData', allPages).prop('checked', true);
                buttonSetting.classList.remove("disabled");
            }
        }

        function checkOne() {
            $('#selectAllCheckbox').prop('checked', false);
            var buttonSetting = document.getElementById('settingOptionButton');
            buttonSetting.classList.remove("disabled");
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".btn-submit-delete-checkbox").click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin menghapus ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    var oTable = $('#dataTable').dataTable();
                    var rowcollection = oTable.$("#checkBoxData:checked", {
                        "page": "all"
                    });
                    var arrayCheckBox = [];
                    rowcollection.each(function(index, elem) {
                        var checkbox_value = $(elem).val();
                        arrayCheckBox.push(checkbox_value);
                    });
                    $.ajax({
                        type: 'GET',
                        dataType: "json",
                        url: "{{ route('post.deleteselect') }}",
                        data: {
                            data: arrayCheckBox
                        },
                        success: function(data) {
                            Swal.fire({
                                title: 'Berhasil Menghapus Data',
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Ok'
                            }).then((result) => {
                                location.reload();
                            }).catch((error) => {
                                console.log(error);
                            })
                        }
                    });
                }
            }).catch((error) => {
                console.log(error);
            })
        });
    </script>
@endpush
