<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;

// * is_admin === 0 = true
// ! is_admin === 1 = false

class EventPolicy
{
    /**
     * Admin can view all events. Users can view only their events.
     */
    public function viewAny(User $user): bool
    {
        return $user->is_admin === '0';
    }

    /**
     * Admin can view any event. Users can only view their own events.
     */
    public function view(User $user, Event $event): bool
    {
        return $user->is_admin === '0' || $user->id === $event->user_id;
    }

    /**
     * Only users (not admin) can create events.
     */
    public function create(User $user): bool
    {
        return $user->is_admin === '1';
    }

    /**
     * Admin can update any event. Users can update only their own events.
     */
    public function update(User $user, Event $event): bool
    {
        return $user->is_admin === '0' || $user->id === $event->user_id;
        
    }

    /**
     * Only users can delete their own events. Admin cannot delete.
     */
    public function delete(User $user, Event $event): bool
    {
        return $user->is_admin === '1' && $user->id === $event->user_id;
    }

    /**
     * Only users can restore their own events.
     */
    public function restore(User $user, Event $event): bool
    {
        return $user->is_admin === '1' && $user->id === $event->user_id;
    }

    /**
     * Only users can permanently delete their own events.
     */
    public function forceDelete(User $user, Event $event): bool
    {
        return $user->is_admin === '1' && $user->id === $event->user_id;
    }
}
