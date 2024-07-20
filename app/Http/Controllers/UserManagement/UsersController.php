<?php
namespace App\Http\Controllers\UserManagement;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::latest();
            return DataTables::of($users)
                ->addIndexColumn()
                ->editColumn('created_at', function ($data) {
                    $carbonDate = Carbon::parse($data->created_at);
                    $timestamp = $carbonDate->timestamp;
                    return [
                        'display' => e(dateFormat($data->created_at, 'Y-m-d H:i')),
                        'timestamp' =>  $timestamp
                    ];
                })
                ->editColumn('status', function ($data) {
                    return $data->status->description();
                })
                ->addColumn('name', function ($data) {
                    return  trim($data->first_name . ' ' . ($data->middle_name ? $data->middle_name . ' ' : '') . $data->last_name);
                })
                ->addColumn('role', function ($data) {
                    if ($data->roles->count()>0) {
                        $role =$data->roles()->first()->display_name;
                    } else {
                        $role = 'N/A';
                    }
                    return $role;
                })
                ->addColumn('action', function ($data) {
                    return view('components.users-action-button', compact('data'));
                })
                ->rawColumns(['action',])
                ->make(true);
        }
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('users.index', compact('roles'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id' => 'required|string|exists:roles,id',
        ]);
        $request->merge([
            'password' => Hash::make('DefaultPassword')
        ]);
        DB::beginTransaction();
        $user = User::create($request->except('_token', 'role_id'));
        if ($user) {
            $role = Role::whereId($request->role_id)->first();
            $roles =  $user->syncRoles([$role]);
            DB::commit();
            return response()->json(['message' =>  "User successful created.", 'data' => null], Response::HTTP_OK);
        } else {
            DB::rollBack();
            return response()->json(['message' =>  "Unknown error occur.", 'data' => null], Response::HTTP_BAD_REQUEST);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            if ($user->roles->count() > 0) {
                $role_id = $user->roles->first()->id;
            } else {
                $role_id = '';
            }
            $user->role_id = $role_id;
            return response()->json(['message' =>  "User Data", 'data' => $user], Response::HTTP_OK);
        }
        return response()->json(['message' =>  "Unknown error occur.", 'data' => null], Response::HTTP_BAD_REQUEST);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            if ($user->roles->count() > 0) {
                $role_id = $user->roles->first()->id;
            } else {
                $role_id = '';
            }
            $user->role_id = $role_id;
            return response()->json(['message' =>  "User Data", 'data' => $user], Response::HTTP_OK);
        }
        return response()->json(['message' =>  "Unknown error occur.", 'data' => null], Response::HTTP_BAD_REQUEST);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', 'unique:users,phone,' . $id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'role_id' => 'required|string|exists:roles,id',
        ]);
        $user = User::where('id', $id)->first();
        if ($user) {
            DB::beginTransaction();
            $user->update($request->except('_token', '_method', 'role_id'));
            $role = Role::whereId($request->role_id)->first();
            $roles =  $user->syncRoles([$role]);
            DB::commit();
            return response()->json(['message' =>  "User successful updated.", 'data' => null], Response::HTTP_OK);
        }
        return response()->json(['message' =>  "Unknown error occur.", 'data' => null], Response::HTTP_BAD_REQUEST);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            DB::beginTransaction();
            $user->delete();
            DB::commit();
            return response()->json([
                'status' => Response::$statusTexts[Response::HTTP_OK],
                'message' => 'User deleted sucessful.',
                'data' => []
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => Response::$statusTexts[Response::HTTP_BAD_REQUEST],
            'message' => 'Unknown error occur.',
            'data' => []
        ], Response::HTTP_BAD_REQUEST);
    }
}
