<?php
declare(strict_types=1);

/**
 * @author Artuikh Vladimir
 * @copyright 2021 Artuikh Vladimir, vladimir.artjukh@gmail.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Ticket
 *
 * @property int $id
 * @property string $subject Ticket Subject
 * @property string $content Ticket Content
 * @property string $user_name Name of the user who submitted the ticket
 * @property string $email Email of the user who submitted the ticket
 * @property string $status Status of the ticket 0-not processed, 1-processed.
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket notProcessedTickets()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUserName($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket processedTickets()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket ticketsByUserEmail(string $email)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket userWithCountSubmit()
 */
class Ticket extends Model
{
    use HasFactory;

    const STATUS_FALSE = 0;
    const STATUS_TRUE = 1;

    protected $guarded = [];

    /**
     * @param  object  $query
     *
     * @return object
     */
    public function scopeNotProcessedTickets(object $query)
    {
        $query->where('status', self::STATUS_FALSE)->orderBy('id', 'asc');

        return $query;
    }

    /**
     * @param  object  $query
     *
     * @return object
     */
    public function scopeProcessedTickets(object $query)
    {
        $query->where('status', self::STATUS_TRUE)->orderBy('id', 'asc');

        return $query;
    }

    /**
     * @param  object  $query
     * @param  string  $email
     *
     * @return object
     */
    public function scopeTicketsByUserEmail(object $query, string $email)
    {
        $query->where('email', $email)->orderBy('id', 'asc');

        return $query;
    }

    public function scopeUserWithCountSubmit(object $query)
    {
        $query->select('user_name', DB::raw('count(email) as submits'))->groupByRaw('email')->orderBy('submits', 'desc');

        return $query;
    }
}
