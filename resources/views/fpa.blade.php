@extends('layouts.navbar')
@section('content')


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<body>
<div class="table-container">
    <div class="table-title">
        <div class="title-left">
        <h2>FREE PATENT APPLICATION (AGRICULTURAL)</h2>
        <button class="addApplicant" onclick="openForm()">ADD APPLICANT</button>
        </div>
        <div class="search-filter">
            <p class="p-filter">Filter: </p>
            <div class="filter">
            <select name="filter" id="filter">

                <option selected disabled hidden style = "color: #a0a5b1;" >Patented/Subsisting</option>
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
    <table class = "table" id ="tables">
        <thead>
            <tr>
                <th>#</th>
                <th>Applicant Name</th>
                <th>Applicant Number</th>
                <th>Reffered Investigator</th>
                <th>Patented/Subsisting</th>
                <th>Location</th>
                <th>Survey No.</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($fpadata as $fpa)
            <tr>
            <td>{{ $fpa->fpa_id}}</td>
            <td>{{ $fpa->applicant_name }}</td>
            <td>{{ $fpa->applicant_number }}</td>
            <td>{{ $fpa->reffered_investigator}}</td>
            <td>{{ $fpa->patented_subsisting }}</td>
            <td>{{ $fpa->location }}</td>
            <td>{{ $fpa->survey_no }}</td>
            <td>{{ $fpa->remarks }}</td>
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

function filterTable(){
    
    const selectedOption = document.querySelector("#filter").value;
    const tableRows = document.querySelectorAll("#tables tr");

    tableRows.forEach((row, index)=> {
        if (index === 0 ) return;

        if(row.children[4].textContent.toLowerCase() === selectedOption.toLowerCase() || selectedOption === "All" ){

            row.style.display = "";
        }
        else{

            row.style.display = "none";

        }
    });

}

</script>


@endsection