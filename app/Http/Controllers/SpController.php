<?php

namespace App\Http\Controllers;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Spgov;
use App\Models\Spschool;
use Schema;

class SpController extends Controller
{
    public function sp_school(){
        $sp_schooldata = spschool::all();
        
        return view('spschool', compact('sp_schooldata'));
    }

    public function sp_government(){
        $sp_govdata = spgov::all();

        return view('spgovernment', compact('sp_govdata'));
    }

    public function addspgov(Request $request)
    {
        $request->validate([
            'applicantname' => 'required|string|max:255',
            'applicantnumber' => 'required|string|max:100',
            'refferedinvestigator' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'surveynumber' => 'required|string|max:100',
            'status' => 'required|string',
            'remarks' => 'nullable|string',
        ]);
        $insert = DB::table('sp_government')->insert([
            'applicant_name' => $request->applicantname,
            'applicant_number' => $request->applicantnumber,
            'reffered_investigator' => $request->refferedinvestigator,
            'patented_subsisting' => $request->status,
            'location' => $request->location,
            'survey_no' => $request->surveynumber,
            'remarks' => $request->remarks
        ]);
    

        if($insert){
            return back()->with('success', 'Application added successfully');
        }
        else{
            return back()->with('error', 'An error ocurrec while updating the record.');
        }
    }

    public function addspschool(Request $request)
    {
        $request->validate([
            'applicantname' => 'required|string|max:255',
            'applicantnumber' => 'required|string|max:100',
            'refferedinvestigator' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'surveynumber' => 'required|string|max:100',
            'status' => 'required|string',
            'remarks' => 'nullable|string',
        ]);
        $insert = DB::table('sp_school')->insert([
            'applicant_name' => $request->applicantname,
            'applicant_number' => $request->applicantnumber,
            'reffered_investigator' => $request->refferedinvestigator,
            'patented_subsisting' => $request->status,
            'location' => $request->location,
            'survey_no' => $request->surveynumber,
            'remarks' => $request->remarks
        ]);
    

        if($insert){
            return back()->with('success', 'Application added successfully');
        }
        else{
            return back()->with('error', 'An error ocurrec while updating the record.');
        }
    }

    public function updatesp_gov(Request $request, $id_spgov)
{
    $request->validate([
        'applicantname' => 'required|string|max:255',
        'applicantnumber' => 'required|string|max:100',
        'refferedinvestigator' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'surveynumber' => 'required|string|max:100',
        'status' => 'required|string',
        'remarks' => 'nullable|string',
    ]);
    $update = DB::table('sp_government')->where('id_spgov', $id_spgov)->update([
        'applicant_name' => $request->applicantname,
        'applicant_number' => $request->applicantnumber,
        'patented_subsisting' => $request->status,
        'reffered_investigator' => $request->refferedinvestigator,
        'location' => $request->location,
        'survey_no' => $request->surveynumber,
        'remarks' => $request->remarks
    ]);
    if ($update) {
        return back()->with('update_success', 'Record updated successfully.');
    } else {
        return back()->with('error', 'An error occurred while updating the record.');
    }
}

public function updatesp_school(Request $request, $id_spschool)
{
    $request->validate([
        'applicantname' => 'required|string|max:255',
        'applicantnumber' => 'required|string|max:100',
        'refferedinvestigator' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'surveynumber' => 'required|string|max:100',
        'status' => 'required|string',
        'remarks' => 'nullable|string',
    ]);
    $update = DB::table('sp_school')->where('id_spschool', $id_spschool)->update([
        'applicant_name' => $request->applicantname,
        'applicant_number' => $request->applicantnumber,
        'patented_subsisting' => $request->status,
        'reffered_investigator' => $request->refferedinvestigator,
        'location' => $request->location,
        'survey_no' => $request->surveynumber,
        'remarks' => $request->remarks
    ]);
    if ($update) {
        return back()->with('update_success', 'Record updated successfully.');
    } else {
        return back()->with('error', 'An error occurred while updating the record.');
    }
}


    public function deletesp_gov($id_spgov)
    {
        // $msa = msa::where($id_msa, 'id_msa')->first();

        // if ($msa) {
        //     $msa->delete();
        //     return back()->with('success', 'Record deleted successfully.');
        // }

        // return back()->with('error', 'Record not found.');

        $deleted = DB::table('sp_government')->where('id_spgov', $id_spgov)->delete();

        if ($deleted) {
            return back()->with('delete_success', 'Record successfully deleted.');
        } else {
            return back()->with('error', 'Record not found.');
        }
   
    }

    public function deletesp_school($id_spschool)
    {
        // $msa = msa::where($id_msa, 'id_msa')->first();

        // if ($msa) {
        //     $msa->delete();
        //     return back()->with('success', 'Record deleted successfully.');
        // }

        // return back()->with('error', 'Record not found.');

        $deleted = DB::table('sp_school')->where('id_spschool', $id_spschool)->delete();

        if ($deleted) {
            return back()->with('delete_success', 'Record successfully deleted.');
        } else {
            return back()->with('error', 'Record not found.');
        }
   
    }
}
