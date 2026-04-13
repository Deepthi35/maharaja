<?php

namespace App\Http\Controllers\API\ApplicationSettings;

use App\Http\Requests\API\CreateApplicationSettingAPIRequest;
use App\Http\Requests\API\UpdateApplicationSettingAPIRequest;
use App\Models\ApplicationSetting;
use App\Repositories\ApplicationSettingRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class ApplicationSettingController
 */

class ApplicationSettingAPIController extends AppBaseController
{
    private ApplicationSettingRepository $applicationSettingRepository;

    public function __construct(ApplicationSettingRepository $applicationSettingRepo)
    {
        $this->applicationSettingRepository = $applicationSettingRepo;
    }

    /**
     * @OA\Get(
     *      path="/applicationSettings",
     *      summary="getApplicationSettingList",
     *      tags={"ApplicationSetting"},
     *      description="Get all ApplicationSettings",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/ApplicationSetting")
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request): JsonResponse
    {
        $applicationSettings = $this->applicationSettingRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($applicationSettings->toArray(), 'Application Settings retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/applicationSettings",
     *      summary="createApplicationSetting",
     *      tags={"ApplicationSetting"},
     *      description="Create ApplicationSetting",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/ApplicationSetting")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/ApplicationSetting"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateApplicationSettingAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $applicationSetting = $this->applicationSettingRepository->create($input);

        // Log Activity
        activity()
            ->performedOn(getAPIUser())
            ->withProperties(['field name' => $request->field_name])
            ->log('API / Application Settings / Settings - New settings created.');

        return $this->sendResponse($applicationSetting->toArray(), 'Application Setting saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/applicationSettings/{id}",
     *      summary="getApplicationSettingItem",
     *      tags={"ApplicationSetting"},
     *      description="Get ApplicationSetting",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of ApplicationSetting",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/ApplicationSetting"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id): JsonResponse
    {
        /** @var ApplicationSetting $applicationSetting */
        $applicationSetting = $this->applicationSettingRepository->find($id);

        if (empty($applicationSetting)) {
            return $this->sendError('Application Setting not found');
        }

        return $this->sendResponse($applicationSetting->toArray(), 'Application Setting retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/applicationSettings/{id}",
     *      summary="updateApplicationSetting",
     *      tags={"ApplicationSetting"},
     *      description="Update ApplicationSetting",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of ApplicationSetting",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/ApplicationSetting")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/ApplicationSetting"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateApplicationSettingAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var ApplicationSetting $applicationSetting */
        $applicationSetting = $this->applicationSettingRepository->find($id);

        if (empty($applicationSetting)) {
            return $this->sendError('Application Setting not found');
        }

        $applicationSetting = $this->applicationSettingRepository->update($input, $id);

        // Log Activity
        activity()
            ->performedOn(getAPIUser())
            ->withProperties(['field name' => $request->field_name])
            ->log('API / Application Settings / Settings - Setting details updated.');

        return $this->sendResponse($applicationSetting->toArray(), 'ApplicationSetting updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/applicationSettings/{id}",
     *      summary="deleteApplicationSetting",
     *      tags={"ApplicationSetting"},
     *      description="Delete ApplicationSetting",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of ApplicationSetting",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id): JsonResponse
    {
        /** @var ApplicationSetting $applicationSetting */
        $applicationSetting = $this->applicationSettingRepository->find($id);

        if (empty($applicationSetting)) {
            return $this->sendError('Application Setting not found');
        }

        try {
            $applicationSetting->delete();

            // Log Activity
            activity()
                ->performedOn(getAPIUser())
                ->withProperties(['field name' => $applicationSetting->field_name])
                ->log('API / Application Settings / Settings - Setting details removed.');
        } catch (\Illuminate\Database\QueryException $e) {
            return $this->sendError('Cannot delete record because it has related records in another table.');
        }

        return $this->sendSuccess('Application Setting deleted successfully');
    }
}
