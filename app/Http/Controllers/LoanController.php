<?php

namespace App\Http\Controllers;

use App\Laptop;
use App\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = DB::select("SELECT 
            loans.id AS identification_loan, 
            loans.is_active, 
            loans.novedad, 
            loans.descripcion, 
            loans.created_at AS date_loan, 
            instructors.* 
        FROM loans INNER JOIN instructors ON loans.id_instructors = instructors.id
        where loans.created_at = loans.created_at");
        // $instructors = DB::table('instructors')->get();
        // $laptops = DB::table('laptops')->get();
        return view("loans.index", ['loans' => $loans]);
        // $loans = Loan::orderBy('id', 'desc')->paginate(5);
        // return view("loans.index", compact("loans"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $instructors = DB::table('instructors')->get();
        $laptops = Laptop::orderBy('placa', 'asc')->get();
        return view("loans.create", ['laptops' => $laptops, 'instructors' => $instructors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input('id_laptops'));


        foreach ($request->input('id_laptops') as $laptop) {

            $loans = new Loan;

            $loans->is_active = 1;
            $loans->novedad =  $request->input('novedad');
            $loans->descripcion = $request->input('descripcion');
            $loans->id_laptops = $laptop;
            $loans->id_instructors = $request->input('id_instructors');

            $loans->save();
        }


        return redirect()->route('loans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loans = DB::select("SELECT laptops.placa, laptops.serial, loans.id, loans.is_active, loans.id_instructors FROM loans
                                    INNER JOIN instructors ON instructors.id = loans.id_instructors
                                    INNER JOIN laptops ON laptops.id = loans.id_laptops 
                                    WHERE loans.id_instructors = $id ");


        $name_instructor = DB::select("SELECT instructors.nombre FROM instructors
                                        WHERE instructors.id = $id ");


        return view("loans.detail", ['loans' => $loans, 'name_instructor' => $name_instructor, 'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loans = \App\Loan::findOrFail($id);
        $laptops = DB::table('laptops')->get();
        $instructors = DB::table('instructors')->get();
        // foreach ($instructors as $i) {
        //     if ($loans->id_instructors == $i->id ){
        //         $
        //     }
        // }
        return view("loans.edit", ['laptops' => $laptops, 'loans' => $loans,  'instructors' => $instructors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $loans = \App\Loan::findOrFail($id);
        $is_active = $request->input('is_active');
        if ($is_active == null) {
            $loans->is_active = 0;
        } else {
            $loans->is_active = $request->input('is_active');
        }
        $loans->descripcion = $request->input('descripcion');

        $loans->update();
        $loans = \App\Loan::findOrFail($id);
        $loans = DB::select("SELECT laptops.placa, laptops.serial, loans.id, loans.is_active, loans.id_instructors FROM loans
                                    INNER JOIN instructors ON instructors.id = loans.id_instructors
                                    INNER JOIN laptops ON laptops.id = loans.id_laptops 
                                    WHERE loans.id_instructors = $id ");


        // $id_instructors = $id;
        $name_instructor = DB::select("SELECT instructors.nombre FROM instructors
                                        WHERE instructors.id = $id ");


        return view("loans.detail", ['loans' => $loans, 'name_instructor' => $name_instructor, 'id' => $id]);

        // return view("loans.detail", ['loans'=>$loans, 'id_instructors'=>$id_instructors]);
        // return redirect()->back()->with(['id_instructors'=>$id_instructors]);
        // return redirect()->route('loans.detail');]
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loans = \App\Loan::findOrFail($id);

        $loans->delete();

        return redirect()->route('loans.index');
    }
}
