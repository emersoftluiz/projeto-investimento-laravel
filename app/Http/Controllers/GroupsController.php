<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GroupService;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\GroupCreateRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Repositories\GroupRepository;
use App\Repositories\InstitutionRepository;
use App\Repositories\UserRepository;
use App\Validators\GroupValidator;

class GroupsController extends Controller
{
    protected $repository;
    protected $validator;
    protected $service;
    protected $institutionRepository;
    protected $userRepository;
    
    public function __construct(GroupRepository $repository, GroupValidator $validator, GroupService $service,
                                InstitutionRepository $institutionRepository, UserRepository $userRepository)
    {
        $this->repository            = $repository;
        $this->validator             = $validator;
        $this->service               = $service;
        $this->userRepository        = $userRepository;
        $this->institutionRepository = $institutionRepository;
    }
    
    public function index()
    {
        $groups           = $this->repository->all();
        //$user_list      = \App\Entities\User::pluck('name', 'id')->all();
        //dd($user_list);
        $user_list        = $this->userRepository->selectBoxList();
        $institution_list = $this->institutionRepository->selectBoxList();

        return view('groups.index', [
            'groups'           => $groups,
            'user_list'        => $user_list,
            'institution_list' => $institution_list
        ]);
    }
    
    public function store(GroupCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $group = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);

        return redirect()->route('group.index');
    }

    public function userStore(Request $request, $group_id)
    {
        $request = $this->service->userStore($group_id, $request->all());

        session()->flash('success', [
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);

        return redirect()->route('group.show', [$group_id]);
    }
    
    public function show($id)
    {
        $group     = $this->repository->find($id);
        $user_list = $this->userRepository->selectBoxList();
        
        return view('groups.show', [
            'group'     => $group,
            'user_list' => $user_list
        ]);
    }
    
    public function edit($id)
    {
        $group            = $this->repository->find($id);
        $user_list        = $this->userRepository->selectBoxList();
        $institution_list = $this->institutionRepository->selectBoxList();

        return view('groups.edit', [
            'group'            => $group,
            'user_list'        => $user_list,
            'institution_list' => $institution_list
        ]);
    }
    
    public function update(Request $request, $group_id)
    {
        $request = $this->service->update($group_id, $request->all());

        session()->flash('success', [
            'success'  => $request['success'],
            'messages' => $request['messages']
        ]);

        return redirect()->route('group.index');
    }
    
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        
        return redirect()->route('group.index');
    }
}
