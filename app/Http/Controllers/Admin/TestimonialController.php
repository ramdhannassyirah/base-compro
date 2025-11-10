<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Testimonial\StoreTestimonialRequest;
use Inertia\Inertia;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10)->through(function ($testimonial) {
            return [
                'id' => $testimonial->id,
                'name' => $testimonial->name,
                'position' => $testimonial->position,
                'content' => $testimonial->content,
                'stars' => $testimonial->stars,
            ];
        });

        return Inertia::render('Admin/Testimonial/Index', [
            'testimonials' => $testimonials,
        ]);
    }


    public function store( StoreTestimonialRequest $request)
    {
        $data = $request->all();
        Testimonial::create($data);
        return redirect()->route('admin.testimonial.index');
    }

    public function update(StoreTestimonialRequest $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update($request->validated());

        return redirect()->route('admin.testimonial.index')
            ->with('success', 'Testimonial berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonial.index');
    }

}
