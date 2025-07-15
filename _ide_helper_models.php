<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string|null $cover_image
 * @property string|null $file_pdf
 * @property int $category_id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\KarinaBorrow> $borrows
 * @property-read int|null $borrows_count
 * @property-read \App\Models\KarinaCategory $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\KarinaReview> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\KarinaBookTag> $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBook newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBook query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBook whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBook whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBook whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBook whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBook whereFilePdf($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBook whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBook whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBook whereUpdatedAt($value)
 */
	class KarinaBook extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\KarinaBook> $books
 * @property-read int|null $books_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBookTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBookTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBookTag query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBookTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBookTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBookTag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBookTag whereUpdatedAt($value)
 */
	class KarinaBookTag extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $book_id
 * @property string $borrow_date
 * @property string|null $return_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\KarinaBook $book
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBorrow newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBorrow newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBorrow query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBorrow whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBorrow whereBorrowDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBorrow whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBorrow whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBorrow whereReturnDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBorrow whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaBorrow whereUserId($value)
 */
	class KarinaBorrow extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\KarinaBook> $books
 * @property-read int|null $books_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaCategory whereUpdatedAt($value)
 */
	class KarinaCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $book_id
 * @property int $rating
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\KarinaBook $book
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaReview query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaReview whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaReview whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaReview whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaReview whereUserId($value)
 */
	class KarinaReview extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $phone
 * @property string|null $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaUserProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaUserProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaUserProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaUserProfile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaUserProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaUserProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaUserProfile wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaUserProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KarinaUserProfile whereUserId($value)
 */
	class KarinaUserProfile extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $role
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

