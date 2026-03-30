<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\DTOs\Admin\UserDTO;
use App\Enums\Pagination;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Http\Requests\Admin\UserFilterRequest;
use App\Interfaces\UserServiceInterface;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final class UserController extends Controller
{
    public function __construct(private readonly UserServiceInterface $userService) {}

    public function index(UserFilterRequest $request): View
    {
        $users = User::query()
            ->with('roles')
            ->filterStatus($request->safe()->status)
            ->filterRole($request->safe()->role)
            ->paginate(Pagination::USERS_PER_PAGE->value)
            ->withQueryString();

        return view('dashboard.users.index', compact('users'));
    }

    public function create(): View
    {
        return view('dashboard.users.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $this->userService->createUser(UserDTO::fromArray($request->validated()));

        return redirect()->route('users.index')->with('success', 'User Created Successfully');
    }

    public function show(User $user): View
    {
        return view('dashboard.users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('dashboard.users.update', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $this->userService->updateUser(UserDTO::fromArray($request->validated()), $user);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
