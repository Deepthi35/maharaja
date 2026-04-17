<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\LocationRepository;
use Illuminate\Http\Request;
use Flash;

class LocationController extends AppBaseController
{
    /** @var LocationRepository $locationRepository*/
    private $locationRepository;

    public function __construct(LocationRepository $locationRepo)
    {
        $this->locationRepository = $locationRepo;
        $this->middleware('role_or_permission:add-locations', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:edit-locations', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:delete-locations', ['only' => ['destroy']]);
        $this->middleware('role_or_permission:view-locations', ['only' => ['index', 'show']]);
    }

    /**
     * Display a listing of the Location.
     */
    public function index(Request $request)
    {
        return view('locations.index');
    }

    /**
     * Show the form for creating a new Location.
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created Location in storage.
     */
    public function store(CreateLocationRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('image')) {
            $input['image'] = uploadImage($request->file('image'), LOCATION_IMAGE_PATH);
        }

        $location = $this->locationRepository->create($input);

        Flash::success('Location saved successfully.');

        return redirect(route('locations.index'));
    }

    /**
     * Display the specified Location.
     */
    public function show($id)
    {
        $location = $this->locationRepository->find($id);

        if (empty($location)) {
            Flash::error('Location not found');

            return redirect(route('locations.index'));
        }

        return view('locations.show')->with('location', $location);
    }

    /**
     * Show the form for editing the specified Location.
     */
    public function edit($id)
    {
        $location = $this->locationRepository->find($id);

        if (empty($location)) {
            Flash::error('Location not found');

            return redirect(route('locations.index'));
        }

        return view('locations.edit')->with('location', $location);
    }

    /**
     * Update the specified Location in storage.
     */
    public function update($id, UpdateLocationRequest $request)
    {
        $location = $this->locationRepository->find($id);

        if (empty($location)) {
            Flash::error('Location not found');

            return redirect(route('locations.index'));
        }

        $input = $request->all();

        if ($request->hasFile('image')) {
            if ($location->image) {
                removeImage($location->image, LOCATION_IMAGE_PATH);
            }
            $input['image'] = uploadImage($request->file('image'), LOCATION_IMAGE_PATH);
        }

        $location = $this->locationRepository->update($input, $id);

        Flash::success('Location updated successfully.');

        return redirect(route('locations.index'));
    }

    /**
     * Remove the specified Location from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $location = $this->locationRepository->find($id);

        if (empty($location)) {
            Flash::error('Location not found');

            return redirect(route('locations.index'));
        }

        $this->locationRepository->delete($id);

        Flash::success('Location deleted successfully.');

        return redirect(route('locations.index'));
    }
}
