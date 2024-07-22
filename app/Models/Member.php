<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'membership_no',
        'fullname',
        'phone',
        'email',
        'mct_number',
        'gender',
        'date_of_birth',
        'qualification',
        'qualified_year',
        'sub_speciality_qualification',
        'college_attained',
        'membership_type',
        'payment'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'qualified_year' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->membership_no = self::generateMembershipNo($model, 'TCS-');
        });
    }

    public static function generateMembershipNo($model, $prefix)
    {
        $membership_no = 0;
        $prefix = $prefix . date('dmy');
        $lastMember = $model::where('membership_no', 'LIKE', $prefix . '%')
            ->orderBy('created_at', 'DESC')
            ->first();

        if ($lastMember) {
            $membership_no = substr($lastMember->membership_no, strlen($prefix));
            if (!is_numeric($membership_no)) {
                $membership_no = 0;
            }
        }

        $membership_no = (int)$membership_no + 1;
        $len = max(4, strlen((string)$membership_no));
        $paddedMembershipNo = str_pad($membership_no, $len, '0', STR_PAD_LEFT);
        $newMembershipNo = $prefix . $paddedMembershipNo;

        while ($model::where('membership_no', $newMembershipNo)->exists()) {
            $membership_no++;
            $paddedMembershipNo = str_pad($membership_no, $len, '0', STR_PAD_LEFT);
            $newMembershipNo = $prefix . $paddedMembershipNo;
        }

        return $newMembershipNo;
    }
}
