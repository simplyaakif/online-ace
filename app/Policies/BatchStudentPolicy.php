<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BatchStudent;
use Illuminate\Auth\Access\HandlesAuthorization;

class BatchStudentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_batch::student');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BatchStudent  $batchStudent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, BatchStudent $batchStudent)
    {
        return $user->can('view_batch::student');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_batch::student');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BatchStudent  $batchStudent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, BatchStudent $batchStudent)
    {
        return $user->can('update_batch::student');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BatchStudent  $batchStudent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, BatchStudent $batchStudent)
    {
        return $user->can('delete_batch::student');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->can('delete_any_batch::student');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BatchStudent  $batchStudent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, BatchStudent $batchStudent)
    {
        return $user->can('force_delete_batch::student');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user)
    {
        return $user->can('force_delete_any_batch::student');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BatchStudent  $batchStudent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, BatchStudent $batchStudent)
    {
        return $user->can('restore_batch::student');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user)
    {
        return $user->can('restore_any_batch::student');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BatchStudent  $batchStudent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, BatchStudent $batchStudent)
    {
        return $user->can('replicate_batch::student');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user)
    {
        return $user->can('reorder_batch::student');
    }

}
