<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCmsAPIRequest;
use App\Http\Requests\API\UpdateCmsAPIRequest;
use App\Models\Cms;
use App\Repositories\CmsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class CmsController
 */

class CmsAPIController extends AppBaseController
{
    private CmsRepository $cmsRepository;

    public function __construct(CmsRepository $cmsRepo)
    {
        $this->cmsRepository = $cmsRepo;
    }

    /**
     * @OA\Get(
     *      path="/cms",
     *      summary="getCmsList",
     *      tags={"Cms"},
     *      description="Get all Cms",
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
     *                  @OA\Items(ref="#/components/schemas/Cms")
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
        $cms = $this->cmsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cms->toArray(), 'Cms retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/cms",
     *      summary="createCms",
     *      tags={"Cms"},
     *      description="Create Cms",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Cms")
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
     *                  ref="#/components/schemas/Cms"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCmsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $cms = $this->cmsRepository->create($input);
        $cms->banner_image = uploadImageAPI($request->file('banner_image'), CMS_IMAGE_PATH);
        $cms->gallery = uploadMultipleImagesAPI($request->file('gallery'), CMS_IMAGE_PATH, null);
        $cms->save();

        // Log Activity
        activity()
            ->performedOn(getAPIUser())
            ->withProperties(['title' => $cms->title, 'slug' => $cms->slug])
            ->log('API / CMS - New page created.');

        return $this->sendResponse($cms->toArray(), 'Cms saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/cms/{id}",
     *      summary="getCmsItem",
     *      tags={"Cms"},
     *      description="Get Cms",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Cms",
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
     *                  ref="#/components/schemas/Cms"
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
        /** @var Cms $cms */
        $cms = $this->cmsRepository->find($id);

        if (empty($cms)) {
            return $this->sendError('Cms not found');
        }

        return $this->sendResponse($cms->toArray(), 'Cms retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/cms/{id}",
     *      summary="updateCms",
     *      tags={"Cms"},
     *      description="Update Cms",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Cms",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Cms")
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
     *                  ref="#/components/schemas/Cms"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCmsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Cms $cms */
        $cms = $this->cmsRepository->find($id);

        if (empty($cms)) {
            return $this->sendError('Cms not found');
        }

        $cms = $this->cmsRepository->update($input, $id);
        $cms->banner_image = uploadImageAPI($request->file('banner_image'), CMS_IMAGE_PATH);
        $cms->gallery = uploadMultipleImagesAPI($request->file('gallery'), CMS_IMAGE_PATH, null);
        $cms->save();

        // Log Activity
        activity()
            ->performedOn(getAPIUser())
            ->withProperties(['title' => $cms->title, 'slug' => $cms->slug])
            ->log('API / CMS - Page details updated.');

        return $this->sendResponse($cms->toArray(), 'Cms updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/cms/{id}",
     *      summary="deleteCms",
     *      tags={"Cms"},
     *      description="Delete Cms",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Cms",
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
        /** @var Cms $cms */
        $cms = $this->cmsRepository->find($id);

        if (empty($cms)) {
            return $this->sendError('Cms not found');
        }

        if (getSubMenu($cms->id)->count() > 0) {
            return $this->sendError('Unable to delete because this page contains sub pages.');
        } else {
            if ($cms->banner_image != '') {
                removeImage($cms->banner_image, CMS_IMAGE_PATH);
            }

            if ($cms->gallery != '') {
                foreach (json_decode($cms->gallery, true) as $gal) {
                    removeImage($gal['path'], CMS_IMAGE_PATH);
                }
            }

            $this->cmsRepository->delete($id);

            // Log Activity
            activity()
                ->performedOn(getAPIUser())
                ->withProperties(['title' => $cms->title, 'slug' => $cms->slug])
                ->log('API / CMS - Page details removed.');
        }

        return $this->sendSuccess('Cms deleted successfully');
    }
}
