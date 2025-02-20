@extends('layouts.navbar')
@section('content')


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<body>
<div class="table-container">
    <div class="table-title">
        <div class="title-left">
        <h2>TOWNSITE SALES APPLICATION</h2>
        <button class="addApplicant" onclick="openForm()">ADD APPLICANT</button>
        </div>
        <div class="search-filter">
            <p class="p-filter">Filter: </p>
            <div class="filter">
            <select name="filter1" id="filter1">

                <option selected disabled hidden style = "color: #a0a5b1;" value = "none1" >Cleared/Old</option>
                <option value="Cleared">Cleared</option>
                <option value="Old">Old</option>
                <option value="All">All</option>
            </select>
            <select name="filter" id="filter">
                <option selected disabled hidden style = "color: #a0a5b1;" value = "none" >Patented/Subsisting</option>
                <option value="Subsisting">Subsisting</option>
                <option value="Patented">Patented</option>
                <option value="All">All</option>
            </select>
            </div>
            <div class="search-box">
            <i class="material-icons">&#xE8B6;</i>
            <input type="text" placeholder="Search&hellip;">
        </div>
        </div>
       
    </div>
    <table class = "table" id = "tables">
        <thead>
            <tr>
                <th>#</th>
                <th>Applicant Name</th>
                <th>Applicant Number</th>
                <th>Patented/Subsisting</th>
                <th>Location</th>
                <th>Survey No.</th>
                <th>Cleared/Old</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tsadata as $ts)
            <tr>
            <td>{{ $ts->id_tsa}}</td>
            <td>{{ $ts->applicant_name }}</td>
            <td>{{ $ts->applicant_number }}</td>
            <td>{{ $ts->patented_subsisting }}</td>
            <td>{{ $ts->location }}</td>
            <td>{{ $ts->survey_no }}</td>
            <td>{{ $ts->cleared_old }}</td>
            <td>{{ $ts->remarks }}</td>
            <td> 
                <div class="actions">
                <a href="#" class="edit"><i class="material-icons">&#xE254;</i></a>
                <a href="" class="delete-confirm" data-url="">
    <i class="material-icons">&#xe149;</i>
                </div>
                    </td>
            </tr>
           @endforeach
        </tbody>
    </table>
  
    <script>

document.querySelector("#filter").addEventListener("change", filterTable);
document.querySelector("#filter1").addEventListener("change", filterTable);

function filterTable() {
    const selectedOption1 = document.querySelector("#filter1").value; 
    const selectedOption = document.querySelector("#filter").value; 
    const tableRows = document.querySelectorAll("#tables tr");

    tableRows.forEach((row, index) => {
        if (index === 0) return; 

        const patentedSubsisting = row.children[3].textContent.toLowerCase(); 
        const clearedOld = row.children[6].textContent.toLowerCase(); 

        
        const matchesPatentedSubsisting = (selectedOption === "All" || patentedSubsisting === selectedOption.toLowerCase());
        const matchesClearedOld = (selectedOption1 === "All" || clearedOld === selectedOption1.toLowerCase());

        
        if (selectedOption1 === "All" && selectedOption === "All") {
            row.style.display = ""; 
        }
        // else if (selectedOption1 === "Cleared" && selectedOption === "none") {
        //     row.style.display = ""; 
        // }
        // else if (selectedOption1 === "Old" && selectedOption === "none") {
        //     row.style.display = ""; 
        // }
        else if (selectedOption1 === "Cleared" && selectedOption == "All"){
            row.style.display = "";
        }
        else if (selectedOption1 === "Cleared" && selectedOption === "Subsisting" && clearedOld === "cleared" && patentedSubsisting === "subsisting") {
            row.style.display = ""; 
        } 
        else if (selectedOption1 === "Cleared" && selectedOption === "Patented" && clearedOld === "cleared" && patentedSubsisting === "patented") {
            row.style.display = "";
        } 
        else if (selectedOption1 === "Old" && selectedOption === "Subsisting" && clearedOld === "old" && patentedSubsisting === "subsisting") {
            row.style.display = ""; 
        } 
        else if (selectedOption1 === "Old" && selectedOption === "Patented" && clearedOld === "old" && patentedSubsisting === "patented") {
            row.style.display = "";
        } 
        else if (matchesPatentedSubsisting && matchesClearedOld) {
            row.style.display = ""; 
        } 
        else {
            row.style.display = "none"; 
        }
    });
}


</script>


@endsection