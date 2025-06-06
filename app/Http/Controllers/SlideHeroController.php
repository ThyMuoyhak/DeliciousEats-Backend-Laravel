<?php

namespace App\Http\Controllers;

use App\Models\SlideHero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SlideHeroController extends Controller
{
    /**
     * Display a listing of the slide heroes.
     */
    public function index(Request $request)
    {
        $query = SlideHero::query();
        if ($request->has('search') && $request->search) {
            $query->where('main_title', 'like', '%' . $request->search . '%');
        }
        $slides = $query->paginate(10);
        return view('slide.index', compact('slides'));
    }

    /**
     * Show the form for creating a new slide hero.
     */
    public function create()
    {
        return view('slide.create');
    }

    /**
     * Store a newly created slide hero in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'main_title' => 'required|string|max:255',
            'description' => 'required|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image1_url' => 'nullable|url',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2_url' => 'nullable|url',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3_url' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        foreach (['image1', 'image2', 'image3'] as $imageField) {
            if ($request->hasFile($imageField) && $request->input("{$imageField}_type") == 'file') {
                $data[$imageField] = $request->file($imageField)->store('slides', 'public');
            } else if ($request->input("{$imageField}_url") && $request->input("{$imageField}_type") == 'url') {
                $data[$imageField] = $request->input("{$imageField}_url");
            } else {
                $data[$imageField] = null;
            }
        }

        SlideHero::create($data);

        return redirect()->route('slide-heroes.index')->with('success', 'Slide created successfully');
    }

    /**
     * Display the specified slide hero.
     */
    public function show($id)
    {
        $slide = SlideHero::findOrFail($id);
        return view('slide.show', compact('slide'));
    }

    /**
     * Show the form for editing the specified slide hero.
     */
    public function edit($id)
    {
        $slide = SlideHero::findOrFail($id);
        return view('slide.edit', compact('slide'));
    }

    /**
     * Update the specified slide hero in storage.
     */
    public function update(Request $request, $id)
    {
        $slide = SlideHero::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'main_title' => 'required|string|max:255',
            'description' => 'required|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image1_url' => 'nullable|url',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2_url' => 'nullable|url',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3_url' => 'nullable|url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        foreach (['image1', 'image2', 'image3'] as $imageField) {
            if ($request->hasFile($imageField) && $request->input("{$imageField}_type") == 'file') {
                if ($slide->$imageField && !filter_var($slide->$imageField, FILTER_VALIDATE_URL)) {
                    Storage::disk('public')->delete($slide->$imageField);
                }
                $data[$imageField] = $request->file($imageField)->store('slides', 'public');
            } elseif ($request->input("{$imageField}_url") && $request->input("{$imageField}_type") == 'url') {
                if ($slide->$imageField && !filter_var($slide->$imageField, FILTER_VALIDATE_URL)) {
                    Storage::disk('public')->delete($slide->$imageField);
                }
                $data[$imageField] = $request->input("{$imageField}_url");
            } else {
                $data[$imageField] = $slide->$imageField; // Retain existing
            }
        }

        $slide->update($data);

        return redirect()->route('slide-heroes.index')->with('success', 'Slide updated successfully');
    }

    /**
     * Remove the specified slide hero from storage.
     */
    public function destroy($id)
    {
        $slide = SlideHero::findOrFail($id);
        foreach (['image1', 'image2', 'image3'] as $imageField) {
            if ($slide->$imageField && !filter_var($slide->$imageField, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($slide->$imageField);
            }
        }
        $slide->delete();
        return redirect()->route('slide-heroes.index')->with('success', 'Slide deleted successfully');
    }

    // ===== API METHODS =====
    
    /**
     * API: Display a listing of slide heroes.
     */
    public function indexApi(Request $request)
    {
        try {
            $perPage = $request->get('per_page', 10);
            $search = $request->get('search');
            
            $query = SlideHero::query();
            
            if ($search) {
                $query->where('main_title', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            }
            
            $slides = $query->orderBy('created_at', 'desc')->paginate($perPage);
            
            return response()->json([
                'status' => 'success',
                'data' => $slides->items(),
                'pagination' => [
                    'current_page' => $slides->currentPage(),
                    'last_page' => $slides->lastPage(),
                    'per_page' => $slides->perPage(),
                    'total' => $slides->total(),
                    'from' => $slides->firstItem(),
                    'to' => $slides->lastItem(),
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch slides',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * API: Store a newly created slide hero.
     */
    public function storeApi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'main_title' => 'required|string|max:255',
            'description' => 'required|string',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image1_url' => 'nullable|url',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image2_url' => 'nullable|url',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image3_url' => 'nullable|url',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $data = $validator->validated();
            
            foreach (['image1', 'image2', 'image3'] as $imageField) {
                if ($request->hasFile($imageField) && $request->input("{$imageField}_type") == 'file') {
                    $data[$imageField] = $request->file($imageField)->store('slides', 'public');
                } elseif ($request->input("{$imageField}_url") && $request->input("{$imageField}_type") == 'url') {
                    $data[$imageField] = $request->input("{$imageField}_url");
                } else {
                    $data[$imageField] = null;
                }
            }

            $slide = SlideHero::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Slide created successfully',
                'data' => $slide
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create slide',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * API: Display the specified slide hero.
     */
    public function showApi($id)
    {
        try {
            $slide = SlideHero::findOrFail($id);
            
            return response()->json([
                'status' => 'success',
                'data' => $slide
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Slide not found'
            ], 404);
        }
    }

    /**
     * API: Update the specified slide hero.
     */
    public function updateApi(Request $request, $id)
    {
        try {
            $slide = SlideHero::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'main_title' => 'required|string|max:255',
                'description' => 'required|string',
                'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'image1_url' => 'nullable|url',
                'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'image2_url' => 'nullable|url',
                'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'image3_url' => 'nullable|url',
                'is_active' => 'nullable|boolean',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $data = $validator->validated();

            foreach (['image1', 'image2', 'image3'] as $imageField) {
                if ($request->hasFile($imageField) && $request->input("{$imageField}_type") == 'file') {
                    // Delete old file if it exists and is not a URL
                    if ($slide->$imageField && !filter_var($slide->$imageField, FILTER_VALIDATE_URL)) {
                        Storage::disk('public')->delete($slide->$imageField);
                    }
                    $data[$imageField] = $request->file($imageField)->store('slides', 'public');
                } elseif ($request->input("{$imageField}_url") && $request->input("{$imageField}_type") == 'url') {
                    // Delete old file if it exists and is not a URL
                    if ($slide->$imageField && !filter_var($slide->$imageField, FILTER_VALIDATE_URL)) {
                        Storage::disk('public')->delete($slide->$imageField);
                    }
                    $data[$imageField] = $request->input("{$imageField}_url");
                } else {
                    // Keep existing value if no new input provided
                    $data[$imageField] = $slide->$imageField;
                }
            }

            $slide->update($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Slide updated successfully',
                'data' => $slide->fresh()
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Slide not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update slide',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * API: Remove the specified slide hero.
     */
    public function destroyApi($id)
    {
        try {
            $slide = SlideHero::findOrFail($id);

            // Delete associated files
            foreach (['image1', 'image2', 'image3'] as $imageField) {
                if ($slide->$imageField && !filter_var($slide->$imageField, FILTER_VALIDATE_URL)) {
                    Storage::disk('public')->delete($slide->$imageField);
                }
            }

            $slide->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Slide deleted successfully'
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Slide not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete slide',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * API: Get active slides only.
     */
    public function activeApi()
    {
        try {
            $slides = SlideHero::where('is_active', true)
                               ->orderBy('created_at', 'desc')
                               ->get();

            return response()->json([
                'status' => 'success',
                'data' => $slides
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch active slides',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * API: Bulk delete slides.
     */
    public function bulkDeleteApi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:slide_heroes,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $slides = SlideHero::whereIn('id', $request->ids)->get();
            
            foreach ($slides as $slide) {
                // Delete associated files
                foreach (['image1', 'image2', 'image3'] as $imageField) {
                    if ($slide->$imageField && !filter_var($slide->$imageField, FILTER_VALIDATE_URL)) {
                        Storage::disk('public')->delete($slide->$imageField);
                    }
                }
                $slide->delete();
            }

            return response()->json([
                'status' => 'success',
                'message' => count($request->ids) . ' slides deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete slides',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * API: Toggle slide status.
     */
    public function toggleStatusApi($id)
    {
        try {
            $slide = SlideHero::findOrFail($id);
            $slide->is_active = !$slide->is_active;
            $slide->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Slide status updated successfully',
                'data' => $slide
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Slide not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to toggle slide status',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}