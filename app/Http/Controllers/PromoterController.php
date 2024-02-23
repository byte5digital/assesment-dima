<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromoterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Operation promotersGet
     *
     * List promoters.
     *
     * @return Http response
     */
    public function promotersGet()
    {
        $promoters = DB::table('promoters')
                        ->get();
        return response()->json($promoters);
    }

    /**
     * Operation promotersPromoterIdGet
     *
     * Read a promoter.
     *
     * @param string $promoterId The unique identifier of the promoter (required)
     *
     * @return Http response
     */
    public function promotersPromoterIdGet($promoterId)
    {
        if (is_numeric($promoterId) === false) {
            return response()->json(['error'=>"wrong type of promoterId. integer expected", 400]);
        }

        // alternative DB query
        //$promoters = DB::table('promoters')
        //                ->select('id', 'employee_id')
        //                ->where('id', '=', $promoterId)
        //                ->get();
        
        $promoters = \App\Models\Promoter::where('id', $promoterId)->get();

        if ($promoters->count() === 0) {
            return response()->json(['error'=>"promoterId not found", 204]); 
        }

        foreach($promoters as $promoter) {
            $employee = \App\Models\Employee::where('id', $promoter->employee_id)->get();
            $promoterSkills = \App\Models\PromoterSkill::where('promoter_id', $promoter->id)->get();
            $skillList = [];
            foreach($promoterSkills as $promoterSkill) {
                $skills = \App\Models\Skills::where('id', $promoterSkill->skill_id)->get();
                foreach($skills as $skill) {
                    $skillList[] = $skill->toArray();
                }

            }
            $promoter = $employee->toArray();
            
            $promoter[0]['skills'] = $skillList;
            return response($promoter);
            return response()->json($output); 

            return response()->json($employee); 
        }
    }

}
