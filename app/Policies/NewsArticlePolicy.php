<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;

use App\Models\NewsArticle;
use App\Models\User;

class NewsArticlePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, NewsArticle $newsArticle): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->hasRole('Admin') || $user->hasRole('Moderator')
            ? Response::allow()
            : Response::deny('You must be an administrator.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, NewsArticle $newsArticle): Response
    {
        return $user->hasRole('admin')
            ? Response::allow()
            : Response::deny('You must be an administrator.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, NewsArticle $newsArticle): Response
    {
        return $user->hasRole('admin')
            ? Response::allow()
            : Response::deny('You must be an administrator.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, NewsArticle $newsArticle): Response
    {
        return $user->hasRole('admin')
            ? Response::allow()
            : Response::deny('You must be an administrator.');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, NewsArticle $newsArticle): Response
    {
        return $user->hasRole('admin')
            ? Response::allow()
            : Response::deny('You must be an administrator.');
    }
}
