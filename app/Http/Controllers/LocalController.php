<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLocalRequest;
use App\Http\Requests\UpdateLocalRequest;
use App\Repositories\LocalRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class LocalController extends AppBaseController
{
    /** @var LocalRepository $localRepository*/
    private $localRepository;

    public function __construct(LocalRepository $localRepo)
    {
        $this->localRepository = $localRepo;
    }

    /**
     * Display a listing of the Local.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $locals = $this->localRepository->all();

        return view('locals.index')
            ->with('locals', $locals);
    }

    /**
     * Show the form for creating a new Local.
     *
     * @return Response
     */
    public function create()
    {
        return view('locals.create');
    }

    /**
     * Store a newly created Local in storage.
     *
     * @param CreateLocalRequest $request
     *
     * @return Response
     */
    public function store(CreateLocalRequest $request)
    {
        $input = $request->all();
        $local = \App\Models\Local::create([
            'nombre' => $input['nombre']
        ]);
        $path_logo = $input['logo']->storeAs('logos', $local->id.'.'.$input['logo']->extension());
        $local->logo_img = $path_logo;
        $local->save();

        Flash::success('Local saved successfully.');

        return redirect(route('locals.index'));
    }

    /**
     * Display the specified Local.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $local = $this->localRepository->find($id);

        if (empty($local)) {
            Flash::error('Local not found');

            return redirect(route('locals.index'));
        }

        return view('locals.show')->with('local', $local);
    }

    /**
     * Show the form for editing the specified Local.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $local = $this->localRepository->find($id);
        // dd(\Storage::path($local->logo_img));
        // dd(\Storage::exists('logos/'.$local->id) ? \Storage::path('logos/'.$local->id) : '#');
        if (empty($local)) {
            Flash::error('Local not found');

            return redirect(route('locals.index'));
        }

        return view('locals.edit')->with('local', $local);
    }

    /**
     * Update the specified Local in storage.
     *
     * @param int $id
     * @param UpdateLocalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLocalRequest $request)
    {
        $local = $this->localRepository->find($id);
       

        if (empty($local)) {
            Flash::error('Local not found');

            return redirect(route('locals.index'));
        }

        $local->nombre = $input['nombre'];
        $local->save();
        if(isset($input['logo']) && $input['logo'] != ''){
            $path_logo = $input['logo']->storeAs('logos', $local->id.'.'.$input['logo']->extension());
        }
        $local->logo_img = $path_logo;
        $local->save();

        Flash::success('Local actualizado correctamente.');

        return redirect(route('locals.index'));
    }

    /**
     * Remove the specified Local from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $local = $this->localRepository->find($id);

        if (empty($local)) {
            Flash::error('Local not found');

            return redirect(route('locals.index'));
        }

        $this->localRepository->delete($id);

        Flash::success('Local deleted successfully.');

        return redirect(route('locals.index'));
    }
}
