<?php

namespace App\Http\Resources;

use App\Models\Opportunity;

class OpportunityResources {
    static function stages($user_id) {
        return Stage::where('user_id', $user_id)->get();
    }

    static function in_stage($stage_id) {
        return Opportunity::where('stage_id', $stage_id)->get();
    }

    static function uuid($uuid) {
        return Opportunity::where('uuid', $uuid)->first();
    }

}
