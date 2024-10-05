@isset($widget['filters'])
    <form class="filter_form" method="get">
            @foreach($widget['filters'] as $filter) 
                    @include("crud::fields.select", [
                        "field" => [
                            "label" => $filter["label"],
                            "type" => "select",
                            "name" => $filter["name"],
                            "entity" => null,
                            "model" => $filter["model"],
                            "attribute" => "name",
                        ],
                    ])
                @endforeach
        
        <button type="submit">Filter</button>
    </form>
@endisset