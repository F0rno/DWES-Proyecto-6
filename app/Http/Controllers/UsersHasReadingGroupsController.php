<?php

namespace App\Http\Controllers;

use App\Models\UsersHasReadingGroups;
use App\Models\ReadingGroup;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\UsersHasReadingGroupsResource;

class UsersHasReadingGroupsController extends Controller
{
    public function store($groupId, $userId)
    {
        // Ensure the user and group exist
        $user = User::findOrFail($userId);
        $group = ReadingGroup::findOrFail($groupId);
    
        $usersHasReadingGroups = UsersHasReadingGroups::firstOrCreate([
            'users_user_id' => $userId,
            'reading_groups_reading_group_id' => $groupId
        ]);
    
        return new UsersHasReadingGroupsResource($usersHasReadingGroups);
    }

    public function index($groupId)
    {
        // Ensure the group exists
        $group = ReadingGroup::findOrFail($groupId);
        $users = $group->users;
        return UserResource::collection($users);
    }

    public function destroy($groupId, $userId)
    {
        // Ensure the user and group exist
        $user = User::findOrFail($userId);
        $group = ReadingGroup::findOrFail($groupId);
    
        $usersHasReadingGroups = UsersHasReadingGroups::where([
            'users_user_id' => $userId,
            'reading_groups_reading_group_id' => $groupId
        ])->delete();
    
        if($usersHasReadingGroups) {
            return response()->json(['message' => 'Record deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'User is not in the group'], 404);
        }
    }
}