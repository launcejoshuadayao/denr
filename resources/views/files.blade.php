@extends('layouts.navbar')
@section('content')


    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <body>
        <div class="table-container">
            <div class="table-title">
                <div class="title-left">
                    <h2>RECORDS</h2>
                    <button class="addApplicant" onclick="openForm()" title="Upload 1 or many files.">UPLOAD FILE/S</button>
                </div>
                <div class="search-filter">

                    <div class="search-box">
                        <i class="material-icons">&#xE8B6;</i>
                        <input type="text" id="searchInput" placeholder="Search&hellip;">
                    </div>

                </div>

            </div>

            <table class="table" id="tables">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Applicant Name</th>
                        <th>Application Type</th>
                        <th>Filename</th>
                        <th>Date Created</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @if($files->isEmpty())
                        <tr>
                            <td colspan="6" style="text-align: center; opacity: 0.5; padding: 20px;">
                                <div >
                                    <p>No Records Found.</p>
                                    {{-- <img src="{{asset('assets/images/empty.svg')}}" alt=""> --}}

                                </div>
                            </td>
                        </tr>
                    @else
                    @foreach($files as $file)
                        <tr>
                            
                            <td>{{ $file->files_id}}</td>
                            <td>{{ $file->applicantname}}</td>

                            <td>{{ $file->applicationType }}</td>   
                            <td>{{ $file->file_name }}</td>
                            <td>{{ \Carbon\Carbon::parse(time: $file->created_at)->format('F d, Y h:i A') }}</td>
                            <td>
                                <div class="actions">

                                    @if(Str::endsWith($file->file_name, '.pdf'))
                                        <form action="{{ route('view.file', ['id' => $file->files_id]) }}" method="GET"
                                            target="_blank">
                                            <button type="submit" class="view-pdf" title="View PDF">
                                                <i class="ri-file-pdf-2-fill"></i>
                                            </button>
                                        </form>
                                    @endif

                                    <form action="{{ route('files.download', $file->files_id) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="download-btn" title="Download File"><i
                                                class="ri-file-download-fill"></i></button>
                                    </form>

                                    <form action="" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-confirm" title="Archive">
                                            <i class="ri-archive-2-fill"></i>
                                        </button>
                                    </form>



                                    <!-- <button class="delete" onclick="deleteConfirmation()"><i class="material-icons">&#xE872;</i></button> -->
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>



            <div class="form-popup" id="myForm">
                <form action="{{ route('upload') }}" class="form-container" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="titleCloseButton">
                        <h1 style="margin-bottom: 10px;">UPLOAD FILES</h1><button type="button" class="close-button"
                            onclick="closeForm()"><i class="material-icons">close</i></button>
                    </div>

                    <hr>
                    <div class="row" style="margin-top: 10px;">
                        <div class="column" style="width: 60%;">
                            <label for="applicantname">Applicant Name </label><br>
                            <input type="text" name="applicantname" id="applicantname" style="width: 100%">
                            <label for="applicationType">Application Type</label>
                            <select name="applicationType" id="applicationType" style="width: 100%">
                                <option value=""selected disabled>SELECT APPLICATION</option>
                                <option value="MSA">MSA</option>
                                <option value="FPA">FPA</option>
                                <option value="RFPA">RFPA</option>
                                <option value="TSA - CLEARED">TSA - CLEARED</option>
                                <option value="TSA - SUBSISTING">TSA - SUBSISTING</option>
                                <option value="SA">SA</option>
                                <option value="SP - GOVERNMENT">SP - GOV</option>
                                <option value="SP - SCHOOL">SP - SCHOOL</option>
                               
                            </select>
                            <label for="files">Upload Files</label><br>
                            <input type="file" name="files[]" multiple><br><br>

                        </div>
                        <button type="submit" class="btn">Upload</button>

                    </div>

                </form>
            </div>



            <!--*edit*-->
            {{-- <div class="form-popupEdit" id="myFormEdit"> --}}
                {{-- <form action="" class="form-containerEdit" id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="titleCloseButton">
                        <h1 style="margin-bottom: 10px;">EDIT APPLICATION</h1><button type="button" class="close-button"
                            onclick="closeFormEdit()"><i class="material-icons">close</i></button>
                    </div>
                    <hr>
                    <div class="row" style="margin-top: 10px;">
                        <div class="column">
                            <label for="applicantname">Applicant Name</label>
                            <input type="text" placeholder="Enter Applicant name (Surname first)" name="applicantname"
                                required><br>

                            <label for="location">Location</label>
                            <input type="text" placeholder='Enter location' name="location" required><br>

                        </div>
                        <div class="column">


                            <label for="applicantnumber">Applicant Number</label>
                            <input type="text" placeholder="Enter Applicant number" name="applicantnumber" required><br>
                            <div class="row">
                                <div class="column">
                                    <label for="surveynumber">Survey Number</label>
                                    <input type="text" placeholder="Enter Survey number" name="surveynumber" required><br>
                                </div>
                                <div class="column">
                                    <div style="margin-left: 20px;">
                                        <label for="status">Status</label><br>

                                        <select name="status">
                                            <option>Select</option>
                                            <option value="subsisting">Subsisting</option>
                                            <option value="patented">Patented</option>
                                        </select>
                                    </div><br>

                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="remarks">Remarks</label><br>
                    <textarea id="comments" name="remarks" rows="4" cols="50" placeholder="Remarks"></textarea><br><br>
                    <input type="submit" class="btn" style="border-radius: 10px;" value="UPDATE APPLICATION">

                    <script>

                        document.querySelector("#filters").addEventListener("change", filterTable);

                        function filterTable() {

                            const selectedOption = document.querySelector("#filters").value;
                            const tableRows = document.querySelectorAll("#tables tr");

                            tableRows.forEach((row, index) => {
                                if (index === 0) return;

                                if (row.children[3].textContent.toLowerCase() === selectedOption.toLowerCase() || selectedOption === "All") {

                                    row.style.display = "";
                                }
                                else {

                                    row.style.display = "none";

                                }
                            });

                        }

                    </script> --}}


                    <script>
                        function openForm() {
                            document.getElementById("myForm").style.display = "block";
                        }

                        function deleteConfirmation() {
                            swal({
                                title: "Are you sure?",
                                text: "But you will still be able to retrieve this file.",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, archive it!",
                                cancelButtonText: "No, cancel please!",
                                closeOnConfirm: false,
                                closeOnCancel: false
                            },
                                function (isConfirm) {
                                    if (isConfirm) {
                                        swal("Deleted!", "Your imaginary file has been archived.", "success");
                                    } else {
                                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                                    }
                                });
                        }
                        function closeForm() {
                            document.getElementById("myForm").style.display = "none";
                        }


                    </script>




                    {{-- @if(Session::has('error'))
                    <script>
                        swal(
                            {
                                title: "An error ocurred",
                                text: "{{ Session::get('error') }}",
                                icon: "{{ asset('assets/images/error.svg') }}",
                                button: "Close"
                            });
                    </script>

                    @elseif(Session::has('success'))
                    <script>
                        swal(
                            {

                                title: "Success",
                                text: "{{ Session::get('success') }}",
                                icon: "{{ asset('assets/images/success.svg') }}",
                                button: "Proceed"
                            });
                    </script>
                    @elseif(Session::has('message'))
                    <script>
                        swal(
                            {

                                title: "Message",
                                text: "{{ Session::get('success') }}",
                                icon: "{{ asset('assets/images/success.svg') }}",
                                button: "Proceed"
                            });
                    </script>
                    @endif --}}

                    <script>
                        // Show success message
                        @if(session('success'))
                            swal("Success!", "{{ session('success') }}", "success");
                        @endif

                        // Show error message
                        @if(session('error'))
                            swal("Error!", "{{ session('error') }}", "error");
                        @endif

                        // Show validation errors
                        @if ($errors->any())
                            swal("Upload Failed!", "{!! implode('<br>', $errors->all()) !!}", "warning");
                        @endif
                    </script>

                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            document.getElementById("searchInput").addEventListener("input", function () {
                                const searchValue = this.value.toLowerCase();
                                const rows = document.querySelectorAll("#tables tbody tr");

                                rows.forEach(row => {
                                    const cells = row.querySelectorAll("td");
                                    let match = false;
                                    cells.forEach(cell => {
                                        if (cell.textContent.toLowerCase().includes(searchValue)) {
                                            match = true;
                                        }
                                    });
                                    row.style.display = match ? "" : "none";
                                });
                            });
                        });

                    </script>

    </body>

@endsection