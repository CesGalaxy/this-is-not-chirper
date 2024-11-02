<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = auth()->user();

        if (! $user) {
            return view('chirps.index', [
                'chirps' => Chirp::with(['user', 'replies', 'poll'])
                    ->whereNull('chirps.parent_id')
                    ->latest()
                    ->get(),
            ]);
        }

        return view('chirps.index', [
            'chirps' => Chirp::with([
                'replies',
                'poll.votes' => function (Builder $query) {
                    $query->where('user_id', auth()->id())->first();
                },
            ])
                ->whereNull('chirps.parent_id')
                ->select('*')
                ->latest()
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('chirps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $validated = $request->validate([
            'parent_id' => 'integer|exists:chirps,id',
            'message' => 'required|string|max:255',
            'pollOptions' => ['list'],
        ]);

        $chirp = $request->user()->chirps()->create([
            'parent_id' => $validated['parent_id'] ?? null,
            'message' => $validated['message'],
        ]);

        if (array_key_exists('pollOptions', $validated)) {
            $chirp->poll()->create([
                'options' => json_encode($validated['pollOptions']),
            ]);
        }

        if (array_key_exists('parent_id', $validated)) {
            return redirect(route('chirps.show', $validated['parent_id']));
        } else {
            return redirect(route('chirps.index'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp): View
    {
        return view('chirps.show', [
            'chirp' => $chirp,
            'poll' => $chirp->poll()->first(),
            'replies' => $chirp->replies()->latest()->get(),
            'parent' => $chirp->parent()->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @throws AuthorizationException
     */
    public function edit(Chirp $chirp): View
    {
        //
        Gate::authorize('update', $chirp);

        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws AuthorizationException
     */
    public function update(Request $request, Chirp $chirp): RedirectResponse
    {
        //
        Gate::authorize('update', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $chirp->update($validated);

        return redirect(route('chirps.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws AuthorizationException
     */
    public function destroy(Chirp $chirp): RedirectResponse
    {
        //
        Gate::authorize('delete', $chirp);

        $chirp->delete();

        return redirect(route('chirps.index'));
    }
}
