<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditGalleryRequest;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Services\CreateGalleryService;
use App\Models\Gallery;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display all galleries.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.galleries.index')->with([
            'title' => 'Galerias',
            'type' => 'galleries',
            'galleries' => Gallery::orderBy('reference', 'asc')->paginate(7),
        ]);
    }

    /**
     * Display form to create a new gallery.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.galleries.create-edit')->with([
            'title' => 'Criar Galeria',
            'task' => 'create',
        ]);
    }

    /**
     * Create a new gallery.
     *
     * @param StoreGalleryRequest $request
     * @param CreateGalleryService $createGalleryService
     * @return RedirectResponse
     */
    public function store(StoreGalleryRequest $request, CreateGalleryService $createGalleryService): RedirectResponse
    {
        // dd($createGalleryService->getRequestItems($request->all()));

        // Save new gallery
        Gallery::create($createGalleryService->getRequestItems($request->all()));
        // Redirect user to galleries main page
        return redirect('/admin/galleries')->with([
            'message_success' => 'Galeria criada com sucesso.',
        ]);

    }

    /**
     * Display form to edit a specific
     * gallery.
     *
     * @param $id
     * @return View
     */
    public function edit($id): View
    {
        // Gallery
        $gallery = Gallery::where(['id' => $id])->firstOrFail();

        return view('admin.galleries.create-edit')->with([
            'title' => 'Editar Galeria',
            'task' => 'update',
            'gallery' => $gallery,
        ]);
    }

    /**
     * Update a specific gallery.
     *
     * @param EditGalleryRequest $request
     * @return RedirectResponse
     */
    public function update(EditGalleryRequest $request): RedirectResponse
    {
        // Current photos
        $currentPhotos = $request->current_photos;
        // Photos to be deleted
        $toDelete = $request->remove;

        // Remove photo records
        // Remove files from folder
        if ($toDelete) {
            for ($i = 0; $i < count($toDelete); $i++) {
                // Removal from array
                $currentPhotos = array_diff($currentPhotos, $toDelete);
                // Removal from folder
                Storage::disk('public')->delete("/images/$toDelete[$i]");
            }
        }

        // Add new photos
        if ($request->photos) {
            foreach ($request->photos as $photo) {
                // Get file original name
                $fileName = $photo->getClientOriginalName();
                // Store file names
                array_push($currentPhotos, $fileName);
                // Upload files
                $photo->storePubliclyAs('images', $fileName, 'public');
            }
        }

        //Update gallery
        Gallery::where('id', $request->gallery_id)->update([
            'title' => $request->title,
            'body' => $request->body,
            'photos' => $currentPhotos,
        ]);

        // Redirect user to galleries main page
        return redirect('admin/galleries')->with([
            'message_success' => 'Galeria atualizada com sucesso.',
        ]);
    }

    /**
     * Delete a specific gallery.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        // Gallery
        $gallery = Gallery::where('id', $id)->firstOrFail();

        // Remove all image files
        // from folder
        foreach ($gallery->photos as $photo) {
            Storage::disk('public')->delete("/images/$photo");
        }

        // Delete gallery
        $gallery->delete();

        //Galleries dashboard index page
        return redirect('admin/galleries')->with([
            'title' => 'Galerias',
            'galleries' => Gallery::all(),
            'message_success' => 'Galeria apagada com sucesso.',
        ]);
    }
}
