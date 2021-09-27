<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InstitutionService;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\InstitutionCreateRequest;
use App\Http\Requests\InstitutionUpdateRequest;
use App\Repositories\InstitutionRepository;
use App\Validators\InstitutionValidator;

class InstitutionsController extends Controller
{
    protected $repository;
    protected $validator;
    protected $service;
    
    public function __construct(InstitutionRepository $repository, InstitutionValidator $validator, InstitutionService $service)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service    = $service;
    }

    public function index()
    {
        $institutions = $this->repository->all();

        return view('institutions.index', [
            'institutions' => $institutions,
        ]);
    }
    
    public function store(InstitutionCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $institution = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);

        return redirect()->route('institution.index');
    }
    
    public function show($id)
    {
        $institution = $this->repository->find($id);
        //dd($institution);

        return view('institutions.show', [
            'institution' => $institution
        ]);
    }
    
    public function edit($id)
    {
        $institution = $this->repository->find($id);

        return view('institutions.edit', [
            'institution' => $institution
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $request = $this->service->update($request->all(), $id);
        $institution = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);

        return redirect()->route('institution.index');
    }
    
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        return redirect()->route('institution.index');
    }
}
