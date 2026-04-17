<?php

namespace App\Http\Livewire;

use App\Http\Controllers\LocationController;
use Laracasts\Flash\Flash;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use App\Models\ApplicationSetting;
use App\Models\ApplicationSettingCategory;
use App\Models\Location;
use App\Repositories\LocationRepository;

class LocationsTable extends DataTableComponent
{
    protected $model = Location::class;

    public $i = 1;


    protected $listeners = ['deleteRecord' => 'deleteRecord'];


    public function deleteRecord($id)
    {
        $applicationSettingRepo = new LocationRepository();
        $setting = new LocationController($applicationSettingRepo);
        $setting->destroy($id);
    }


    public function resetCounter()
    {
        $this->i = 1;
    }


    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setReorderEnabled()
            ->setSingleSortingDisabled()
            ->setHideReorderColumnUnlessReorderingEnabled()
            ->resetCounter();
    }


    public function columns(): array
    {
        return [
            Column::make("Location Name", "location_name")
                ->sortable()
                ->searchable(),
            Column::make("Publish", "publish")
                ->format(function ($publish, $blogPost) {
                    return view('common.livewire-tables.publish', ['publish' => $publish, 'id' => $blogPost->id]);
                }),
            Column::make("Actions", 'id')
                ->format(
                    fn($value, $row, Column $column) => view('common.livewire-tables.actions', [
                        'showUrl' => route('locations.show', $row->id),
                        'editUrl' => route('locations.edit', $row->id),
                        'recordId' => $row->id,
                        'permissionName' => 'locations'

                    ])
                )
        ];
    }
    public function togglePublish($id)
    {
        $blogPost = Location::find($id);
        $blogPost->publish = !$blogPost->publish;
        $blogPost->save();
    }
}
