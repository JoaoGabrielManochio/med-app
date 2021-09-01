<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UpdateDoctorRequest;
use App\Http\Requests\Dashboard\StoreDoctorRequest;
use App\Services\DoctorService;
use App\DataTables\DoctorsDataTable;

class DoctorController extends Controller
{
    protected $doctorService;

    public function __construct(DoctorService $doctorService)
    {
        $this->doctorService = $doctorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DoctorsDataTable $dataTable)
    {
        return $dataTable->render('pages.doctors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        $doctor = $this->doctorService->store();

        return redirect()->route('doctors.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = $this->doctorService->show($id);

        if (!$doctor) {
            return redirect()->route('doctors.index');
        }

        return view('pages.doctors.edit')->with(compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, $id)
    {
        $doctor = $this->doctorService->update($id);

        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = $this->doctorService->destroy($id);

        return redirect()->route('doctors.index');
    }
}
