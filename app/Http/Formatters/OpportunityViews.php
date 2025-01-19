<?php

namespace App\Http\Formatters;

use App\Http\Helpers\NumberFormat;

class OpportunityViews {
    static function list_by_stage($opportunities) {
        $output = '<a href="/opportunities/create" class="list-group-item"><span class="float-end"><button class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i></button></span>Opportunity</a>';
        foreach($opportunities as $opportunity) {
            $output .= view('opportunities.opportunity--listed', [
                'url' => '/opportunities/' . $opportunity->uuid . '/view',
                'label' => $opportunity->label,
                'value' => NumberFormat::pretty_dollar($opportunity->value),
            ]);
        }
        return '<div class="list-group">' . $output . '</div>';
    }
}
