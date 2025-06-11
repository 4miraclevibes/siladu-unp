<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index(Request $request)
    {
        $tools = Tool::with(['user', 'toolImages'])
            ->where('status', 'publish')
            ->orderBy('updated_at', 'desc')
            ->paginate(8);
        if($request->search) {
            $tools = Tool::with(['user', 'toolImages'])
            ->where('status', 'publish')
            ->where(function($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                  ->orWhere('description', 'like', "%{$request->search}%");
            })
            ->latest()
            ->paginate(8);
        }
        return view('pages.frontend.tool', compact('tools'));
    }

    public function detail(Tool $tool)
    {
        return view('pages.frontend.tool-detail', compact('tool'));
    }

    public function show($id)
    {
        $tool = Tool::with(['user', 'toolImages'])
            ->where('status', 'publish')
            ->findOrFail($id);

        return response()->json($tool);
    }
}
