<?php

namespace App;

use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

trait WithChoicesJs
{
    private function mapModelsToChoicesOptions(
        EloquentCollection $models,
        $label = 'name',
        $id = 'id'
    ) {
        $choicesOptionStub = collect(['value', 'label', 'selected', 'disabled']);
        $choicesOptions = [];

        foreach ($models as $model) {
            $choicesOptions[] = $choicesOptionStub->combine([$model->$id, $model->$label, false, false])->all();
        }

        return $choicesOptions;
    }

    private function mapCollectionToChoicesOptions(
        SupportCollection $items,
        $label = 'name',
        $id = 'id'
    ) {
        $choicesOptionStub = collect(['value', 'label', 'selected', 'disabled']);
        $choicesOptions = [];

        foreach ($items as $item) {
            $choicesOptions[] = $choicesOptionStub->combine([$item[$id], $item[$label], false, false])->all();
        }

        return $choicesOptions;
    }
}
